<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class ArtistsController extends Controller {

    private $request;
    private $musicPath = '\\\\NAS-CRAUSAZ\\music\\';
    private $artists = [];

    public function __construct (Request $request) {
        $this->request = $request;
    }

    public function getAll () {
        $items = array_diff(scandir($this->musicPath), array('.', '..'));

        foreach ($items as $item) {
            if (is_dir($this->musicPath . $item)) {
                array_push($this->artists, $item);
            }
        }

        $selected_page = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 30;
        $current_page_items = array_slice($this->artists, $perPage * ($selected_page - 1), $perPage);


        $paginated_artists = new LengthAwarePaginator($current_page_items, count($this->artists), $perPage, $selected_page);

        $paginated_artists->withPath('artists');

        return view('artists', ['artists' => $paginated_artists]);
    }

    public function getOne ($name) {
        $artist_path = $this->musicPath . $name;
        $artist_content = array_diff(scandir($artist_path), array('.', '..'));

        $artist_albums = [];
        $artist_singles = [];

        foreach ($artist_content as $item) {
            $item_path = $artist_path . "\\" . $item;
            if (is_dir($item_path)) {

                $album = [
                    "name" => $item,
                    "numberOfSongs" => $this->getNumberOfSongs($item_path)
                ];

                array_push($artist_albums, $album);
            } else {
                // echo is_file($item_path);
                // get id3
                // echo "<pre>";
                // access problem ??
                // $getId3 = new \GetId3_GetId3();
                // $audio = $getId3
                // // // ->setOptionMD5Data(true)
                // // // ->setOptionMD5DataSource(true)
                // // // ->setEncoding('UTF-8')
                // ->analyze($item_path);

                // print_r($audio);
                array_push($artist_singles, $item);
            }
        }

        // get artist pic
        $getdata = file_get_contents('https://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist='.$name.'&api_key=87ac8dfa5f93287d9b69650bea9722af&format=json');

        print_r($getdata);
        // echo " <pre>";

        return view('artist', ['artist_data' => [
            'name' => $name,
            'albums' => $artist_albums,
            'singles' => $artist_singles
        ]]);
    }

    private function getNumberOfSongs($album)
    {
        return count(array_diff(scandir($album), array('.', '..')));
    }
}
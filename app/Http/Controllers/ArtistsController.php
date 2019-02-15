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
            if (is_dir($artist_path . "\\" . $item)) {
                array_push($artist_albums, $item);
            } else {
                array_push($artist_singles, $item);
            }
        }

        return view('artist', ['artist_data' => [
            'name' => $name,
            'albums' => $artist_albums,
            'singles' => $artist_singles
        ]]);
    }
}
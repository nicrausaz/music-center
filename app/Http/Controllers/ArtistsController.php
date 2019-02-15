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
        $items = array_diff(scandir($this->musicPath), array('.', '..'));;

        foreach ($items as $item) {
            if (is_dir($this->musicPath . $item)) {
                array_push($this->artists, $item);
            }
        }

        $selected_page = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 30;
        $current_page_items = array_slice($items, $perPage * ($selected_page - 1), $perPage);


        $paginated_artists = new LengthAwarePaginator($current_page_items, count($items), $perPage, $selected_page);

        $paginated_artists->withPath('artists');

        return view('artists', ['artists' => $paginated_artists]);
    }

    private function getOne () {

    }
}
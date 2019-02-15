<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Storage;

class ArtistsController extends Controller {

    private $musicPath = '\\\\NAS-CRAUSAZ\\music\\';
    private $artists = [];

    public function getAll () {
        $items = array_diff(scandir($this->musicPath), array('.', '..'));;

        foreach ($items as $item) {
            if (is_dir($this->musicPath . $item)) {
                array_push($this->artists, $item);
            }
        }

        return view('artists', ['artists' => $this->artists]);
    }

    private function getOne () {

    }
}
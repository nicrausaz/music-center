<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class ArtistsController extends Controller {

    private $request;
    private $musicPath = '\\\\NAS-CRAUSAZ\\music\\';

    public function __construct (Request $request) {
        $this->request = $request;
    }

    public function add () {
       
    }

    private function addSong() {
        
    }
}
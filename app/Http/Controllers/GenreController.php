<?php

namespace App\Http\Controllers;
use App\Models\Genre;

use Illuminate\Http\Request;

class GenreController extends Controller {

    public function index() {
        $genres = Genre::with('books')->paginate(2);

        return response()->json($genres);
    }
}

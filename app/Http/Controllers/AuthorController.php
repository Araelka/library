<?php

namespace App\Http\Controllers;
use App\Models\Author;

use Illuminate\Http\Request;

class AuthorController extends Controller {
    
    public function index() {

        $author = Author::withCount('books')->paginate(2);

        return response()->json($author);
        
    }

    public function show($id) {
        $author = Author::with('books')->find($id);

        return response()->json($author);
    }

    public function update(){
        $author = Author::where('user_id','=', auth()->user()->id)->get();


        if (auth()->user()->id !== $author[0]->user_id) {
            return response()->json(['message' => 'Попытка обновить чужие данные'], 403);
        }
    
        return response()->json(['message' => 'Данные автора обновлены успешно']);
    }



}

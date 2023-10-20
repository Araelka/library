<?php

namespace App\Http\Controllers;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Book;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index(){

        $books = Book::with('author')->paginate(2);

        return response()->json($books);
    }

    public function show($id){
        $books = Book::with(['author','genres'])->find($id);

        return response()->json($books);
    }

    public function myBooks(){

        if(auth()->check()){
        $id = auth()->user()->id;

        $books = Author::with('books')->where('user_id', '=', $id)->get();

        return view('home', ['books' => $books]);
        }
        else{
            return view('home', []);
        }
    }

    public function update($id){
        $book = Book::with('author')->find($id);

        if (auth()->user()->id !== $book->author->user_id) {
            return response()->json(['message' => 'Вы не автор книги'], 403);
        }
    
        return response()->json(['message' => 'Книга обновлена успешно']);
    }

    public function destroy($id){
        $book = Book::with('author')->find($id);

        if (auth()->user()->id !== $book->author->user_id) {
            return response()->json(['message' => 'Вы не автор книги'], 403);
        }
    
        return response()->json(['message' => 'Книга удалена успешно']);
    }

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Author;
use App\Models\Book;
use Auth;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BookResource::collection(Book::with('author')->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new BookResource(Book::with('genres')->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->id == Book::with('author')->findOrFail($id)->author->user_id){

        Book::findOrFail($id)->update(['title' => $request->input('title'), 
        'type' => $request->input('type')]);
       
        Book::find($id) -> genres() -> sync($request->input('genres'));

        return new BookResource(Book::findOrFail($id));

        }

        return response()->json(['message' => 'Пользователь не является автором книги'], 403);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Auth::user()->id == Book::with('author')->findOrFail($id)->author->user_id){
        $book = Book::find($id);

        $book->genres()->detach();

        $book->delete();

        return response(null, 204);
        }

        return response()->json(['message' => 'Пользователь не является автором книги'], 404);
    }
}

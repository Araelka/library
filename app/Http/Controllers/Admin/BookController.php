<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Support\Facades\Log;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = Book::with(['author','genres'])->get();
 
        return view('admin.books.books', ['data' => $book, 'authors' => Author::all(), 'genres' => Genre::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.books.book_create',['authors' => Author::all(), 'genres' => Genre::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $book = new Book();
        $book -> title = $request->input('title');
        $book -> type = $request->input('type');
        $book -> author_id = $request->input('author_id');
        $book->save();
        
        $book -> genres() -> attach($request->input('genres'));

        Log::info('Добавлена новая книга: ' . $book->title);

        return redirect()->route('admin.books.index')->with(['success' => 'Книга успешно добавлена']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if(Book::find($id)){
            return view('admin.books.book_show',['book'=> Book::find($id)]);
        }

        return redirect()->route('admin.books.index')->withErrors(['search' => 'Книга не найдена']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::with('author', 'genres')->find($id);

        return view('admin.books.book_update', ['book' => $book, 'authors' => Author::all(), 'genres' => Genre::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $book = new Book;

        $book->where('id','=', $id)->update(['title' => $request->input('title'), 
        'type' => $request->input('type'), 
        'author_id' => $request->input('author_id')]);


        Book::find($id) -> genres() -> sync($request->input('genres'));

        Log::info('Книга ' . $book->title . ' была обновлена');

        return redirect()->route('admin.books.index')->with(['success' => 'Данные успешно обновлены']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        $book->genres()->detach();

        $book->delete();

        Log::info('Книга ' . $book->title . ' была удалена');

        return redirect()->route('admin.books.index');
    }

    public function search(Request $request) {
        
        $book = Book::with(['author','genres']);

        $book = $book -> where('title', '=', $request->input('search'))->get();


        if(empty($book[0])==false){
            $book = $book->find($book[0]->id);

            return redirect()->route('admin.books.show', $book->id);

        }
        else{

            return redirect()->route('admin.books.index')->withErrors(['search' => 'Книга не найдена']);
        }

    }

    public function authorFilter($id) {
            
        $book = Book::with(['author','genres']);

        $book = $book->where('author_id', '=', $id)->get();

        return view('admin.books.books', ['data' => $book, 'authors' => Author::all(), 'genres' => Genre::all()]);

    }

    public function genreFilter($id) {
            
        $books = Book::whereHas('genres', function($query) use ($id) {
            $query->where('genre_id', $id);
        })->with(['author', 'genres'])->get();

        return view('admin.books.books', ['data' => $books, 'authors' => Author::all(), 'genres' => Genre::all()]);

    }

    public function sortAZ() {

        return view('admin.books.books', ['data' => Book::orderBy('title',  'asc')->get(), 'authors' => Author::all(), 'genres' => Genre::all()]);
    
    }

    public function sortZA() {

        return view('admin.books.books', ['data' => Book::orderBy('title',  'desc')->get(), 'authors' => Author::all(), 'genres' => Genre::all()]);
    
    }
}

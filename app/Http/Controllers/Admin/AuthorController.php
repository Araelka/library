<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.authors.authors', ['authors' => Author::withCount('books')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request)
    {
        $author = new Author();

        $author -> name = $request->input('name');
        $author -> user_id = auth()->user()->id;

        $author->save();

        return redirect()->route('admin.authors.index')->with(['success' => 'Автор успешно добавлен']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        return view('admin.authors.author_update', ['author' => Author::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, $id)
    {
        Author::find($id)->update($request->validated());

        return redirect()->route('admin.authors.index')->with(['success' => 'Данные успешно обновлены']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Author::find($id)->delete();

        return redirect()->route('admin.authors.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.genres.genres', ['genres' => Genre::all()]);
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
    public function store(GenreRequest $request)
    {
        Genre::create($request->validated());
        
        return redirect()->route('admin.genres.index')->with(['success' => "Жарн успешно добавлен"]);
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
        return view('admin.genres.genre_update', ['genre' => Genre::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenreRequest $request, $id)
    {

        Genre::find($id)->update( $request->validated() );

        return redirect()->route('admin.genres.index')->with(['success' => "Данные успешно обновлены"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Genre::find($id)->delete();

        return redirect()->route('admin.genres.index');
    }
}

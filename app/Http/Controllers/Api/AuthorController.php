<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Auth;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AuthorResource::collection(Author::withCount('books')->paginate(2));
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
        return new AuthorResource(Author::with('books')->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, $id)
    {
        if(Auth::user()->id == Author::findOrFail($id)->user_id){
        Author::findOrFail($id)->update($request->validated());
        
        return new AuthorResource(Author::findOrFail($id));
        }

        return response()->json(['message' => 'У пользователя нет прав на изменение данных'], 403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

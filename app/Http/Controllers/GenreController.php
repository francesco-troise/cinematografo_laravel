<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $form_genres = Genre::pluck('name', 'id');

        $query = Genre::query();
        if($request->filled('genre_id')){
            $query->where('id', $request->genre_id);
        }

        $genres = $query->get();
        return view('genres.all_genres', compact('genres', 'form_genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.forms.add_genre');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->all();

        $new_genre = new Genre();

        $new_genre->name = $data['name'];
        $new_genre->description = $data['description'];

        if($request->hasFile('url_image')){
            $path =  Storage::disk('public')->putFile('images/genres', $data['url_image']);

            $new_genre->url_image = $path;
        }

        $new_genre->save();

        return redirect()->route('genres.show', $new_genre);

    }


    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return view('genres.show_genre', compact('genre'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('genres.forms.edit_genre', compact('genre'));
    }


    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Genre $genre)
{

    $data = $request->all();

    $genre->name = $data['name'];
    $genre->description = $data['description'];

    if ($request->hasFile('url_image')) {

        if ($genre->url_image) {
            Storage::disk('public')->delete($genre->url_image);
        }

        $path = Storage::disk('public')->putFile('images/genres', $data['url_image']);

        $genre->url_image = $path;
    }

    $genre->update();

    return redirect()->route('genres.show', $genre);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Person;
use App\Models\Role;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    //(Query Builder)
    //With() per caricare subito generi e people (evita il problema query N+1).
    $query = Movie::with(['genres', 'people.roles']);


    $query->when($request->title, function ($q, $title) {
        $q->where('title', 'like', "%{$title}%");
    });

    $query->when($request->genre_id, function ($q, $genre_id) {
        $q->whereHas('genres', function ($innerQuery) use ($genre_id) {
            $innerQuery->where('genres.id', $genre_id);
        });
    });

    $query->when($request->director_id, function ($q, $directorId) {
        $q->whereHas('people', function ($innerQuery) use ($directorId) {
            $innerQuery->where('people.id', $directorId)
                       ->where('cast.role_id', Role::DIRECTOR);
        });
    });


    $movies = $query->get();

    // DATI PER IL SELECT DEL FORM
    $genres = Genre::all();
    $directors = Person::whereHas('movies', function($q) {
        $q->where('cast.role_id', Role::DIRECTOR);
    })->get();

    return view('movies.index', compact('movies', 'genres', 'directors'));
}

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $people = Person::all();
    $roles = Role::all();
    $genres = Genre::all();

    return view('movies.forms.add_movie', compact('people', 'roles', 'genres'));
}

    /**
     * Store a newly created resource in storage.
     */


public function store(Request $request)
{


    $movie = new Movie();
    $movie->title = $request->title;
    $movie->duration = $request->duration;
    $movie->pegi = $request->pegi;
    $movie->plot = $request->plot;

    if ($request->hasFile('poster')) {
        $path = $request->file('poster')->store('posters', 'public');
        $movie->url_poster = $path;
    }

    $movie->save();


    $movie->genres()->sync($request->genre_ids);


    if ($request->has('cast')) {
        foreach ($request->cast as $castMember) {
            $personId = $castMember['person_id'];
            $roleIds = $castMember['role_ids'] ?? [];

            if (!empty($personId) && !empty($roleIds)) {
                foreach ($roleIds as $roleId) {
                    $movie->people()->attach($personId, [
                        'role_id' => $roleId
                    ]);
                }
            }
        }
    }

    return redirect()->route('movies.index')->with('success', 'Film aggiunto con successo!');
}


    /**
     * Display the specified resource.
     */
   public function show(Movie $movie)
    {

        $movie->load(['genres', 'castMembers.person', 'castMembers.role']);

        $cast_data = $movie->castMembers->map(function ($castItem) {
            return [

                'name'      => $castItem->person->name,
                'last_name' => $castItem->person->last_name,
                'role'      => $castItem->role->name
            ];
        });


        return view('movies.show_movie', compact('movie', 'cast_data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

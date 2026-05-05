<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = Person::all();

        return view('people.all_people', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nationalities = [
            'AR' => 'Argentina',
            'AU' => 'Australia',
            'BR' => 'Brasile',
            'CA' => 'Canada',
            'CN' => 'Cina',
            'DE' => 'Germania',
            'ES' => 'Spagna',
            'FR' => 'Francia',
            'GB' => 'Regno Unito',
            'IN' => 'India',
            'IT' => 'Italia',
            'JP' => 'Giappone',
            'MX' => 'Messico',
            'KR' => 'Corea del Sud',
            'RU' => 'Russia',
            'US' => 'Stati Uniti',
        ];
        return view('people.forms.add_person', compact('nationalities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $new_person = new Person();

        $new_person->name = $data['name'];
        $new_person->last_name = $data['last_name'];
        $new_person->gender = $data['gender'];
        $new_person->date_of_birth = $data['date_of_birth'];
        $new_person->nationality = $data['nationality'];

        if($request->hasFile('url_image')){
            $path =  Storage::disk('public')->putFile('images/people', $data['url_image']);

            $new_person->url_image = $path;
        }

        $new_person->save();

        return redirect()->route('people.show', $new_person);




    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        return view('people.show_person', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        $nationalities = [
            'AR' => 'Argentina',
            'AU' => 'Australia',
            'BR' => 'Brasile',
            'CA' => 'Canada',
            'CN' => 'Cina',
            'DE' => 'Germania',
            'ES' => 'Spagna',
            'FR' => 'Francia',
            'GB' => 'Regno Unito',
            'IN' => 'India',
            'IT' => 'Italia',
            'JP' => 'Giappone',
            'MX' => 'Messico',
            'KR' => 'Corea del Sud',
            'RU' => 'Russia',
            'US' => 'Stati Uniti',
        ];
        return view('people.forms.edit_person', compact('person', 'nationalities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        $data = $request->all();

        $person->name = $data['name'];
        $person->last_name = $data['last_name'];
        $person->gender = $data['gender'];
        $person->date_of_birth = $data['date_of_birth'];
        $person->nationality = $data['nationality'];

        if($request->hasFile('url_image')){

            if($person->url_image){
                Storage::disk('public')->delete($person->url_image);
            }

            $path= Storage::disk('public')->putFile('images/people', $data['url_image']);

            $person->url_image = $path;
        }

        $person->update();

        return redirect()->route('people.show', $person);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person->delete();

        return redirect()->route('people.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flats = Flat::all();

        return view('admin.flats.index', compact('flats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flat = new Flat();
        return view('admin.flats.create', compact('flat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => ['required','min:5','max:70','unique:flats'],
                'default_image'=>['required','image'],
                'rooms'=>['nullable','numeric', 'min:0'],
                'beds'=>['nullable','numeric', 'min:0'],
                'bathrooms'=>['nullable','numeric', 'min:0'],
                'square_meters'=>['nullable','numeric', 'min:0'],
            ],[
                'title.required'=>"Il titolo dell'appartamento è obbligatorio",
                'default_image.required'=>"L'immagine dell'appartamento è obbligatoria",
                'default_image.image'=>"Il file caricato non è supportato",
                'title.min'=>"La lunghezza minima del titolo è di 5 caratteri",
                'title.max'=>"La lunghezza massima del titolo è di 70 caratteri",
                'title.unique'=>"Questo titolo è già presente",
                'rooms.numeric'=>'Il numero di stanze deve essere un numero',
                'beds.numeric'=>'Il numero di letti deve essere un numero',
                'bathrooms.numeric'=>'Il numero di bagni deve essere un numero',
                'square_meters.numeric'=>'Il numero di metri deve essere un numero',
                'rooms.min'=>'Il numero di stanze deve essere maggiore di zero',
                'beds.min'=>'Il numero di letti deve essere maggiore di zero',
                'bathrooms.min'=>'Il numero di bagni deve essere maggiore di zero',
                'square_meters.min'=>'Il numero di metri deve essere maggiore di zero'
            ]
            );
            
            $data = $request->all();
        $data['user_id'] = Auth::id();

        // UPLOAD IMAGE
        if(array_key_exists('default_image',$data)){
            $img_url=Storage::put('flat_images',$data['default_image']);
            $data['default_image']=$img_url;
        }
   
        $flat = new Flat();
        $flat->fill($data);
        $flat->save();

        return redirect()->route('admin.flats.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Flat $flat)
    {
        return view('admin.flats.show', compact('flat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Flat $flat)
    {
        return view('admin.flats.edit', compact('flat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flat $flat)
    {
        $request->validate(
            [
                'title' => ['required','min:5','max:70', Rule::unique('flats')->ignore($flat->id)],
                 'default_image'=>['required','image'],
                'rooms'=>['nullable','numeric', 'min:0'],
                'beds'=>['nullable','numeric', 'min:0'],
                'bathrooms'=>['nullable','numeric', 'min:0'],
                'square_meters'=>['nullable','numeric', 'min:0'],
            ],[
                'title.required'=>"Il titolo dell'appartamento è obbligatorio",
                'default_image.required'=>"L'immagine dell'appartamento è obbligatoria",
                'default_image.image'=>"Il file caricato non è supportato",
                'title.min'=>"La lunghezza minima del titolo è di 5 caratteri",
                'title.max'=>"La lunghezza massima del titolo è di 70 caratteri",
                'title.unique'=>"Questo titolo è già presente",
                'rooms.numeric'=>'Il numero di stanze deve essere un numero',
                'beds.numeric'=>'Il numero di letti deve essere un numero',
                'bathrooms.numeric'=>'Il numero di bagni deve essere un numero',
                'square_meters.numeric'=>'Il numero di metri deve essere un numero',
                'rooms.min'=>'Il numero di stanze deve essere maggiore di zero',
                'beds.min'=>'Il numero di letti deve essere maggiore di zero',
                'bathrooms.min'=>'Il numero di bagni deve essere maggiore di zero',
                'square_meters.min'=>'Il numero di metri deve essere maggiore di zero'
            ]
            );
        $data = $request->all();
        $flat->update($data);

        return redirect()->route('admin.flats.show', compact('flat'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flat $flat)
    {
        $flat->delete();

        return redirect()->route('admin.flats.index');
    }
}

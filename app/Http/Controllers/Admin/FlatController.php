<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flat;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.flats.create');
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
                'title' => ['min:5','max:70','unique:flats','required'],
                'image'=>['required'],
                'rooms'=>['nullable','numeric'],
                'beds'=>['nullable','numeric'],
                'bathrooms'=>['nullable','numeric'],
                'square_meters'=>['nullable','numeric'],
            ],[
                'title.min'=>"La lunghezza minima del titolo è di 5 caratteri",
                'title.max'=>"La lunghezza massima del titolo è di 70 caratteri",
                'title.required'=>"Il titolo dell'appartamento è obbligatorio",
                'image.required'=>"L'immagine dell'appartamento è obbligatoria",
                'rooms.numeric'=>'Il numero di stanze deve essere un numero',
                'beds.numeric'=>'Il numero di letti deve essere un numero',
                'bathrooms.numeric'=>'Il numero di bagni deve essere un numero',
                'square_meters.numeric'=>'Il numero di metri deve essere un numero'
            ]
            );
            
            $data = $request->all();
        $data['user_id'] = Auth::id();

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

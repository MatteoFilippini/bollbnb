<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Flat;
use App\Models\FlatSponsor;
use Carbon\Carbon;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $flat = Flat::all();
        $sponsors = Sponsor::all();
        return view('admin.sponsors.index', compact('sponsors', 'flat')); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // prendo la data di oggi
        $date = Carbon::now();
        // dd($date);
        $data = $request->all();

        // date le ore calcolo quanti giorni aggiungere partendo dalla data di oggi
        $d = 1;
        if ($data['sponsor_id'] == '72:00:00') $d = 2;
        else $d = 3;
        $modifiedMutable = $date->add($d, 'day');

        $flat_sponsor = new FlatSponsor();
        $flat_sponsor->flat_id = $data['flat_id'];
        $flat_sponsor->sponsor_id = $data['sponsor_id'];
        $flat_sponsor->expiration = $modifiedMutable;
        $flat_sponsor->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Flat $flat)
    {
        $sponsors = Sponsor::all();
        return view('admin.sponsors.show', compact('sponsors', 'flat'));
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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Flat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // prendo gli appartamenti con sponsorizzazione
        $flats_sponsor = DB::table('flat_sponsor')
            ->join('flats', 'flat_sponsor.flat_id', '=', 'flats.id')
            ->select('flats.*')
            ->distinct()->where('visible', 1)->get();
        // prendo gli ID degli appartamenti sponsorizzati
        $flat_sponsor_ids = [];
        foreach ($flats_sponsor as $fs) {
            array_push($flat_sponsor_ids, $fs->id);
        };

        // prendo tutti gli appartamenti
        $flats = Flat::where('visible', 1)->get();

        // prendo gli appartamenti NON sponsorizzati
        $not_sponsor = [];
        foreach ($flats as $flat) {
            if (!in_array($flat->id, $flat_sponsor_ids)) {
                array_push($not_sponsor, $flat);
            }
        }

        return response()->json(['sponsor_id' => $flat_sponsor_ids, 'sponsor' => $flats_sponsor, 'not_sponsor' => $not_sponsor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flat = Flat::where('id', $id)->with(['user'])->first();
        if (!$flat) return response('Errore 404', 404);
        return response()->json($flat);
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

<?php

namespace App\Http\Controllers\Api;

use App\Models\FlatSponsor;
use App\Http\Controllers\Controller;
use App\Models\Flat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date=Carbon::now();
        $flats_sponsor = [];
        $query = FlatSponsor::with('flat')->get();
        foreach ($query as $fs) {
            // controllo se è scaduta
            if($fs->expiration>$date){
                array_push($flats_sponsor, $fs->flat);
            }
        };

        // prendo gli ID degli appartamenti sponsorizzati
        $flat_sponsor_ids = [];
        foreach ($flats_sponsor as $fs) {
            array_push($flat_sponsor_ids, $fs->id);
        };

        // prendo tutti gli appartamenti
        $flats = Flat::with('user', 'address')->get();
        // prendo gli apparamenti con queli id
        $sponsor = [];
        $not_sponsor = [];
        foreach ($flats as $flat) {
            if (!in_array($flat->id, $flat_sponsor_ids)) {
                $flat['image_url'] = Storage::url($flat->default_image);
                array_push($not_sponsor, $flat);
            } else {
                $flat['image_url'] = Storage::url($flat->default_image);
                array_push($sponsor, $flat);
            }
        }

        return response()->json(['sponsor' => $sponsor, 'Nsponsor' => $not_sponsor]);
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
    public function show($slug)
    {
        $flat = Flat::where('slug', $slug)->with(['user','address','services'])->first();
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

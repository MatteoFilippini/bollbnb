<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Flat;
use App\Models\FlatSponsor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $data = $request->all();
        $id_flat = $data['flat_id'];
        // prendo il tipo di sponsorizzazione e i suoi giorni
        $d = 0;
        if ($data['sponsor_id'] == 1) $d = 1;
        if ($data['sponsor_id'] == 2) $d = 3;
        if ($data['sponsor_id'] == 3) $d = 6;
        // prendo la riga di flat_sponsors con il flat_id dell appartamento
        $flat_sponsor = DB::table('flat_sponsors')
        ->join('flats', 'flat_sponsors.flat_id', '=', 'flats.id')
            ->select('flat_sponsors.*')
            ->where('flat_id', $id_flat)
            ->get();

        // controllo se ce o no la riga
        if (!empty($flat_sponsor[0])) {
            // GIA SPONSORIZZATO
            foreach ($flat_sponsor as $f) {
                // converto la data da tipo stringa a date
                $exp = Carbon::createFromFormat('Y-m-d', $f->expiration);
                if ($exp > $date) {
                    // NON SCADUTO   
                    // aggiungo giorni alla data  
                    $update = $exp->add($d, 'day');
                    $a = $update->toDateString();
                    $f->expiration = $a;
                    // aggiorna la riga della tabella
                    $aaaaaa= DB::table('flat_sponsors')
                    ->where('id', $f->id)
                    ->update(array("expiration" => $a));
                }else {
                    // SCADUTO  
                    // elimino la riga 
                    $aaaaaa= DB::table('flat_sponsors')
                    ->where('id', $f->id)
                    ->delete();
                    // riaggiungo una nuova riga
                    $modifiedMutable = $date->add($d, 'day');
                    $flat_sponsoro = new FlatSponsor();
                    $flat_sponsoro->flat_id = $data['flat_id'];
                    $flat_sponsoro->sponsor_id = $data['sponsor_id'];
                    $flat_sponsoro->expiration = $modifiedMutable;
                    $flat_sponsoro->save();
                  }
            }
        } else {
            // NON ANCORA SPONSORIZZATO         
            $modifiedMutable = $date->add($d, 'day');
            $flat_sponsoro = new FlatSponsor();
            $flat_sponsoro->flat_id = $data['flat_id'];
            $flat_sponsoro->sponsor_id = $data['sponsor_id'];
            $flat_sponsoro->expiration = $modifiedMutable;
            $flat_sponsoro->save();
        }

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

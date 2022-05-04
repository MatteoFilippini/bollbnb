<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Flat;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $flats = [];
        $address_flat = Address::with('flat')->get();
        foreach ($address_flat as $a) {
            $poi['name'] = $a->flat->title;
            $address['freeformAddress'] = $a->address;
            $position['lat'] = $a->latitude;
            $position['lon'] = $a->longitude;
            $flat = $a->flat->id;

            // $user = User::find($flat->user_id);

            // , 'flat' => $flat, 'user' => $user
            $flats[] = ['poi' => $poi, 'address' => $address, 'position' => $position, 'id' => $flat];
        }

        return response()->json($flats);
        // ['poi' => $poi, 'address' => $address, 'position' => $position]


        // [
        //     {
        //         "poi"=>{"name":"S Restaurant Toms"},
        //         "address"=>{"freeformAddress":"2880 Broadway, New York, NY 10025"},
        //         "position":{"lat":40.80558,"lon":-73.96548}
        //     },
        //     {
        //         "poi":{"name":"Yasha Raman Corporation"},
        //         "address":{"freeformAddress":"940 Amsterdam Ave, New York, NY 10025"},
        //         "position":{"lat":40.80076,"lon":-73.96556}
        //     }
        // ]
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

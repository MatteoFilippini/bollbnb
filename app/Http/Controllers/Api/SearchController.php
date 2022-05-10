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
    public function index($initialPosition)
    {
        $initial = json_decode($initialPosition, true);
        // dd($intial);
        $fromLat = $initial['lat'];
        $fromLon = $initial['lon'];
        $radius=$initial['radius'];
        $flats = Flat::with('user')->get();
        
        $filteredFlats = [];
        // $latitude1 = 45.14296;
        //  $longitude1 = 10.01502;
        function getDistance($latitude1, $longitude1, $latitude2, $longitude2) {
            $earth_radius = 6371;
            
            $dLat = deg2rad($latitude2 - $latitude1);
            $dLon = deg2rad($longitude2 - $longitude1);
            
            $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
            $c = 2 * asin(sqrt($a));
            $d = $earth_radius * $c;
            
            return $d;
        }

        // $d = getDistance($fromLat, $fromLon, $toLat, $toLon);

        foreach($flats as $flat){
            
            if(getDistance($fromLat, $fromLon, $flat->address->latitude, $flat->address->longitude) <= $radius){
                $flat['distance'] = getDistance($fromLat, $fromLon, $flat->address->latitude, $flat->address->longitude);
                // prendo gli id dei servizi diogni appartamento
                $service_ids=[];
                foreach ($flat->services as $service){
                    array_push($service_ids,$service->id);
                }
                $flat['service_ids']=$service_ids;
                array_push($filteredFlats , $flat);
            }
            //  array_push($filteredFlats,$flat->address->latitude);
            
        }

        // $services_ids=[];
        // foreach ($filteredFlats as $flat){
        //     foreach ($flat->services as $service){
        //         array_push($services_ids,$service->id);
        //     }
        //     $flat->service_ids=$services_ids;
        // }




        // $flats = [];
        // $address_flat = Address::with('flat')->get();
        // foreach ($address_flat as $a) {
        //     $poi['title'] = $a->flat->title;
        //     $poi['default_image'] = $a->flat->default_image;
        //     $address['freeformAddress'] = $a->address;
        //     $position['lat'] = $a->latitude;
        //     $position['lon'] = $a->longitude;
        //     $flat_id = $a->flat->id;

        //     // $user = User::find($flat->user_id);
        
        //     // , 'flat' => $flat, 'user' => $user
        //     $flats[] = ['poi' => $poi, 'address' => $address, 'position' => $position, 'id' => $flat_id];
        // }

        return response()->json($filteredFlats);
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

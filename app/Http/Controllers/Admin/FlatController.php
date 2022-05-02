<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\Flat;
use App\Models\Message;
use App\Models\Service;
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
        $user_id = $user = auth()->user()->id;
        $flats = Flat::where('user_id', $user_id)->get();
        return view('admin.flats.index', compact('flats', 'user_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flat = new Flat();
        $services = Service::all();

        return view('admin.flats.create', compact('flat', 'services'));
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
                'title' => ['required', 'min:5', 'max:70', 'unique:flats'],
                'default_image' => ['required', 'image'],
                'rooms' => ['nullable', 'numeric', 'min:0'],
                'beds' => ['nullable', 'numeric', 'min:0'],
                'bathrooms' => ['nullable', 'numeric', 'min:0'],
                'square_meters' => ['nullable', 'numeric', 'min:0'],
                'address' => ['required', 'string', 'max:50'],
                'city' => ['required', 'string', 'max:30'],
                'latitude' => ['required', 'numeric', 'between:-90,90'],
                'longitude' => ['required', 'numeric', 'between:-180,180'],
                'position' => ['required', 'string', 'max:17']
            ],
            [
                'title.required' => "Il titolo dell'appartamento è obbligatorio",
                'default_image.required' => "L'immagine dell'appartamento è obbligatoria",
                'default_image.image' => "Il file caricato non è supportato",
                'title.min' => "La lunghezza minima del titolo è di 5 caratteri",
                'title.max' => "La lunghezza massima del titolo è di 70 caratteri",
                'title.unique' => "Questo titolo è già presente",
                'rooms.numeric' => 'Il numero di stanze deve essere un numero',
                'beds.numeric' => 'Il numero di letti deve essere un numero',
                'bathrooms.numeric' => 'Il numero di bagni deve essere un numero',
                'square_meters.numeric' => 'Il numero di metri deve essere un numero',
                'rooms.min' => 'Il numero di stanze deve essere maggiore di zero',
                'beds.min' => 'Il numero di letti deve essere maggiore di zero',
                'bathrooms.min' => 'Il numero di bagni deve essere maggiore di zero',
                'square_meters.min' => 'Il numero di metri deve essere maggiore di zero',
                'latitude.required' => 'La Latitudine è obbligatoria',
                'latitude.numeric' => 'La latitudine deve essere un numero',
                'latitude.between' => 'La latitudine deve essere tra -90 e 90 gradi',
                'longitude.required' => 'La latitudine è obbligatoria',
                'longitude.numeric' => 'La latitudine deve essere un numero',
                'longitude.between' => 'La latitudine deve essere tra -180 e 180 gradi',
                'position.required' => 'La posizione è obbligatoria',
                'position.string' => 'La posizione deve essere una stringa',
                'position.max' => 'La posizione deve essere lunga al massimo 17 caratteri'
            ]
        );


        $data = $request->all();
        $data['user_id'] = Auth::id();

        // UPLOAD IMAGE
        if (array_key_exists('default_image', $data)) {
            $img_url = Storage::put('flat_images', $data['default_image']);
            $data['default_image'] = $img_url;
        }

        $flat = new Flat();
        $flat->fill($data);
        $flat->save();

        //connect address
        $address = new Address();
        $address->address = $data['address'];
        $address->city = $data['city'];
        $address->latitude = $data['latitude'];
        $address->longitude = $data['longitude'];
        $address->position = $data['position'];
        $flat->address()->save($address);

        //connect services
        if (array_key_exists('services', $data)) $flat->services()->attach($data['services']);

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
        $message = Message::where('flat_id', $flat->id)->get();
        return view('admin.flats.show', compact('flat', 'message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Flat $flat)
    {
        $services = Service::all();
        $flat_services_ids = $flat->services->pluck('id')->toArray();


        return view('admin.flats.edit', compact('flat', 'services', 'flat_services_ids'));
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
                'title' => ['required', 'min:5', 'max:70', Rule::unique('flats')->ignore($flat->id)],
                'default_image'=>['image'],
                'rooms' => ['nullable', 'numeric', 'min:0'],
                'beds' => ['nullable', 'numeric', 'min:0'],
                'bathrooms' => ['nullable', 'numeric', 'min:0'],
                'square_meters' => ['nullable', 'numeric', 'min:0'],
                'address' => ['required', 'string', 'max:50'],
                'city' => ['required', 'string', 'max:30'],
                'latitude' => ['required', 'numeric', 'between:-90,90'],
                'longitude' => ['required', 'numeric', 'between:-180,180'],
                'position' => ['required', 'string', 'max:17']
            ],
            [
                'default_image.image' =>'Formato immagine non valido',
                'title.required' => "Il titolo dell'appartamento è obbligatorio",
                'title.min' => "La lunghezza minima del titolo è di 5 caratteri",
                'title.max' => "La lunghezza massima del titolo è di 70 caratteri",
                'title.unique' => "Questo titolo è già presente",
                'rooms.numeric' => 'Il numero di stanze deve essere un numero',
                'beds.numeric' => 'Il numero di letti deve essere un numero',
                'bathrooms.numeric' => 'Il numero di bagni deve essere un numero',
                'square_meters.numeric' => 'Il numero di metri deve essere un numero',
                'rooms.min' => 'Il numero di stanze deve essere maggiore di zero',
                'beds.min' => 'Il numero di letti deve essere maggiore di zero',
                'bathrooms.min' => 'Il numero di bagni deve essere maggiore di zero',
                'square_meters.min' => 'Il numero di metri deve essere maggiore di zero',
                'latitude.required' => 'La Latitudine è obbligatoria',
                'latitude.numeric' => 'La latitudine deve essere un numero',
                'latitude.between' => 'La latitudine deve essere tra -90 e 90 gradi',
                'longitude.required' => 'La latitudine è obbligatoria',
                'longitude.numeric' => 'La latitudine deve essere un numero',
                'longitude.between' => 'La latitudine deve essere tra -180 e 180 gradi',
                'position.required' => 'La posizione è obbligatoria',
                'position.string' => 'La posizione deve essere una stringa',
                'position.max' => 'La posizione deve essere lunga al massimo 17 caratteri'
            ]
        );


        $data = $request->all();
        if (array_key_exists('default_image', $data)) {
            $img_url = Storage::put('flat_images', $data['default_image']);
            $data['default_image'] = $img_url;
        }

        // $flatsColums = [
        //     'title' => $data['title'],
        //     'rooms' => $data['rooms'],
        //     'beds' => $data['beds'],
        //     'bathrooms' => $data['bathrooms'],
        //     'square_meters' => $data['square_meters'],
        //     'default_image' => $data['default_image']
        // ];
        
        $flat->title = $data['title'];
        $flat->rooms = $data['rooms'];
        $flat->beds = $data['beds'];
        $flat->bathrooms = $data['bathrooms'];
        $flat->square_meters = $data['square_meters'];
        if(array_key_exists('default_image', $data))$flat->default_image = $data['default_image'];
        
        $flat->update();

 //connect address
        $address = Address::where('flat_id', $flat->id);
        $updateAddress = [
            'address' => $data['address'],
            'city' => $data['city'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'position' => $data['position']
        ];
        // $address->flat_id = $flat->id;
        // $address->address = $data['address'];
        // $address->city = $data['city'];
        // $address->latitude = $data['latitude'];
        // $address->longitude = $data['longitude'];
        // $address->position = $data['position'];
        $address->update($updateAddress);

        //update services
        if (!array_key_exists('services', $data)) $flat->services()->detach();
        else $flat->services()->sync($data['services']);

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

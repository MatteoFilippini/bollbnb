<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageForm extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'content' => ['required']
        ], [
            'email.required' => 'La mail è obbligatori1 LARAVEL',
            'email.email' => 'La mail non è valida LARAVEL',
            'name.required' => 'Il nome è obbligatorio LARAVEL',
            'content.required' => 'Il contenuto è obbligatorio LARAVEL',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $message = new Message();
        $message->flat_id = $data['id'];
        $message->content = $data['content'];
        $message->date = Carbon::now();;
        $message->sender_mail = $data['email'];
        $message->sender_name = $data['name'];
        $message->save();

        return response('Messaggio inviato', 204);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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

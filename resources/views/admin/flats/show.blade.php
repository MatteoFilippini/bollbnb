@extends('layouts.app')

@section('content')
<div class="container">
    <h1> {{$flat->id}}</h1>
    <h1>
        <div class="d-flex justify-content-between">
            {{$flat->title}}
            <a href="{{route('admin.flats.index')}}" class="btn btn-danger mb-3">TORNA INDIETRO</a>
        </div>
    </h1>
    <p>
        {{$flat->square_meters}} mq
    </p>
    <div>
        {{$flat->description}}
    </div>
    <div>
        <img src="{{asset('storage/'.$flat->default_image)}}" alt="cover_image" style="width: 400px;height:400px">
    </div>

    <h2>Messaggi ricevuti:</h2>

    @forelse($message as $m)
    <div>
        da: {{$m->sender_mail}}
        contenuto: {{$m->content}}
    </div>
    @empty
    <div>
        Non hai ricevuto ancora messaggi
    </div>
    @endforelse


</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h1 class="d-flex justify-content-between">
            {{$flat->title}}
            <a href="{{route('admin.flats.index')}}" class="btn btn-danger mb-3">TORNA INDIETRO</a>
        </h1>
    </div>
    <h4>{{$flat->address->address}}</h4>
    @if ($flat->description)
    <div>
        {{$flat->description}}
    </div>
    @else
    <div>Nessuna descrizione inserita</div>
    @endif
    <div>
        <img src="{{asset('storage/'.$flat->default_image)}}" alt="cover_image" class="img-fluid">
    </div>

    <h2>Messaggi ricevuti:</h2>

    @forelse($message as $m)
    <div class="border border-light">
        <p>da: {{$m->sender_mail}}</p>
        <p>contenuto: {{$m->content}}</p>

    </div>
    @empty
    <div>
        Non hai ricevuto ancora messaggi
    </div>
    @endforelse


</div>
@endsection
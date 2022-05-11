@extends('layouts.app')

@section('content')
<div class="container w show">
    <div class="d-flex justify-content-between align-items-center">
        <h1 >
            {{$flat->title}}
            </h1>
            <!-- HOST -->
        <h3>Host: {{$flat->user->name}}</h3>
    </div>
    <h5 class="text-decoration my-4">Indirizzo:{{$flat->address->address}}</h5>
    <!-- immagine -->
    <div class="img-show">
        <img src="{{asset('storage/'.$flat->default_image)}}" alt="cover_image" class="img-fluid">
    </div>
    
    <!-- descrizione -->
    @if ($flat->description)
    <div class="msg p-3">
        <div class="desc">Descrizione</div>
        <p>
            {{$flat->description}}
        </p>
    </div>
    @else
    <div class="text-muted msg p-3">Nessuna descrizione inserita</div>
    @endif
    
    <!-- messaggi -->
    <h2 class="mt-5">Messaggi ricevuti:</h2>
    @forelse($message as $m)
    <div class="border border-light p-3 mb-3 msg">
        <div class="my-3">

            <h4 class="d-inline" >Cliente: </h4><p class="d-inline">{{$m->sender_mail}}</p>
        </div>
        <div class="mb-3">

            <h4 class="d-inline">Domanda: </h4><p class="d-inline">{{$m->content}}</p>     
        </div>
    </div>
    @empty
    <div class="border border-light p-3 mb-3 msg">
        Non hai ricevuto ancora messaggi
    </div>
    @endforelse

    <!-- indietro -->
    <a href="{{route('admin.flats.index')}}" class="back">TORNA INDIETRO</a>
    
    <style lang="scss" scoped>
        .w{
            color: white; 
            /* border:1px solid lightgray;  
            padding:40px;      */
        }
        .img{
            margin:20px 0;
            height:300px;
            width:500px;
            border-radius:20px;
            background-color: red;
        }
        .desc{
            font-size:25px;
        }
        .back{
            background-color: #FF385C;
            color: white;
            padding:7px 15px;
            border-radius:20px;
            font-size: 1rem;
            text-decoration: none;
        }

        
  
    </style>

</div>
@endsection
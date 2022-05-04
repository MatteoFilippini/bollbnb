@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('admin.flats.index')}}" class="btn btn-success ml-3">TORNA INDIETRO</a>
    <div class="row">
        @foreach($sponsors as $sponsor)
        <div class="col-4">
            <div class="card my-5">
                <div class="card-header text-dark">
                    {{$sponsor->label}}
                 </div>
             <div class="card-body text-dark">
                <h5 class="card-title">{{$sponsor->price}}</h5>
                 <p class="card-text">{{$sponsor->length}}</p>
        <button type="button" data-toggle="collapse" data-target="#collapseExample{{$sponsor->id}}" aria-expanded="false" aria-controls="collapseExample" class="sponsor-button">SPONSORIZZA</button>
            </div>
</div>
</div>
@endforeach

<div class="container">
    <div class="row">
        @foreach($sponsors as $sponsor)
        <div class="col-12">
            <div class="collapse text-dark" id="collapseExample{{$sponsor->id}}">
                <div class="card card-body text-center">
                    <h2>{{$sponsor->label}}</h2>
                    <p>Sponsorizzazione per {{$sponsor->length}} ore. Dai valore al tuo appartamento con questa sponsorizzazione.</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

<script>
</script>
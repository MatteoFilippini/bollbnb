@extends('layouts.app')
@section('content')
<div class="container sfondo px-4">
    <div class="text-center">
        <h3 class=" mb-5">In questa sezione puoi accedere ai dettagli dei tuoi appartamenti, modificarli o inserire un nuovo appartamento 
            sul nostro sito!
        </h3>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6">

        </div>
        <div class="col-12 col-lg-6 d-flex justify-content-center">
            <a href="{{route('admin.flats.create')}}" class="btn btn-small btn-primary mb-5">
                AGGIUNGI UN NUOVO APPARTAMENTO
            </a>
        </div>
    </div>

    <h4 class=" mb-5">
        I TUOI APPARTAMENTI:
    </h4>
    <hr style="border-color: black" class="mb-5">
    @foreach ($flats as $flat)
    <div class="row mb-5">
            <div class="col-12 col-md-6">
                <div class="d-flex justify-content-center justify-content-md-between mb-3 text-center">
                    <a href="{{route('admin.flats.show', $flat->id)}}" class="text-dark">
                        {{$flat->title}}
                    </a>
                    {{-- <figure class="col-12 col-md-6">
                        <img src="{{$flat->default_image}}" alt="img" class="img-fluid" style="height: 100px">
                    </figure> --}}
                </div>
            </div>
            <div class="col-12 col-md-6">
                    <div class="d-flex justify-content-center">
                        <a href="{{route('admin.flats.edit', $flat->id)}}" class="btn btn-success mr-1">MODIFICA</a>
                        <form action="{{route('admin.flats.destroy', $flat->id)}}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">ELIMINA</button>
                            <a href="{{route('admin.sponsors.show', $flat->id)}}" class="btn btn-primary">SPONSORIZZA</a>
                        </form>
                    </div>
            </div>
        </div>
            @endforeach
            <hr style="border-color: white" class="mt-5">

</div>
@endsection

@section('additional-scripts')
<script src="{{ asset('js/delete-confirm.js') }}"></script>
@endsection
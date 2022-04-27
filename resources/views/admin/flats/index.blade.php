@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('admin.flats.create')}}" class="btn btn-small btn-primary mb-5">
        AGGIUNGI APPARTAMENTO
    </a>
    <ul>
        @foreach ($flats as $flat)
        <li>
            <div class="d-flex justify-content-between mb-3">
                <a href="{{route('admin.flats.show', $flat->id)}}">
                    {{$flat->title}}
                </a>
                <a href="{{route('admin.flats.edit', $flat->id)}}" class="btn btn-success">MODIFICA</a>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection
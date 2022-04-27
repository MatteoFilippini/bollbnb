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
                <div class="d-flex justify-content-around">
                    <a href="{{route('admin.flats.edit', $flat->id)}}" class="btn btn-success mr-3">MODIFICA</a>
                    <form action="{{route('admin.flats.destroy', $flat->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">ELIMINA</button>
                    </form>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection
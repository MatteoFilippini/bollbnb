@extends('layouts.app')
@section('content')
<a href="{{route('admin.flats.create')}}" class="btn btn-small btn-primary">
    AGGIUNGI APPARTAMENTO
</a>
<ul>
    @foreach ($flats as $flat)
    <li>
        <a href="{{route('admin.flats.show', $flat->id)}}">
            {{$flat->title}}
        </a>
    </li>

    @endforeach
</ul>
@endsection
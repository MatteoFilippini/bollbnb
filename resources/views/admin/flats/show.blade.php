@extends('layouts.app')

@section('content')
<div class="container">
    <h1>
        {{$flat->title}}
    </h1>
    <p>
        {{$flat->square_meters}} mq
    </p>
    <div>
    <img src="{{asset('storage/'.$flat->default_image)}}" alt="cover_image" style="width: 400px;height:400px">
    </div>
</div>
@endsection
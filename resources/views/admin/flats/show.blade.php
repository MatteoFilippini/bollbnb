@extends('layouts.app')

@section('content')
<div class="container">
    <h1>
        {{$flat->title}}
    </h1>
</div>
<p>
    {{$flat->square_meters}} mq
</p>
@endsection
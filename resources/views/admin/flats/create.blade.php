@extends('layouts.app')


@section('content')
@include('admin.flats.includes.form')
@endsection

@section('additional-scripts')
<script src="{{ asset('js/preview.js') }}"></script>
<script src="{{ asset('js/tom-tom.js') }}"></script>
@endsection
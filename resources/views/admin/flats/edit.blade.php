@extends('layouts.app')

@section('content')
@include('admin.flats.includes.form')
@endsection

@section('additional-scripts')
<script src="{{ asset('js/preview.js') }}"></script>
@endsection
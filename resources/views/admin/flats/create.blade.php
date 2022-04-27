@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('admin.flats.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input type="text" class="form-control" id="title" aria-describedby="descrizione" name="title">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="default_image">Immagine copertina</label>
                    <input type="text" class="form-control" id="default_image" aria-describedby="descrizione" name="default_image">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="description">Descrizione</label>
                    <textarea class="form-control" id="description" rows="5" name="description"></textarea>

                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="rooms">Numero Stanze</label>
                    <input type="number" min="0" class="form-control" id="rooms" aria-describedby="descrizione" name="rooms">

                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="beds">Numero letti</label>
                    <input type="number" min="0" class="form-control" id="beds" aria-describedby="descrizione" name="beds">

                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="bathrooms">Numeri bagni</label>
                    <input type="number" min="0" class="form-control" id="bathrooms" aria-describedby="descrizione" name="bathrooms">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="square_meters">Metri quadrati casa</label>
                    <input type="number" min="0" class="form-control" id="square_meters" aria-describedby="descrizione" name="square_meters">
                </div>
            </div>
            <div class="col-4">
                <label for="services">Servizi</label>
                <select class="form-control" id="services">
                    <option>--</option>
                    <option value=""></option>
                </select>
            </div>

        </div>
        <hr>
        <button type="submit" class="btn btn-primary my-5">Crea</button>
    </form>
</div>
@endsection
@if ($errors->any())
<div class="container">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif


<div class="container">
    <a href="{{route('admin.flats.index')}}" class="btn btn-danger mb-3">TORNA INDIETRO</a>
    @if ($flat->exists)        
    <form action="{{route('admin.flats.update', $flat->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @else
        <form action="{{route('admin.flats.store')}}" method="POST" enctype="multipart/form-data">
            @endif
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title', $flat->title)}}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="default_image">Immagine copertina</label>
                    <input type="file" class="form-control-file" id="default_image" name="default_image">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="description">Descrizione</label>
                    <textarea class="form-control" id="description" rows="5" name="description" value="{{old('description', $flat->description)}}"></textarea>

                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="rooms">Numero Stanze</label>
                    <input type="number"  class="form-control" id="rooms" name="rooms" value="{{old('rooms', $flat->rooms)}}">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="beds">Numero letti</label>
                    <input type="number"  class="form-control" id="beds" name="beds" value="{{old('beds', $flat->beds)}}">

                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="bathrooms">Numeri bagni</label>
                    <input type="number"  class="form-control" id="bathrooms" name="bathrooms" value="{{old('bathrooms', $flat->bathrooms)}}">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="square_meters">Metri quadrati casa</label>
                    <input type="text" class="form-control" id="square_meters" name="square_meters" value="{{old('square_meters', $flat->square_meters)}}">
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
        <button type="submit" class="btn btn-success">Conferma</button>
    </form>
</div>
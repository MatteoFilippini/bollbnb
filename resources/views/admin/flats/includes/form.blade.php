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
    <form action="{{route('admin.flats.update', $flat->id)}}" method="POST" enctype="multipart/form-data" id="editForm">
        @method('PUT')
        @else
        <form action="{{route('admin.flats.store')}}" method="POST" enctype="multipart/form-data" id="editForm">
            @endif
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title', $flat->title)}}" required>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="default_image">Immagine copertina</label>
                    <input type="file" class="form-control-file" id="default_image" name="default_image" required>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="address">Indirizzo</label>
                    <input type="text" class="form-control" id="address" name="address" required >
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
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
                    <input type="number"  class="form-control" id="rooms" name="rooms" value="{{old('rooms', $flat->rooms)}}" min="0" required>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="beds">Numero letti</label>
                    <input type="number"  class="form-control" id="beds" name="beds" value="{{old('beds', $flat->beds)}}" min="0" required>

                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="bathrooms">Numeri bagni</label>
                    <input type="number"  class="form-control" id="bathrooms" name="bathrooms" value="{{old('bathrooms', $flat->bathrooms)}}" min="0" required>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="square_meters">Metri quadrati casa</label>
                    <input type="text" class="form-control" id="square_meters" name="square_meters" value="{{old('square_meters', $flat->square_meters)}}" min="0" required>
                </div>
            </div>
                <div class="col-12">
                    @foreach ($services as $service)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="service-{{$service->id}}" value="{{$service->id}}" name="services[]" 
                        @if (in_array($service->id, old('services', $flat_services_ids ?? []))) checked @endif>
                        <label class="form-check-label" for="service-{{$service->id}}">{{$service->type}}</label>
                    </div>
                    @endforeach
                </div>
                
            <hr>  
            <input type="hidden" value="" id="position" name='position'>
            <input type="hidden" value="" id="latitude" name='latitude'>
            <input type="hidden" value="" id="longitude" name='longitude'>
            <button type="submit" class="btn btn-success" id="confirm">Conferma</button>

        </div>
    </form>
</div>
<script src="{{ asset('js/app.js') }}"></script>

<script>
//  $(document).ready(function numeric() {
//         $("button").click(function() {
//             var inputVal = $('#rooms').val();
//             if($.isNumeric(inputVal)){
//                console.log(true); 
//             }else{
//                 console.log(false);                 };
//         });
//     });
        
// Wait for the DOM to be ready
//Aggiungo un evento sul tag con id address
$( "#address" ).on( "change", function() {
    console.log('evento');

//let str = document.querySelector('#address').value;
//Recupero il value dell'input con id address
let str = $("#address").val();
  


console.log(str);
//Per passare il valore della stringa e avere la posizione da TOM TOM devo encodare la stringa 
//che mi arriva dall'input
const encodedUrl = encodeURIComponent(str);
console.log(encodedUrl);
data = {
name: 'ciao'
};

//Faccio la chiamata API classica con headers 'Content-Type': 'application/json'
$.ajax({
  type: 'GET', 
  url: `https://api.tomtom.com/search/2/geocode/${encodedUrl}.json?key=pkCWDKdXKoZyvsUh2s53ebk9fAJvlUQ3`,
   cache: 'false',
  contentType:'application/json',
  headers: {
    'Content-Type': 'application/json',
  },
  data: data,
  //Funzione se la chiamata ha successo
  success: function (response){
     position = response.results[0].position;
     //Prendo gli input type hidden e gli assegno il valore del risultato che verrà
     //inviato al server
      let positionInput = $('#position').val(`${position.lat},${position.lon}`);
      let inputLat = $('#latitude').val(position.lat);
      let inputLon = $('#longitude').val(position.lon);
     console.log(positionInput.val());
},
  error: function (){
     console.log('no');
},
  complete: function (){
     console.log('yes');
}
}); 
});




//---------------------------------------------------------------------------------------------



//Inizio Validazione
$(function() {

//Dichiaro dei metodi custom aggiuntivi per validare gli input    
 jQuery.validator.addMethod("numericRooms", function(inputId){
        
        var inputVal = $('#rooms').val();
        if($.isNumeric(inputVal) && inputVal > 0){
            return true;
        }else{
            return false;
        };
}); 
jQuery.validator.addMethod("numericBeds", function(inputId){
        
        var inputVal = $('#beds').val();
        if($.isNumeric(inputVal) && inputVal > 0){
            return true;
        }else{
            return false;
        };
}); 
jQuery.validator.addMethod("numericBathrooms", function(inputId){
        
        var inputVal = $('#bathrooms').val();
        if($.isNumeric(inputVal) && inputVal > 0){
            return true;
        }else{
            return false;
        };
}); 
jQuery.validator.addMethod("numericMeters", function(inputId){
        
        var inputVal = $('#square_meters').val();
        if($.isNumeric(inputVal) && inputVal > 0){
            return true;
        }else{
            return false;
        };
}); 
jQuery.validator.addMethod("positionGet", function(inputId){
        
        var inputVal = $('#position').val();
        if(inputVal){
            return true;
        }else{
            return false;
        };
}); 





//---------------------------------------------------------------------------------------------


 

//Funzione di validazione con oggetti, chiave e valore
  $("#editForm").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      done : true,
      title: {
        required: true,
        minlength: 5,
        maxlength:70
      },
      default_image: {
        required: true,
        // image: true
      },
      address:{
          required:true
      },
      rooms: {
        // Specify that email should be validated
        // by the built-in "email" rule
        required: true,
        numericRooms: true,
        maxlength: 254
      },
      beds:{
        required: true,
          numericBeds:true
      },
      bathrooms: {
        required: true,
        numericBathrooms:true
      },
      square_meters: {
        required: true,
        numericMeters:true
      }
    },
    // Messaggi di errore custom
    messages: {
      title:{
          required:"Il titolo è obbligatorio",
          maxlength:"Il titolo può essere al massimo di 70 caratteri",
          minlength:"Il titolo deve essere al minimo di 5 caratteri"

      } ,
      default_image:{
          required:"L'immagine di copertina è obbligatoria",
      } ,
      address:{
          required:"L'indirizzo è obbligatorio"
      },
      rooms: {
        required:"Il numero di stanze è obbligatorio",
        numericRooms: "Il numero di stanze deve essere un numero e deve essere maggiore di zero"
      },
      beds:{
        required:"Il numero di bagni è obbligatorio",
          numericBeds:'Il numero di letti deve essere un numero e deve essere maggiore di zero'
      },
      bathrooms: {
        required:"Il numero di bagni è obbligatorio",
        numericBathrooms:'Il numero di dei bagni deve essere un numero e deve essere maggiore di zero'
      },
      square_meters: {
        required:"Il numero di bagni è obbligatorio",
        numericMeters:'Il numero di dei metri quadri deve essere un numero e deve essere maggiore di zero'
      }
    },
    
    //Se tutte le regole di validazione sono rispettate mi submitta il form
    submitHandler: function(form) {
      form.submit();
    }
  });
});

 </script>
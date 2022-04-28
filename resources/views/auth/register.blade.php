@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="regForm">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}"  autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div>
                                    <strong id="mailError"></strong>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date_of_birth') }}</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}"  autocomplete="date_of_birth" autofocus>

                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password_confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btnRegister">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 <script src="{{ asset('js/app.js') }}"></script>
{{-- <script src="{{ asset('js/jquery-validation.js') }}"></script>  --}}

<!-- SCRIPT VALIDATOR EMAIL -->
 {{-- <script>
const form= document.getElementById('regForm');
const button= document.getElementById('btnRegister');
const mailMsg = document.getElementById('mailError');
const nameMsg = document.getElementById('nameError');
const surnameMsg = document.getElementById('surnameError');
const passwordMsg = document.getElementById('passwordError');
const inputEmail= document.getElementById('email');
const inputName= document.getElementById('name');
const inputSurname= document.getElementById('surname');
const inputDate= document.getElementById('date_of_birth');
const inputPassword= document.getElementById('password');
const inputConfirm= document.getElementById('password_confirm');
const checkEmail = /^[A-z0-9\.\+_-]+@[A-z0-9\._-]+\.[A-z]{2,6}$/;
const checkName = /^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]\s?)+$/;
const checkPassword = /^[a-zA-Z0-9\_\*\-\+\!\?\,\:\;\.\xE0\xE8\xE9\xF9\xF2\xEC\x27]{6,15}/
// const checkDate = ;
form.addEventListener('submit',(e)=>{
    e.preventDefault();
     console.log('email:'+inputEmail.value);
     nameMsg.innerHTML = "";
     surnameMsg.innerHTML = "";
     mailMsg.innerHTML = "";
     // Validazione name 
      if(inputName.value.length<=0){
         nameMsg.innerHTML = 'Devi inserire il nome';
        }
        else if(inputName.value.length > 254){
            nameMsg.innerHTML = 'Il nome deve essere massimo di 254 caratteri';
    }
    else if(!checkName.test(inputName.value)){
        nameMsg.innerHTML = 'Il nome non è corretto';
    }

    // validazione surname 
    else if(inputSurname.value.length<=0){
        surnameMsg.innerHTML = 'Devi inserire il cognome';
    }
    else if(inputSurname.value.length > 254){
        surnameMsg.innerHTML = 'Il cognome deve essere massimo di 254 caratteri';
    }   
    else if(!checkName.test(inputSurname.value)){
        nameMsg.innerHTML = 'Il nome non è corretto';
    }
    
    //  validazione mail 
    else if(inputEmail.value.length<=0){
        mailMsg.innerHTML = 'Devi inserire la email';
    }
    else if(!checkEmail.test(inputEmail.value)){
        mailMsg.innerHTML = 'Non e una email';
    }

    // validazione password
    else if(inputPassword.value.length<=0){
        passwordMsg.innerHTML = 'Devi inserire la password';
    }
    else if(inputPassword.value.length<8){
        passwordMsg.innerHTML = 'La password deve essere almeno di 8 caratteri';
    }


    else{
        e.target.submit();
    }
});
</script>   --}}
 <script>
    // Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#regForm").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      name: {
        required: true,
        maxlength: 254
      },
      surname: {
        required: true,
        maxlength: 254
      },
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true,
        maxlength: 254
      },
      date_of_birth:{
          required:true,
          date:true
      },
      password: {
        required: true,
        minlength: 8
      },
      password_confirm: {
        required: true,
        minlength: 8
      }
    },
    // Specify validation error messages
    messages: {
      name:{
          required:"Il nome è obbligatorio",
          maxlength:"Il nome può essere al massimo di 254 caratteri"
      } ,
      surname:{
          required:"Il cognome è obbligatorio",
          maxlength:"Il cognome può essere al massimo di 254 caratteri"
      } ,
      password: {
        required: "La password è obbligatoria",
        minlength: "La password deve essere almeno di 8 caratteri"
      },
      date_of_birth:{
          required:"La data di nascita è obbligatoria"
      },
      email: {
        required: "La mail è obbligatoria",
        mail: "La mail deve essere di tipo mail",
        maxlength:"La mail può essere al massimo lunga 254 caratteri"
      }
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script> 


@endsection

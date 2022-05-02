{/* <script>
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
</script> */}

// Wait for the DOM to be ready
$(function () {
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
            date_of_birth: {
                required: true,
                date: true
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
            name: {
                required: "Il nome è obbligatorio",
                maxlength: "Il nome può essere al massimo di 254 caratteri"
            },
            surname: {
                required: "Il cognome è obbligatorio",
                maxlength: "Il cognome può essere al massimo di 254 caratteri"
            },
            password: {
                required: "La password è obbligatoria",
                minlength: "La password deve essere almeno di 8 caratteri"
            },
            date_of_birth: {
                required: "La data di nascita è obbligatoria"
            },
            email: {
                required: "La mail è obbligatoria",
                mail: "La mail deve essere di tipo mail",
                maxlength: "La mail può essere al massimo lunga 254 caratteri"
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });
});
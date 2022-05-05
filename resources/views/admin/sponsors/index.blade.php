@extends('layouts.app')

@section('content')
<div class="container">
     <section id="sponsor-section">
        <a href="{{route('admin.flats.index')}}" class="btn btn-success ml-3 my-5">TORNA INDIETRO</a>
        <div class="container-fluid">
            <div class="row">
                @forelse ($sponsors as $sponsor)  
                    <div class="col-12 col-md-4">
                        <div class="card text-dark mb-3">
                            <div class="card-header"><h3>{{ $sponsor->label }}</h3></div>
                            <div class="card-body">

                                <form action="{{ route('admin.sponsors.store')}}"  method="POST" class="confirmSponsor">
                                @csrf
                                    <h6 class="card-title"> Prezzo: {{ $sponsor->price }} &euro; </h6>
                                    <input class="d-none" type="text" name="sponsor_id" value="{{ $sponsor->id }}" readonly id="sponsor_id">
                                    <input class="d-none" type="text" name="flat_id" value="{{ $flat }}" readonly >
                                    <h6 class="card-title"> Durata: {{ $sponsor->length }} ore </h6>
                                    <button type="submit" class="btn btn-success">Compra</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3>Non ci sono sponsor al momento</h3>
                @endforelse
            </div>

            <div id="bg-braintree" class="d-none">
                <div id="container-braintree">
                    <div id="dropin-container" class="col-12 p-0"></div>
                    <button type="submit" class="btn btn-primary btn-compra d-none" id="purchase">Compra</button>
                    <button type="submit" class="btn btn-danger btn-compra d-none" id="cancel">Annulla</button>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('additional-scripts')
<script src="https://js.braintreegateway.com/web/dropin/1.32.1/js/dropin.min.js"></script>
<script type="text/javascript">
        const confirmSponsor = document.querySelectorAll('.confirmSponsor');
            confirmSponsor.forEach(element => {
            element.addEventListener("submit", function(event){
                //stoppa l'evento
                event.preventDefault();
                //apre il box di conferma
                let confirm = document.querySelector('#dropin-container');
                let bg_confirm = document.querySelector('#bg-braintree');
                confirm.classList.remove("d-none");
                bg_confirm.classList.remove('d-none');
                //prende il valore dei bottoni del box di conferma
                const buttonPurchase = document.querySelector('#purchase');
                buttonPurchase.classList.remove("d-none");
                const buttonCancel = document.querySelector('#cancel');
                buttonCancel.classList.remove("d-none");
                
                setTimeout(() => {
                    buttonPurchase.addEventListener("click", function(){
                        element.submit();
                        confirm.classList.add("d-none");
                        bg_confirm.classList.add('d-none');
                    })
                }, 2000);
                buttonCancel.addEventListener("click", function(){
                    confirm.classList.add("d-none");
                    bg_confirm.classList.add('d-none');
                })
            });
        });
        var button = document.getElementById('purchase');
            braintree.dropin.create({
            authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
            selector: '#dropin-container'
            }, function (err, instance) {
                button.addEventListener('click', function () {
                    instance.requestPaymentMethod(function (err, payload) {
                    // Submit payload.nonce to your server
                    });
                })
            });
    </script>
@endsection

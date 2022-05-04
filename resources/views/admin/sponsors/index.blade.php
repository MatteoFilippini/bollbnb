@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('admin.flats.index')}}" class="btn btn-success ml-3">TORNA INDIETRO</a>
    <div class="row">
        {{-- prendo tutte le sponsorizzazioni e le stampo come card singole --}}
        @foreach($sponsors as $sponsor)
        <div class="col-4">
            <div class="card my-5">
                <div class="card-header text-dark">
                    {{$sponsor->label}}
                 </div>
             <div class="card-body text-dark">
                <h5 class="card-title">{{$sponsor->price}}</h5>
                 <p class="card-text">{{$sponsor->length}}</p>
        <button type="button" data-toggle="collapse" data-target="#collapseExample{{$sponsor->id}}" aria-expanded="false" aria-controls="collapseExample" class="btn btn-warning">SPONSORIZZA</button>
            </div>
</div>
</div>
@endforeach

<div class="container">
    <div class="row">
        {{-- giriamo su sponsor e li stampiamo come card al dettaglio --}}
        @foreach($sponsors as $sponsor)
        <div class="col-12">
            <div class="collapse text-dark" id="collapseExample{{$sponsor->id}}">
                <div class="card card-body text-center">
                    <h2>{{$sponsor->label}}</h2>
                    <p>Sponsorizzazione per {{$sponsor->length}} ore. Dai valore al tuo appartamento con questa sponsorizzazione.</p>
                    <p>Facendolo, il tuo appartamento verrà messo in evidenza nella pagina principale del sito - così avrai più visibilità!</p>
                    <div class="d-flex justify-content-around">
                        <span>Procedi al pagamento:</span>
                        <button type="button" data-toggle="collapse" class="btn btn-danger" data-target="#collapse" aria-expanded="false" aria-controls="collapseExample">VAI</button>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        {{-- braintree che simula il pagamento della sponsorizzazione --}}
        <div class="container">
            <div class="row">
                <div class="col-12">
                     <form action="{{route('admin.sponsors.store', $sponsor->id)}}" method="POST">
                        @csrf
                        <div class="collapse" id="collapse">
                            <div class="dropin-container"></div>
                            <button type="submit" id="submit-button" class="btn btn-info">INVIA</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
<script>
    var button = document.querySelector('#submit-button');

    braintree.dropin.create({
      authorization: "<?php
      use Braintree\ClientToken;
        echo $clientToken = ClientToken::generate();?>",
        container: '.dropin-container'
    }, function (createErr, instance) {
      button.addEventListener('click', function () {
        instance.requestPaymentMethod(function (err, payload) {
          $.get('{{ route('payment.process') }}', {payload}, function (response) {
            if (response.success) {
                console.log('pagamento ok');
              alert('Payment successfull!');
            } else {
              alert('Payment failed');
            }
          }, 'json');
        });
      });
    });
</script>
@endsection

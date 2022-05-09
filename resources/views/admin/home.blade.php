@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {{-- home admin con un jumbotron | vedere se mettere un immagine, per adesso è molto minimal --}}
    <div id="stay" class="d-flex justify-content-center pt-5">
        <div class="text-center">
            <p>Condividi i tuoi spazi</p>
            <p>Unisciti agli altri Host</p>
            <div>
                <a href="{{ route('admin.flats.index') }}" class="btn btn-primary">JOIN</a>
            </div>
        </div>
    </div>

    {{-- spiegazione delle funzionalità del sito magari --}}
    <section id="about" class="my-3">
        <div class="text-center">
            <h2>SPONSORIZZAZIONI</h2>
            <p>Potrai avere la possibilità, come host, di sponsorizzare i tuoi appartamenti. <br /> 
            Così facendo avrai accesso a diverse tipologie di sponsorizzazioni, tra cui:</p> 

            <div class="row">
                <div class="col-4">
                    <div class="card-silver">
                <div class="circle">
                    <div class="sponsor text-center">
                        <h2>SILVER</h2>
                    </div>
                </div>
                <div class="content">
                      <div>
                        <h3>Sponsorizzazione di tipo Silver</h3>
                           <p>Con questa tipologia di sponsorizzazione potrai mettere in evidenza il tuo appartamento per 24 ore - risulterà essere in cima nelle ricerche.</p>
                    </div>
                    <div>
                        <a href="{{route('admin.flats.index')}}" class="btn btn-success">PROVA</a>
                    </div>

                </div>
            </div>
                </div>
                <div class="col-4">
                    <div class="card-gold">
                <div class="circle">
                    <div class="sponsor text-center">
                        <h2>GOLD</h2>
                    </div>
                </div>
                <div class="content">
                      <div>
                        <h3>Sponsorizzazione di tipo Gold</h3>
                           <p>Con questa tipologia di sponsorizzazione potrai mettere in evidenza il tuo appartamento per 72 ore - risulterà essere in cima nelle ricerche.</p>
                    </div>
                    <div>
                        <a href="{{route('admin.flats.index')}}" class="btn btn-success">PROVA</a>
                    </div>

                </div>
            </div>
                </div>
                <div class="col-4">
                    <div class="card-platinum">
                        <div class="circle">
                            <div class="sponsor text-center">
                                <h2>PLATINUM</h2>
                            </div>
                 </div>
                <div class="content">
                    <div>
                        <h3>Sponsorizzazione di tipo Platinum</h3>
                           <p>Con questa tipologia di sponsorizzazione potrai mettere in evidenza il tuo appartamento per 144 ore - risulterà essere in cima nelle ricerche.</p>
                    </div>
                    <div>
                        <a href="{{route('admin.flats.index')}}" class="btn btn-success">PROVA</a>
                    </div>
                </div>
            </div>
                </div>
            </div>
            
            
            
        </div>
    </section>
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header text-danger">{{ __('Dashboard') }}</div>

                <div class="card-body text-info">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in pippo!') }}
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection

<style scoped lang="scss">
@import 'variables';
@import 'home';
</style>

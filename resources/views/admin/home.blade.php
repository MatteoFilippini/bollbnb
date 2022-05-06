@extends('layouts.app')

@section('content')
<div class="container">
    {{-- home admin con un jumbotron | vedere se mettere un immagine, per adesso è molto minimal --}}
    <div class="jumbotron jumbotron-fluid bg-transparent">
        <div class="text-center">
            <h1>Benvenuto!</h1>
            <p>Di seguito potrai andare nella pagina dei tuoi appartamenti e, qualora non ne avessi, aggiungerne uno sul nostro database.</p>
        </div>
        <small>Clicca sulla casa</small>
        <div class="row">
            <div class="col-4">
                <a href="{{route('admin.flats.index')}}">
                <img src="https://us.123rf.com/450wm/jenemilia/jenemilia1303/jenemilia130300135/18640014-in-bianco-e-nero-casa-espressiva-schizzo.jpg?ver=6" alt="immagine casa" class="img-fluid h-50">
            </a>
            </div>
    </div>

    {{-- spiegazione delle funzionalità del sito magari --}}
    <section id="about" class="my-3">
        <div class="text-center">
            <h2>ABOUT</h2>
        </div>
    </section>

    {{-- sezione servizi | ipotizzare di parlare già qui della possibilità delle sponsorizzazioni --}}
    <section id="services" class="my-3">
        <div class="text-center">
            <h2>SPONSORIZZAZIONI</h2>
            <div class="row">
                <div class="col-4">
                    <div class="card bg-secondary mb-3 text-white" style="max-width: 18rem;">
                        <div class="card-header">SILVER</div>
                        <div class="card-body">
                            <h5 class="card-title">Sponsorizzazione di tipo Silver</h5>
                            <p class="card-text">Con questa tipologia di sponsorizzazione potrai mettere in evidenza il tuo appartamento.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card bg-warning mb-3 text-dark" style="max-width: 18rem;">
                        <div class="card-header">GOLD</div>
                        <div class="card-body">
                            <h5 class="card-title">Sponsorizzazione di tipo Gold</h5>
                            <p class="card-text">Con questa tipologia di sponsorizzazione potrai mettere in evidenza il tuo appartamento.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-4">
                    <div class="card bg-light mb-3 text-dark" style="max-width: 18rem;">
                        <div class="card-header">PLATINO</div>
                        <div class="card-body">
                            <h5 class="card-title">Sponsorizzazione di tipo Platino</h5>
                            <p class="card-text">Con questa tipologia di sponsorizzazione potrai mettere in evidenza il tuo appartamento.</p>
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
h1, h2 {
    color: #63F0C1;
}
</style>

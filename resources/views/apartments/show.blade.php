@extends('layouts.app')

@section('content')
    <div class="container py-5 d-flex justify-content-end gap-2">
        <a href="{{ route('apartments.edit', $apartment) }}" class="btn btn-bool me-2">Modifica</a>

        <form action="{{ route('apartments.destroy', $apartment) }}" method="post" class="delete">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-delete" title="delete">Elimina</button>
        </form>

    </div>

    <div class="container text-center py-3">
        <h1 class="mb-4 card-title">{{ $apartment->title }}</h1>
    </div>

    <div class="container px-5 mb-3">
        <div class="row g-3">
            <div class="col-lg-8 col-md-6 col-sm-12">
                <img src="{{ asset('storage/' . $apartment->cover_image) }}" alt="immagine di copertina dell'appartamento">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-direction-column bool-card border p-3">
                <span >&quot;{{ $apartment->description }}&quot;</span>
               
            </div>
        </div>
    </div>

    <div class="container px-5 py-4">
        <div class="row">
            @forelse ($images as $image)
                <div class="col-lg-2 col-md-3 mb-3">
                    <img class="extra-img" src="{{ asset('storage/' . $image->url) }}" alt="">
                </div>
            @empty
                <div class="col-lg-2 mb-3">
                    <a href="{{ route('apartments.edit', $apartment) }}" class="border bool-card fs-1 py-4 px-5">&plus;</a>
                </div>
            @endforelse
        </div>
    </div>

    <div class="container py-4 px-5">
        <div class="row align-items-center">
            <h5 class="mb-4">Dettagli Appartamento</h5>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <ul class="list-unstyled">
                    <li> <strong>Visibilità: </strong>
                        <span class="badge rounded-pill {{ $apartment->visibility === 1 ? 'bg-success' : 'bg-danger' }}">{{ $apartment->visibility === 1 ? 'Pubblico' : 'Privato' }}</span>
                    </li>
                    <li> <strong>Indirizzo:</strong> {{ $apartment->address }} - {{ $apartment->city }} </li>
                    <li> <strong>Numero Stanze:</strong> {{ $apartment->rooms }}</li>
                    <li> <strong>Posti Letto:</strong> {{ $apartment->beds }}</li>
                    <li> <strong>Bagni:</strong> {{ $apartment->bathrooms }}</li>
                    <li> <strong>Metri quadri:</strong> {{ $apartment->sqm }} &#13217;</li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <ul class="list-unstyled">
                    
                    <li> <strong>Servizi:</strong>
                        <ul class="d-flex flex-wrap gap-2 list-unstyled">
                            @forelse($apartment->services()->orderBy('name')->get() as $service)
                                <li class="badge bg-bool rounded-pill"> {{ $service->name }} </li>
                            @empty
                                <span>Nessun Servizio</span>
                                <a href="{{ route('apartments.edit', $apartment) }}">
                                    <li class="badge bg-bool rounded-pill"> &plus; </li>
                                </a>
                            @endforelse
                        </ul>
                    </li>
                    <li> <strong>Prezzo a notte:</strong> {{ $apartment->price }}&euro;</li>
                    
                </ul>
            </div>
            <div class="col-lg-5 col-md-12 text-center border bool-card p-5">
                @if ($apartment->sponsorships->count() > 0)
                <div id="sponsor">
                    <h4>Sponsorizzazione collegata:</h4>
                    <p>{{ $apartment->sponsorships->last()->name }}</p>
                    <p>La tua sponsorizzazione termina tra:</p>
                    <p id='demo' class="fs-4"></p>
                </div>
                <script>
                    var countDownDate = new Date("{{ $apartment->sponsorships->last()->pivot->end_date }}").getTime();
                    console.log(countDownDate)

                    // Update the count down every 1 second
                    var x = setInterval(function() {

                        // Get today's date and time
                        var now = new Date().getTime();

                        // Find the distance between now and the count down date
                        var distance = countDownDate - now;

                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        // Output the result in an element with id="demo"
                        if (distance > 0) {
                            $("#demo").text(days + "d " + hours + "h " +
                                minutes + "m " + seconds + "s ");

                        } else {
                            $('#sponsor').html(`<div id="add-sponsor">
                            <h4 class="mb-5">Metti in evidenza il tuo apartamento!! </h4>
                            <a href="{{ route('sponsorship.index', $apartment) }}" class="btn-bool">Acquista sponsor</a>
                            </div>`)
                        }

                    }, 1000);
                </script>
            @else
                <div id="add-sponsor">
                    <h4 class="mb-5">Metti in evidenza il tuo apartamento!! </h4>
                    <a href="{{ route('sponsorship.index', $apartment) }}" class="btn-bool">Acquista sponsor</a>
                </div>
            @endif
    </div>
       
    <div class="container py-5">
        <a href="{{route('apartments.index')}}" class="btn-bool p-2">Indietro</a>
    </div>
   
@endsection

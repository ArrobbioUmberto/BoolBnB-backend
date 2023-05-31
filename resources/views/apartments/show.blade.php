@extends('layouts.app')

@section('content')
    <div class="container py-2 d-flex justify-content-end gap-2">
        <a href="{{ route('apartments.edit', $apartment) }}" class="btn btn-warning">Modifica</a>

        <form action="{{ route('apartments.destroy', $apartment) }}" method="post">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>

    </div>

    <div class="container text-center py-4">
        <h1 class="mb-4">{{ $apartment->title }}</h1>

        <img src="{{ asset('storage/' . $apartment->cover_image) }}" alt="immagine di copertina dell'appartamento">

        <p class="mt-4">{{ $apartment->description }}</p>
    </div>

    <div class="container text-center py-4">
        @forelse ($images as $image)
            <img src="{{ asset('storage/' . $image->url) }}" alt="">
        @empty
            Non hai caricato altre immagini
        @endforelse

    </div>

    <div class="container">

        <ul>
            <li> Visibilità: <span
                    class="badge rounded-pill {{ $apartment->visibility === 1 ? 'bg-success' : 'bg-danger' }}">{{ $apartment->visibility === 1 ? 'Pubblico' : 'Privato' }}</span>
            </li>
            <li> Indirizzo: {{ $apartment->address }} - {{ $apartment->city }} </li>
            <li> Numero Stanze: {{ $apartment->rooms }}</li>
            <li> Posti Letto: {{ $apartment->beds }}</li>
            <li> Bagni: {{ $apartment->bathrooms }}</li>
            <li> Metri quadri: {{ $apartment->sqm }} &#13217;</li>
            <li> Servizi:
                <ul class="d-flex flex-wrap gap-2">
                    @forelse($apartment->services()->orderBy('name')->get() as $service)
                        <li class="badge bg-info rounded-pill"> {{ $service->name }} </li>
                    @empty
                        Nessun Servizio
                    @endforelse
                </ul>
            </li>
            <li> Prezzo a notte: {{ $apartment->price }}&euro;</li>
            <li> Proprietario: {{ $apartment->user->first_name }} {{ $apartment->user->last_name }}</li>
            <li>
                @if ($apartment->sponsorships->count() > 0)
                    <h2>Sponsorizzazione collegata:</h2>
                    <p>{{ $apartment->sponsorships->last()->name }}</p>
                    <p>Data di inizio: {{ $apartment->sponsorships->last()->pivot->start_date }}</p>
                    <p>Data di fine: {{ $apartment->sponsorships->last()->pivot->end_date }}</p>
                    <p id='demo'></p>
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
                                $('#demo').html("<h1>La tua sponsorizzazione è terminata</h1>")
                            }




                        }, 1000);
                    </script>
                @else
                    <h2>Sponsorizzazione collegata:</h2>
                    <p>Nessuna </p>
                    <a href="{{ route('sponsorship.index', $apartment) }}">Acquista sponsor</a>
                @endif
            </li>
        </ul>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container p-5">
      <div class="row gap-4 justify-content-center">
        @foreach ($sponsorships as $sponsorship)
        <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 18rem;">

            <div class="card-body bool-card">
                <h5 class="card-title">{{ $sponsorship->name }}</h5>
                <p><strong>Prezzo: </strong>{{ $sponsorship->price}}&euro;</p>
                <p class="mb-5">Metti in evidenza il tuo appartamento per <strong>{{ $sponsorship->duration}}</strong> ore</p>
                <a href="{{ route('check', ['apartment' => $apartment->id, 'sponsorship' => $sponsorship->id]) }}"
                    class="btn btn-bool">Acquista</a>
            </div>
        </div>
    @endforeach
      </div>
        {{-- <div class="card" style="width: 18rem;">

            <div class="card-body">
                <h5 class="card-title">{{ $apartment->id }}</h5>
                <h5 class="card-title">{{ $sponsorships[1]->id }}</h5>

                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="{{ route('check', $apartment, $sponsorship) }}" class="btn btn-primary">Acquista</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">

            <div class="card-body">
                <h5 class="card-title">{{ $apartment->id }}</h5>
                <h5 class="card-title">{{ $sponsorships[2]->id }}</h5>

                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="{{ route('check', $apartment, $sponsorship) }}" class="btn btn-primary">Acquista</a>
            </div>
        </div> --}}
    </div>
@endsection

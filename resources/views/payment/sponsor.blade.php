@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach ($sponsorships as $sponsorship)
            <div class="card" style="width: 18rem;">

                <div class="card-body">
                    <h5 class="card-title">{{ $apartment->id }}</h5>
                    <h5 class="card-title">{{ $sponsorship->id }}</h5>

                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's
                        content.</p>
                    <a href="{{ route('check', ['apartment' => $apartment, 'sponsorship' => $sponsorship]) }}"
                        class="btn btn-primary">Acquista</a>
                </div>
            </div>
        @endforeach
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

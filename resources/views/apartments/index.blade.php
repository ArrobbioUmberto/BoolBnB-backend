@extends('layouts.app')

@section('content')

    <div class="container pt-3">
        <h1>ELenco degli appartamenti</h1>
    </div>

    <div class="container py-5">
        <table class="table table-striped table-inverse table-responsive">
            <thead>
                <tr>
                    <th>Titolo</th>
                    <th>Città</th>
                    <th>Indirizzo</th>
                    <th>Prezzo</th>
                    <th>Metri quadrati</th>
                    <th>N. stanze</th>
                    <th>N. letti</th>
                    <th>N. bagni</th>
                    <th>Visibilità</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($apartments as $apartment)

                    <tr>
                        <td>{{ $apartment->title }}</td>
                        <td>{{ $apartment->city }}</td>
                        <td>{{ $apartment->address }}</td>
                        <td>{{ $apartment->price }}&euro;</td>
                        <td>{{ $apartment->sqm }} &#13217;</td>
                        <td>{{ $apartment->rooms }}</td>
                        <td>{{ $apartment->beds }}</td>
                        <td>{{ $apartment->bathrooms }}</td>
                        <td>{{ $apartment->visibility == 1 ? "pubblico" : "privato" }}</td>
                    </tr>

                @endforeach

            </tbody>
        </table>
    </div>
    
@endsection
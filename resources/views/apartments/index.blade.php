@extends('layouts.app')

@section('content')

    <div class="container pt-3">
        <h1>ELenco degli appartamenti</h1>
    </div>

    <div class="container py-5">

        <a class="btn btn-sm btn-primary ms-auto" href="{{ route('apartments.create') }}">Aggiungi appartamento</a>

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
                    <th>funzionalità</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($apartments as $apartment)

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
                        <td class="d-flex gap-2">
                            <a class="btn btn-primary btn-sm" href="{{ route('apartments.edit', $apartment) }}">
                              Modifica
                            </a>

                            <form method="POST" action="{{ route('apartments.destroy', $apartment->id) }}">
                                @csrf
    
                                @method('DELETE')
    
                                <input class="btn btn-danger btn-sm" type="submit" value="elimina">
                            </form>
                        </td>
                    </tr>
                @empty
                    <h2>
                        Nessun appartamento
                    </h2>
                @endforelse

            </tbody>
        </table>
    </div>
    
@endsection
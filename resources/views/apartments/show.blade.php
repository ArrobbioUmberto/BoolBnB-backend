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

        <img src="{{ $apartment->cover_image }}" alt="immagine di copertina dell'appartamento">

        <p class="mt-4">{{ $apartment->description }}</p>
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
        </ul>

    </div>
@endsection

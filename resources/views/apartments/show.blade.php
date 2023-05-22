@extends('layouts.app')

@section('content')
<!-- Controllo per la Visibilita' dell'Appartamento -->
@if($apartment->visibility === 1)

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

  <span> {{ $apartment->cover_image }} </span>

  <p class="mt-4">{{ $apartment->description }}</p>
</div>

<div class="container">

  <ul>
    <li> Indirizzo: {{ $apartment->address}} - {{ $apartment->city}} </li>
    <li> Numero Stanze: {{ $apartment->rooms}}</li>
    <li> Posti Letto: {{ $apartment->beds}}</li>
    <li> Bagni: {{ $apartment->bathrooms}}</li>
    <li> Servizi:
      <ul class="d-flex flex-wrap gap-2">
        @forelse($apartment->services()->orderBy('name')->get() as $service)
        <li class="badge bg-info rounded-pill"> {{$service->name}} </li>
        @empty
        Nessun Servizio
        @endforelse
      </ul>
    </li>
    <li> Prezzo a notte: {{$apartment->price}} </li>
    <li> Proprietario: {{$apartment->user->first_name}} {{$apartment->user->last_name}}</li>
  </ul>

</div>


@else
Appartamento Non Visibile
@endif

@endsection
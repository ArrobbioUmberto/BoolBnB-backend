@extends('layouts.app')

@section('content')
<!-- Controllo per la Visibilita' dell'Appartamento -->
@if($apartment->visibility === 1)

<div class="container text-center py-5">
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
      <ul>
        @forelse($apartment->services()->orderBy('name')->get() as $service)
        <li> {{$service->name}} </li>
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
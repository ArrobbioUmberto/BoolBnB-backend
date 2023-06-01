@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <div class="d-flex align-items-center">
            <h1>I tuoi appartamenti</h1>
            <a class="btn btn-bool ms-auto p-2" href="{{ route('apartments.create') }}">Aggiungi appartamento</a>
        </div>
    </div>

    <div class="container py-3">
        <div class="row justify-content-center gap-3">
            @forelse ($apartments as $apartment)
            <div class="col-sm-6 col-md-4 col-lg-3 ms-col d-flex align-items-stretch">
                <a class="text-decoration-none" href="{{ route('apartments.show', $apartment) }}">  
                    <div class="card ap-card shadow p-3 mb-5 bg-body rounded">
                        <img class="card-img" src="{{ asset('storage/' . $apartment->cover_image) }}" alt="immagine">
                        <div class="card-description p-3">
                            <h4 class="card-title">{{ $apartment->title }}</h4>
                            <p class="card-location">{{$apartment->address . ', ' . $apartment->city}}</p>
                       
                            <div class="d-flex gap-4 ">
                                <div>
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </div>
                                    
                                    <div>
                                    <a href="{{ route('apartments.edit', $apartment) }}">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                </div>
                                
                                <div>
                                    <form method="POST" action="{{ route('apartments.destroy', $apartment) }}">
                                        @csrf
                                        
                                        @method('DELETE')
                                        
                                        <button type="submit" class="border-0 bg-transparent">
                                            <i class="text-danger fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </a>
                </div>
                @empty
                <h2 class="p-5">
                    Nessun appartamento
                    </h2>
                @endforelse
            </div>

    </div>


    {{-- <div class="container py-5">

        <a class="btn btn-sm btn-primary ms-auto" href="{{ route('apartments.create') }}">Aggiungi appartamento</a> --}}

        {{-- <table class="table table-striped table-inverse table-responsive">
            <thead>
                <tr>
                    <th>Titolo</th>
                    <th>Città</th>
                    <th>Indirizzo</th>
                    <th>Prezzo a notte</th>
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
                        <td>{{ $apartment->visibility == 1 ? 'pubblico' : 'privato' }}</td>
                        <td class="text-end">
                            <div class="d-flex gap-2">
                                <a class="btn btn-primary btn-sm" href="{{ route('apartments.show', $apartment) }}">
                                    Dettagli
                                </a>
                                <a class="btn btn-warning btn-sm" href="{{ route('apartments.edit', $apartment) }}">
                                    Modifica
                                </a>

                                <form method="POST" action="{{ route('apartments.destroy', $apartment) }}"
                                    class="d-inline">
                                    @csrf

                                    @method('DELETE')

                                    <input class="btn btn-danger btn-sm" type="submit" value="Elimina">
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <h2>
                        Nessun appartamento
                    </h2>
                @endforelse

            </tbody>
        </table>
    </div> --}}
@endsection

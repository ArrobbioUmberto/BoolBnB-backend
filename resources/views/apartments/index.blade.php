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
                
                <div class="card ap-card shadow p-3 mb-5 bg-body rounded">
                  
                    @if ($apartment->getEndDate())
                    <span class="badge bg-boo">Sponsorizzato</span>       
                    @endif
                    <a class="text-decoration-none" href="{{ route('apartments.show', $apartment) }}">  
                        <img class="card-img" src="{{ asset('storage/' . $apartment->cover_image) }}" alt="immagine">
                        <div class="card-description p-3">
                            <h4 class="card-title">{{ $apartment->title }}</h4>
                            <p class="card-location">{{$apartment->address . ', ' . $apartment->city}}</p>
                       
                            <div class="d-flex align-items-center icon">
                                <div class="d-flex gap-3">
                                    <div>
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </div>
                                    
                                    <div>
                                        <a href="{{ route('apartments.edit', $apartment) }}">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                    </div>
                                

                                    <div>
                                        <form method="POST" action="{{ route('apartments.destroy', $apartment) }}" class="delete">
                                            @csrf
                                            
                                            @method('DELETE')
                                            
                                            <button type="submit" class="border-0 bg-transparent"  title="delete">
                                                <i class="text-danger fa-regular fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <div class="ms-auto d-flex gap-2">
                                    <span>Visibilit&agrave;</span>
                                    <form class="align-self-center" action="{{ route('apartment.toggle', $apartment->id)}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="border-0 bg-transparent p-0 ">
                                            <i class="fa-solid {{$apartment->visibility ? 'fa-toggle-on toggle' : 'fa-toggle-off toggle' }}"></i>
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

            <div class="container py-5">
                <a href="{{route('dashboard')}}" class="btn-bool p-2">Indietro</a>
            </div>

        </div>

@endsection


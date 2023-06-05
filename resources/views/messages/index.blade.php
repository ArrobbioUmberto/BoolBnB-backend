@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <h1>Messaggi Ricevuti</h1>
    </div>
    <div class="container py-5">
        @forelse($messages as $message)
            <a href="{{ route('message.show', $message) }}" class="text-decoration-none text-dark">
                <div class="card bool-card mb-2">
                    <div class="card-body">
                        <ul class="mb-2 list-unstyled">
                            <li><strong>Da: </strong>{{ $message->name }}</li>
                            <li><strong>Ricevuto il:</strong> {{ $message->created_at->format('d/m/Y') }} </li>
                            <li><strong>Alle: </strong>{{ $message->created_at->format('H:i') }}</li>
                            <li><strong>Appartamento:</strong> {{ ucfirst($message->apartment->title) }}</li>
                            {{-- <li> {{ $message->text }}</li> --}}
                        </ul>
                    </div>
                </div>
            </a>
        @empty
            'Non hai ricevuto nessun messaggio'
        @endforelse

    </div>
    <div class="container">
        <a href="{{route('dashboard')}}" class="btn-bool">Indietro</a>
    </div>
@endsection

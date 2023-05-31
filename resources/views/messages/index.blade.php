@extends('layouts.app')

@section('content')
    <div class="container p-5">
        @forelse($messages as $message)
            <a href="{{ route('message.show', $message) }}" class="text-decoration-none text-dark">
                <div class="card">
                    <div class="card-body">
                        <ul class="mb-2 list-unstyled">
                            <li>Da chi: {{ $message->name }}</li>
                            <li>Ricevuto il: {{ $message->created_at->format('d/m/Y') }} </li>
                            <li>Alle: {{ $message->created_at->format('H:m') }}</li>
                            <li>Appartamento: {{ ucfirst($message->apartment->title) }}</li>
                            {{-- <li> {{ $message->text }}</li> --}}
                        </ul>
                    </div>
                </div>
            </a>
        @empty
            'non ti caga nessuno e i tuoi appartamenti fanno schifo'
        @endforelse

    </div>
@endsection

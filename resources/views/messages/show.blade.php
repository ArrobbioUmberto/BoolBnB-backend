@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="mb-2 list-unstyled">
                <li>Da chi: {{ $message->name }}</li>
                <li>Ricevuto il: {{ $message->created_at->format('d/m/Y') }} </li>
                <li>Alle: {{ $message->created_at->format('H:m') }}</li>
                <li>Appartamento: {{ ucfirst($message->apartment->title) }}</li>
                <li>Testo: {{ $message->text }}</li>
            </ul>
        </div>
    </div>
@endsection

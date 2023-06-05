@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <div class="card bool-card">
            <div class="card-body">
                <ul class="mb-2 list-unstyled">
                    <li><strong>Da: </strong>{{ $message->name }}</li>
                    <li><strong>E-mail: </strong>{{$message->email}}</li>
                    <li><strong>Ricevuto il:</strong> {{ $message->created_at->format('d/m/Y') }} </li>
                    <li><strong>Alle: </strong>{{ $message->created_at->format('H:i') }}</li>
                    <li><strong>Appartamento:</strong> {{ ucfirst($message->apartment->title) }}</li>
                    <li><strong>Messaggio:</strong> <p>{{ $message->text }}</p></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <a href="{{route('message.index')}}" class="btn-bool">Indietro</a>
    </div>
@endsection

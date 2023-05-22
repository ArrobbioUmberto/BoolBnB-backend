@extends('layouts.app')

@section('content')
    

    <div class="container">
        <form action="{{ route('apartments.store') }}" method="post">
            @csrf
            
            <div class="mb-3">
                <label class="form-label" for="title">Titolo annuncio</label>
                <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="description">Descrizione</label>
                <input class="form-control" type="text" id="description" name="description" value="{{ old('description') }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="rooms">Numero di stanze</label>
                <input class="form-control" type="number" id="rooms" name="rooms" value="{{ old('rooms') }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="beds">Numero di posti letto</label>
                <input class="form-control" type="number" id="beds" name="beds" value="{{ old('beds') }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="bathrooms">Numero di bagni</label>
                <input class="form-control" type="number" id="bathrooms" name="bathrooms" value="{{ old('bathrooms') }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="sqm">Metri quadri</label>
                <input class="form-control" type="text" id="sqm" name="sqm" value="{{ old('sqm') }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="address">Indirizzo</label>
                <input class="form-control" type="text" id="address" name="address" value="{{ old('address') }}">
            </div>

            <div class="mb-3">
                <label class="form-label" for="city">Città</label>
                <input class="form-control" type="text" id="city" name="city" value="{{ old('city') }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="visibility">Visibile</label>
                <input class="form-check-input" type="checkbox" id="visibility" name="visibility" value="{{ old('visibility') }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="price">Prezzo</label>
                <input class="form-control" type="text" id="price" name="price" value="{{ old('price') }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="cover-image">Immagine di copertina</label>
                <input class="form-control" type="file" id="cover-image" name="cover-image" value="{{ old('cover-image') }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="services">Servizi</label>
                
                @foreach ($services as $service)
                <div class="form-check">
                    <input type="checkbox" name="services[]" class="form-check-input " value="{{ $service->id }}"
                    id="service">
                    <label for="service" class="form-check-label">{{ $service->name }}</label>
                </div>
                @endforeach
            </div>
            
            <button type="submit" class="btn btn-success">
                Invia
            </button>
        </form>
    </div>

@endsection
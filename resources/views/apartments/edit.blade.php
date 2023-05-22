@extends('layouts.app')

<div class="container">
    <h1>Modifica: {{ $apartment->title }}</h1>
</div>
<div class="container">
    <form action="{{ route('apartments.update', $apartment) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="cover_image" class="form-label">Immagine di copertina</label>
            <input type="file" name="cover_image" class="form-control @error('cover_image') is-invalid @enderror"
                value="{{ old('cover_image') }}" id="cover_image" aria-describedby="cover_image">
            @error('cover_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title') }}" id="title" aria-describedby="title">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="rooms" class="form-label">Stanze</label>
            <input type="number" name="rooms" class="form-control @error('rooms') is-invalid @enderror"
                value="{{ old('rooms') }}" id="rooms" aria-describedby="rooms">
            @error('rooms')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="beds" class="form-label">Posti letto</label>
            <input type="number" name="beds" class="form-control @error('beds') is-invalid @enderror"
                value="{{ old('beds') }}" id="beds" aria-describedby="beds">
            @error('beds')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="bathrooms" class="form-label">Bagni</label>
            <input type="number" name="bathrooms" class="form-control @error('bathrooms') is-invalid @enderror"
                value="{{ old('bathrooms') }}" id="bathrooms" aria-describedby="bathrooms">
            @error('bathrooms')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sqm" class="form-label">Mq</label>
            <input type="number" name="sqm" class="form-control @error('sqm') is-invalid @enderror"
                value="{{ old('sqm') }}" id="sqm" aria-describedby="sqm">
            @error('sqm')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                value="{{ old('address') }}" id="address" aria-describedby="address">
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="city" class="form-label">Città</label>
            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                value="{{ old('city') }}" id="city" aria-describedby="city">
            @error('city')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <div class="input-group ">
                <span class="input-group-text">€</span>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                    value="{{ old('price') }}" id="price" aria-label="Amount (to the nearest dollar)">
            </div>
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                value="{{ old('description') }}" id="description" aria-label="With textarea" cols="30" rows="10"></textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="services"> Servizi</label>
            @foreach ($services as $key => $service)
                <div class="form-check">
                    <input type="checkbox" name="services[]" @checked(in_array($service->ids, old('services', $apartment->getServiceIds()))) class="form-check-input "
                        value="{{ $service->ids }}" id="flexCheckDefault">
                    <label for="flexCheckDefault" class="form-check-label">{{ $service->name }}</label>
                </div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="visibility" class="form-label">Visibilità</label>
            <select class="form-select @error('visibility') is-invalid @enderror" aria-label="Default select example"
                id="visibility" name="visibility">
                <option value="" selected>Vuoi rendere visibile il tuo appartamento ?</option>
                <option value="1">SI</option>
                <option value="0">NO</option>

            </select>
            @error('visibility')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-auto mt-3">
            <button type="submit" class="btn btn-primary">Modifica</button>
            <a href="{{ route('apartments.index') }}" class="btn btn-secondary"> Torna alla Homepage</a>
        </div>
    </form>
</div>

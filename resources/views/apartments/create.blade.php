@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('apartments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label" for="title">Titolo annuncio <span class="text-danger">*</span></label>
                <input class="form-control  @error('title') is-invalid @enderror" type="text" id="title" name="title"
                    value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="description">Descrizione <span class="text-danger">*</span></label>
                <input class="form-control  @error('description') is-invalid @enderror" type="text" id="description"
                    name="description" value="{{ old('description') }}">
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="rooms">Numero di stanze <span class="text-danger">*</span></label>
                <input class="form-control  @error('rooms') is-invalid @enderror" type="number" id="rooms"
                    name="rooms" value="{{ old('rooms') }}">
                @error('rooms')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="beds">Numero di posti letto <span class="text-danger">*</span></label>
                <input class="form-control  @error('beds') is-invalid @enderror" type="number" id="beds"
                    name="beds" value="{{ old('beds') }}">
                @error('beds')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="bathrooms">Numero di bagni <span class="text-danger">*</span></label>
                <input class="form-control  @error('bathrooms') is-invalid @enderror" type="number" id="bathrooms"
                    name="bathrooms" value="{{ old('bathrooms') }}">
                @error('bathrooms')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="sqm">Metri quadri <span class="text-danger">*</span></label>
                <input class="form-control  @error('sqm') is-invalid @enderror" type="text" id="sqm" name="sqm"
                    value="{{ old('sqm') }}">
                @error('sqm')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="address">Indirizzo <span class="text-danger">*</span></label>
                <div id="searchbar">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="visibility">Visibilità <span class="text-danger">*</span></label>
                <select class="form-select  @error('visibility') is-invalid @enderror" id="visibility" name="visibility"
                    value="{{ old('visibility') }}">
                    <option value="" selected>Scegli la visibilità del tuo appartamento?</option>
                    <option value="1">Pubblico</option>
                    <option value="0">Privato</option>
                </select>
                @error('visibility')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="price">Prezzo <span class="text-danger">*</span></label>
                <input class="form-control  @error('price') is-invalid @enderror" type="text" id="price"
                    name="price" value="{{ old('price') }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="cover-image">Immagine di copertina <span class="text-danger">*</span></label>
                <input class="form-control  @error('cover_image') is-invalid @enderror" type="file" id="cover-image"
                    name="cover_image" value="{{ old('cover-image') }}">
                @error('cover_image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="services">Servizi <span class="text-danger">*</span></label>

                @foreach ($services as $service)
                    <div class="form-check">
                        <input type="checkbox" name="services[]" @checked(in_array($service->id, old('services', [])))
                            class="form-check-input  @error('services')
is-invalid
@enderror" value="{{ $service->id }}"
                            id="service">
                        <label for="service" class="form-check-label">{{ $service->name }}</label>
                    </div>
                @endforeach
                @error('services')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <input type="hidden" id="address" value="" name="address">
                <input type="hidden" id="city" value="" name="city">
                <input type="hidden" id="lat" value="" name="lat">
                <input type="hidden" id="lng" value="" name="lng">
            </div>

            <button type="submit" class="btn btn-success">
                Invia
            </button>
        </form>
    </div>
    <script>
        var options = {
            searchOptions: {
                key: "5yE1GYuQA7WyAdPZ1zAeJtBq8cKtoae3",
                language: "it-IT",
                limit: 5,
            },
            autocompleteOptions: {
                key: "5yE1GYuQA7WyAdPZ1zAeJtBq8cKtoae3",
                language: "it-IT",
            },
        }
        var ttSearchBox = new tt.plugins.SearchBox(tt.services, options, {
            key: "5yE1GYuQA7WyAdPZ1zAeJtBq8cKtoae3",
            container: 'searchbar',
            value: "ciaone"
        })
        var searchBoxHTML = ttSearchBox.getSearchBoxHTML()
        ttSearchBox.on("tomtom.searchbox.resultselected", function(data) {
            // console.log(data)

            let address = data.data.result.address.streetName + ' ' + data.data.result.address.streetNumber
            let city = data.data.result.address.localName
            let lat = data.data.result.position.lat
            let lng = data.data.result.position.lng
            document.getElementById('address').value = address
            document.getElementById('city').value = city
            document.getElementById('lat').value = lat
            document.getElementById('lng').value = lng

        })


        document.getElementById('searchbar').append(searchBoxHTML)
    </script>
@endsection

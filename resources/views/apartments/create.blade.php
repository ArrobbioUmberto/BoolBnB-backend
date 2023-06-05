@extends('layouts.app')

@section('content')
    <div class="container p-4">
        <form action="{{ route('apartments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold" for="title">Titolo<span class="text-danger">*</span></label>
                <input class="form-control  @error('title') is-invalid @enderror" type="text" id="title" name="title"
                    value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" for="description">Descrizione <span class="text-danger">*</span></label>
                <textarea class="form-control  @error('description') is-invalid @enderror" type="text" id="description"
                name="description" value="{{ old('description') }}" rows="5"></textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" for="address">Indirizzo <span class="text-danger">*</span></label>
                <div id="searchbar">
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 mb-3">
                        <label class="form-label fw-bold" for="rooms">Numero di stanze <span class="text-danger">*</span></label>
                        <input class="form-control  @error('rooms') is-invalid @enderror" type="number" id="rooms"
                        name="rooms" value="{{ old('rooms') }}">
                        @error('rooms')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-13 mb-3">
                        <label class="form-label fw-bold" for="beds">Numero di posti letto <span class="text-danger">*</span></label>
                        <input class="form-control  @error('beds') is-invalid @enderror" type="number" id="beds"
                        name="beds" value="{{ old('beds') }}">
                        @error('beds')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-12 mb-3">
                        <label class="form-label fw-bold" for="bathrooms">Numero di bagni <span class="text-danger">*</span></label>
                        <input class="form-control  @error('bathrooms') is-invalid @enderror" type="number" id="bathrooms"
                            name="bathrooms" value="{{ old('bathrooms') }}">
                        @error('bathrooms')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                        <label class="form-label fw-bold" for="sqm">Metri quadri <span class="text-danger">*</span></label>
                        <input class="form-control  @error('sqm') is-invalid @enderror" type="text" id="sqm" name="sqm"
                        value="{{ old('sqm') }}">
                        @error('sqm')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                        <label class="form-label fw-bold" for="price">Prezzo <span class="text-danger">*</span></label>
                        <div class="input-group ">
                            <span class="input-group-text">€</span>
                            <input class="form-control  @error('price') is-invalid @enderror" type="text" id="price"
                            name="price" value="{{ old('price') }}">
                        </div>
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>

                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" for="cover-image">Immagine di copertina <span class="text-danger">*</span></label>
                <input class="form-control  @error('cover_image') is-invalid @enderror" type="file" id="cover-image"
                    name="cover_image" value="{{ old('cover-image') }}">
                @error('cover_image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div id="add-field">
                <div class="mb-3" >
                    <div class="row align-items-end gap-3">
                        <div class="col-lg-4 col-sm-12">
                            <label class="form-label fw-bold" for="images">Altre immagini</label>
                            <input class="form-control  @error('images') is-invalid @enderror" type="file" id="images"
                                name="images[0]" >
                            @error('images')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="col">
                            <button type="button" class="add-btn" id="add">+</button>
                        </div>
                    </div>
                   
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold" for="services">Servizi </label>
                @foreach($services->chunk(3) as $row)
                <div class="row m-0">
                    @foreach ($row as $service)
                        <div class="col-4 form-check">
                                
                            <input type="checkbox" name="services[]" @checked(in_array($service->id, old('services', [])))
                                class="form-check-input  @error('services') is-invalid @enderror" value="{{ $service->id }}"
                                id="service">
                            <label for="service" class="form-check-label">{{ $service->name }}</label>
                                
                        </div>
                        @error('services')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    @endforeach
                </div>
                @endforeach
                
            </div>

            <div>
                <input type="hidden" id="address" value="" name="address">
                <input type="hidden" id="city" value="" name="city">
                <input type="hidden" id="lat" value="" name="lat">
                <input type="hidden" id="lng" value="" name="lng">
            </div>

          <div class="col-auto">
            
                <button type="submit" class="btn btn-bool me-2">Invia</button>
                
                <a href="{{route('apartments.index')}}" class="btn btn-bool-out">Indietro</a>
       
          </div>
        </form>
    </div>
    <script>
        $("#add").click(function () {
            $("#add-field").append(
                `<div class="mb-3">
                    <div class="row align-items-end gap-3" id="add-field">
                    <div class="col-lg-4 col-sm-12">
                        <input class="form-control  @error('images') is-invalid @enderror" type="file" id="images"
                            name="images[]"">
                        @error('images')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="col">
                        <button type="button" class="del-btn remove-input-field">-</button>
                    </div>
                    
                </div>
                </div>`
                );
        });
        $('body').on('click', '.remove-input-field', function () {
            $(this).closest('.mb-3').remove();
        });

        var options = {
            searchOptions: {
                key: "5yE1GYuQA7WyAdPZ1zAeJtBq8cKtoae3",
                language: "it-IT",
                limit: 5,
                countrySet: "IT"
            },
            autocompleteOptions: {
                key: "5yE1GYuQA7WyAdPZ1zAeJtBq8cKtoae3",
                language: "it-IT",
                countrySet: "IT"
            },
        }
        var ttSearchBox = new tt.plugins.SearchBox(tt.services, options, {
            key: "5yE1GYuQA7WyAdPZ1zAeJtBq8cKtoae3",
            container: 'searchbar',
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

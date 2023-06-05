@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <h1>Modifica: {{ $apartment->title }}</h1>
    </div>
    <div class="container pb-4">
        <form action="{{ route('apartments.update', $apartment) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Titolo</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $apartment->title) }}" id="title" aria-describedby="title">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Descrizione</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" value=""
                    id="description" rows="5">  {{ old('description', $apartment->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label fw-bold">Indirizzo</label>
                <p id="address">{{ $apartment->address . ',' . $apartment->city }}</p>
                {{-- <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                    value="{{ old('address', $apartment->address) }}" id="address" aria-describedby="address">
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror --}}
            </div>


            <div class="mb-3">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 mb-3">
                        <label for="rooms" class="form-label fw-bold">Numero di stanze</label>
                        <input type="number" name="rooms" class="form-control @error('rooms') is-invalid @enderror"
                            value="{{ old('rooms', $apartment->rooms) }}" id="rooms" aria-describedby="rooms">
                        @error('rooms')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-13 mb-3"> 
                        <label for="beds" class="form-label fw-bold">Numero di posti letto</label>
                        <input type="number" name="beds" class="form-control @error('beds') is-invalid @enderror"
                        value="{{ old('beds', $apartment->beds) }}" id="beds" aria-describedby="beds">
                        @error('beds')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-12 mb-3">
                        <label for="bathrooms" class="form-label fw-bold">Numero di bagni</label>
                        <input type="number" name="bathrooms" class="form-control @error('bathrooms') is-invalid @enderror"
                        value="{{ old('bathrooms', $apartment->bathrooms) }}" id="bathrooms" aria-describedby="bathrooms">
                        @error('bathrooms')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                        <label for="sqm" class="form-label fw-bold">Metri quadri</label>
                        <input type="number" name="sqm" class="form-control @error('sqm') is-invalid @enderror"
                        value="{{ old('sqm', $apartment->sqm) }}" id="sqm" aria-describedby="sqm">
                        @error('sqm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                        <label for="price" class="form-label fw-bold">Prezzo</label>
                        <div class="input-group ">
                        <span class="input-group-text">€</span>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price', $apartment->price) }}" id="price">
                        </div>
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>


            <figure class="mb-3">
                <img src="{{ asset('storage/' . $apartment->cover_image) }}" alt="immagine di copertina" width="100">
            </figure>
            <div class="mb-3">
                <label for="cover_image" class="form-label fw-bold">Immagine di copertina</label>
                <input type="file" name="cover_image" class="form-control"
                    value="{{ old('cover_image', $apartment->cover_image) }}" id="cover_image"
                    aria-describedby="cover_image">
            </div>

            @if ($apartment->images)
            <div class="">
                <div class="row align-items-stretch">
                        @foreach ($images as $image)
                        <div class="col-auto my-3">
                            <img src="{{ asset('storage/' .$image->url) }}" alt="{{$image->name}}" class="image-edit">
                            <button type="submit" name="deleteImage" value="{{$image->id}}" class="text-danger delete-btn">X</button>
                            @if ($image->name)
                                <p>{{$image->name}}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                    
            @endif


           <div id="add-field">
                <div class="mb-3" >
                    <div class="row align-items-end gap-3" >
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
                            <button type="button" class="add-btn text-lg-end text-md-start" id="add">+</button>
                        </div>
                    </div>
                   
                </div>
            </div>

            
            <div class="mb-3">
                <label class="form-label fw-bold" for="services"> Servizi</label>
                @foreach($services->chunk(3) as $row)
                    <div class="row m-0">
                        @foreach ($row as $service)
                        <div class="col-4 form-check">
                            <input type="checkbox" name="services[]" @checked(in_array($service->id, old('services', $apartment->getServiceIds()))) class="form-check-input "
                            value="{{ $service->id }}" id="flexCheckDefault">
                            <label for="flexCheckDefault" class="form-check-label">{{ $service->name }}</label>
                        </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div class="mb-4">
                <label for="visibility" class="form-label fw-bold">Visibilità</label>
                <select class="form-select @error('visibility') is-invalid @enderror" aria-label="Default select example"
                    id="visibility" name="visibility" value="{{ old('visibility', $apartment->visibility) }}">
                    <option selected>Vuoi rendere visibile il tuo appartamento ?</option>
                    <option @selected(old('visibility', $apartment->visibility) == 1) value="1">Pubblico</option>
                    <option @selected(old('visibility', $apartment->visibility) == 0) value="0">Privato</option>
                </select>
                @error('visibility')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-auto mt-3">
                <button type="submit" class="btn btn-bool me-2">Modifica</button>
                <a href="{{ route('apartments.index') }}" class="btn btn-bool-out"> Torna alla Homepage</a>
            </div>
        </form>
    </div>

    <script>
        $("#add").click(function () {
            $("#add-field").append(
                `<div class="mb-3">
                    <div class="row align-items-end gap-3">
                    <div class="col-lg-4 col-sm-12">
                        <input class="form-control  @error('images') is-invalid @enderror" type="file" id="images"
                            name="images[]"">
                        @error('images')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="col ">
                        <button type="button" class="del-btn remove-input-field">-</button>
                    </div>
                    
                </div>
                </div>`
                );
        });
        $('body').on('click', '.remove-input-field', function () {
            $(this).closest('.mb-3').remove();
        });
      
    </script>

  
@endsection

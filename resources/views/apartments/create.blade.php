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
            <input class="form-control" type="text" id="rooms" name="rooms" value="{{ old('rooms') }}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="beds">Numero di posti letto</label>
            <input class="form-control" type="text" id="beds" name="beds" value="{{ old('beds') }}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="bathrooms">Numero di bagni</label>
            <input class="form-control" type="text" id="bathrooms" name="bathrooms" value="{{ old('bathrooms') }}">
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
            <label class="form-label" for="lat">Latitudine</label>
            <input class="form-control" type="text" id="lat" name="lat" value="{{ old('lat') }}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="lng">Longitudine</label>
            <input class="form-control" type="text" id="lng" name="lng" value="{{ old('lng') }}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="visibility">Visibile</label>
            <input class="form-control" type="text" id="visibility" name="visibility" value="{{ old('visibility') }}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="price">Prezzo</label>
            <input class="form-control" type="text" id="price" name="price" value="{{ old('price') }}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="cover-image">Immagine di copertina</label>
            <input class="form-control" type="text" id="cover-image" name="cover-image" value="{{ old('cover-image') }}">
        </div>

        <button type="submit" class="btn btn-success">
            Invia
        </button>
    </form>
</div>
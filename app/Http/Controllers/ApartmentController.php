<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Service;
use App\Models\Image;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();

        return view('apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('apartments.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApartmentRequest $request)
    {
        $data = $request->all();

        //genero slug
        $data['slug'] = Str::slug($data['title']);

        //autenticazione
        $data['user_id'] = Auth::id();

        //salvo le immagini
        if ($request->hasFile('cover-image')) {
            $cover_path = Storage::put('uploads', $data['cover-image']);
            $data['cover_image'] = $cover_path;
        }

        $apartment = Apartment::create($data);

        //salvo i servizi
        if (isset($data['services'])) {
            $apartment->services()->attach($data['services']);
        }

        return to_route('apartments.show', $apartment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $services = Service::all();

        return view('apartments.edit', compact('apartment', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApartmentRequest  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {
        //$this->authorize('update', $apartment);

        $data = $request->all();

        //modifica dello slug se cambia il titolo
        if ($data['title'] !== $apartment['title']) {
            $data['slug'] = Str::slug($data['title']);
        }

        //salvataggio e modifica immagine di copertina
        if ($request->hasFile('cover_image')) {
            $cover_path = Storage::put('uploads', $data['cover_image']);
            $data['cover_image'] = $cover_path;

            if ($apartment->cover_image && Storage::exists($apartment->cover_image)) {
                Storage::delete($apartment->cover_image);
            }
        }

        $apartment->update($data);

        //aggiornamento dei servizi
        if (isset($data['services'])) {
            $apartment->services()->sync($data['services']);
        } else {
            $apartment->services()->sync([]);
        }

        return to_route('apartments.show', $apartment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();

        return to_route('apartments.index');
    }
}

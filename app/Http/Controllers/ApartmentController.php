<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Service;
use App\Models\Image;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Models\Sponsorship;
use App\Http\Requests\UpdateImageRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $user_id = Auth::id();
        $apartments = Apartment::where('user_id', $user_id)->get();


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
    public function store(StoreApartmentRequest $request, StoreImageRequest $imgRequ)
    {
        //dd($request['caption']);
        $data = $request->validated();

        //genero slug
        $uniqueId = Str::random(8);
        $data['slug'] = Str::slug($data['title']) . '-' . $uniqueId;

        //autenticazione
        $data['user_id'] = Auth::id();

        //salvo immagine di copertina
        if ($request->hasFile('cover_image')) {
            $cover_path = Storage::put('uploads', $data['cover_image']);
            $data['cover_image'] = $cover_path;
        }

        $apartment = Apartment::create($data);

        //salvo i servizi
        if (isset($data['services'])) {
            $apartment->services()->attach($data['services']);
        }

        //salvo le immagini

        $imageValidate = $imgRequ->validated();

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $captions = $request->input('caption');

            foreach ($images as $key => $image) {

                $image_path = Storage::put('uploads', $image);

                if (isset($captions[$key])) {
                    $image_name = $captions[$key];
                } else {
                    $image_name = null;
                }

                $imageValidate = [
                    "apartment_id" => $apartment->id,
                    "url" => $image_path,
                    "name" => $image_name
                ];
                Image::create($imageValidate);
            }
        }

        return to_route('apartments.show', $apartment)->with('alert-message', "Appartamento creato con successo")->with('alert-type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment, Sponsorship $sponsorship)
    {
        $this->authorize('view', $apartment);

        $images = Image::where('apartment_id', $apartment->id)->get();
        return view('apartments.show', compact('apartment', 'images', 'sponsorship'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $this->authorize('view', $apartment);
        $services = Service::all();
        $images = Image::where('apartment_id', $apartment->id)->get();
        return view('apartments.edit', compact('apartment', 'services', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApartmentRequest  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment, Image $image, UpdateImageRequest $imgRequ)
    {
        $this->authorize('update', $apartment);

        $data = $request->validated();

        //modifica dello slug se cambia il titolo
        if ($data['title'] !== $apartment['title']) {
            $uniqueId = Str::random(8);
            $data['slug'] = Str::slug($data['title']) . '-' . $uniqueId;
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

        //salvo nuove immagini
        $imageValidate = $imgRequ->validated();

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $captions = $request->input('caption');

            foreach ($images as $key => $image) {

                $image_path = Storage::put('uploads', $image);

                if (isset($captions[$key])) {
                    $image_name = $captions[$key];
                } else {
                    $image_name = null;
                }

                $imageValidate = [
                    "apartment_id" => $apartment->id,
                    "url" => $image_path,
                    "name" => $image_name
                ];
                Image::create($imageValidate);
            }
        }


        //elimino le immagini
        if ($request->has('deleteImage')) {
            $id = $request->input('deleteImage');

            if ($image && Storage::exists($image)) {
                Storage::delete($image);
            }
            Image::find($id)->delete();

            return back();
        }


        return to_route('apartments.show', $apartment)->with('alert-message', "Appartamento modificato con successo")->with('alert-type', 'success');;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        if ($apartment->user_id != Auth::id()) {
            abort(403, 'NO');
        }

        if ($apartment->cover_image && Storage::exists($apartment->cover_image)) {
            Storage::delete($apartment->cover_image);
        }

        $images = Image::where('apartment_id', $apartment->id)->get();
        foreach ($images as $image) {
            if ($image && Storage::exists($image)) {
                Storage::delete($image);
            }
        }


        $apartment->delete();

        return to_route('apartments.index')->with('alert-message', "Appartamento eliminato con successo")->with('alert-type', 'success');
    }

    public function enableToggle(Apartment $apartment)
    {
        $apartment->visibility = !$apartment->visibility;
        $apartment->save();

        return redirect()->back();
    }
}

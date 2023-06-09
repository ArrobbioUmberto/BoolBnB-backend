<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSponsorshipRequest;
use App\Http\Requests\UpdateSponsorshipRequest;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Braintree;
use Braintree\Transaction;
use Illuminate\Http\Client\Response as ClientResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Apartment $apartment)
    {

        $sponsorships = Sponsorship::all();
        return view('payment.sponsor', compact('sponsorships', 'apartment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSponsorshipRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSponsorshipRequest $request, Apartment $apartment, Sponsorship $sponsorship, Response $response)
    {
        if ($response) {

            $startDate = Carbon::now()->locale('it_IT')->timezone('Europe/Rome');
            $endDate = $startDate->copy();

            if ($sponsorship->id == 1) {
                $endDate->addDay();
            } elseif ($sponsorship->id == 2) {
                $endDate->addDays(3);
            } elseif ($sponsorship->id == 3) {
                $endDate->addDays(6);
            }

            $apartment->sponsorships()->attach($sponsorship->id, [
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);
        }

        return redirect()->route('apartments.show', compact('apartment', 'sponsorship'))->with('alert-message', "Pagemento effettuato con successo")->with('alert-type', 'success');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsorship  $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsorship $sponsorship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsorship  $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsorship $sponsorship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSponsorshipRequest  $request
     * @param  \App\Models\Sponsorship  $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSponsorshipRequest $request, Sponsorship $sponsorship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsorship  $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsorship $sponsorship)
    {
        //
    }
}

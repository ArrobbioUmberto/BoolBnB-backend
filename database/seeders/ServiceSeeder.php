<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            "Wi-Fi",
            "Aria condizionata",
            "Parcheggio gratuito",
            "Cucina completamente attrezzata",
            "Lavatrice",
            "Asciugatrice",
            "Asciugacapelli",
            "Acqua calda",
            "Ascensore",
            "TV via cavo/satellite",
            "Piscina",
            "Palestra",
            "Jacuzzi/vasca idromassaggio",
            "Balcone/terrazza",
            "Giardino",
            "Camino",
            "Barbecue",
            "Accesso per disabili",
            "Animali domestici ammessi",
            "Servizio di pulizia",
            "Servizio navetta",
            "Reception 24 ore",
            "Sicurezza 24 ore",
            "Vista mare",
            "Vista montagna",
            "Vista città",
            "Vista sul cortile",
            "Colazione inclusa",
            "Servizio di consegna cibo",
            "Noleggio biciclette",
            "Noleggio auto",
            "Baby-sitter",
            "Area giochi per bambini",
            "Check-in 24 ore",
            "Deposito bagagli",
        ];

        foreach ($services as $service) {
            $new_service = new Service();
            $new_service->name = $service;
            $new_service->save();

        }
    }
}

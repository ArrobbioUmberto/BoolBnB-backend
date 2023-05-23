<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Apartment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $good_title = [
            "Elegante Appartamento nel Cuore del Centro Storico",
            "Villa di Lusso con Vista Mare e Piscina Privata",
            "Casetta Accogliente Immersa nella Natura",
            "Moderno Loft con Terrazza Panoramica",
            "Chalet Esclusivo a due passi dalla Spiaggia",
            "Suite di Design con Vasca Idromassaggio",
            "Incantevole Villetta nel Borgo Antico",
            "Casa di Montagna con Vista Panoramica",
            "Appartamento di Charme nel Quartiere alla Moda",
            "Casa Storica con Giardino Segreto",
            "Villa Esclusiva con Accesso Privato alla Spiaggia",
            "Cascina Ristrutturata nel Cuore della Campagna",
            "Attico Moderno con Vista Mozzafiato",
            "Cottage Romantico Immerso nel Bosco",
            "Appartamento Artistico nel Quartiere degli Artisti",
            "Dimora di Prestigio con Piscina e Giardino",
            "Villa di Design con Vista Spettacolare",
            "Casa Vacanze con Patio e Barbecue",
            "Rustico Tradizionale tra i Vigneti",
            "Loft Stiloso nel Centro Città",
            "Cottage di Campagna con Piscina Naturale",
            "Suite di Lusso in un Antico Castello",
            "Villetta con Giardino Segreto e Jacuzzi",
            "Appartamento Confortevole a due passi dai Monumenti",
            "Villa Panoramica con Infinity Pool",
            "Bungalow Intimo con Vista Mare",
            "Casa di Charme nel Quartiere Autentico",
            "Chalet Accogliente tra i Pini",
            "Attico di Design con Terrazza Privata",
            "Cottage Romantico con Camino e Vista Montagna",
            "Appartamento Moderno nel Quartiere Trendy",
            "Dimora Storica con Cortile Interno",
            "Villa di Lusso con Piscina Infinity",
            "Casa Vacanza con Giardino Fiorito",
            "Rustico Tradizionale tra i Campi di Lavanda",
            "Loft Spazioso nel Centro Storico",
            "Bungalow Esclusivo a due passi dalla Spiaggia",
            "Suite di Lusso in un Antico Palazzo",
            "Villetta con Patio e Piscina Privata",
            "Appartamento Elegante nel Cuore della Città",
            "Villa Panoramica con Accesso Privato alla Spiaggia",
            "Cottage di Campagna con Jacuzzi e Giardino",
            "Attico Moderno con Vista Mozzafiato",
            "Casa Vacanze Accogliente nel Centro Antico",
            "Chalet di Montagna con Camino e Vasca Idromassaggio",
            "Dimora Storica con Giardino Segreto",
            "Villa di Lusso con Piscina Privata",
            "Appartamento Raffinato con Vista sul Fiume",
            "Bungalow Romantico Immerso nel Verde",
            "Loft Design nel Quartiere alla Moda",
            "Cottage di Campagna con Vista Panoramica",
            "Suite di Lusso in un Palazzo Rinascimentale",
            "Villetta con Giardino Segreto e Piscina",
            "Appartamento Moderno nel Cuore della Movida",
            "Villa Panoramica con Accesso Privato alla Spiaggia",
            "Casa Vacanza con Patio e Vista Mare",
            "Chalet di Montagna con Camino e Sauna",
            "Dimora Storica con Cortile Interno",
            "Rifugio di Lusso Immerso nella Natura",
            "Attico Design con Terrazza Panoramica",
            "Cottage Romantico in Riva al Lago",
            "Suite di Charme nel Palazzo Storico",
            "Villetta con Piscina Privata e Giardino",
            "Appartamento di Stile a due passi dal Centro",
            "Villa Esclusiva con Piscina Infinity",
            "Casa Vacanza con Patio e Barbecue",
            "Chalet Accogliente tra i Boschi",
            "Dimora di Prestigio con Giardino Segreto",
            "Loft Moderno nel Quartiere degli Artisti",
            "Bungalow Intimo con Vista Mare",
            "Suite di Lusso in una Dimora Nobiliare",
            "Villetta con Patio e Jacuzzi",
            "Appartamento Elegante nel Cuore della Città",
            "Villa Panoramica con Accesso Privato alla Spiaggia",
            "Cottage di Campagna con Jacuzzi e Giardino",
            "Attico Moderno con Vista Mozzafiato",
            "Casa Vacanze Accogliente nel Centro Storico",
            "Chalet di Montagna con Camino e Vasca Idromassaggio",
            "Dimora Storica con Giardino Segreto",
            "Villa di Lusso con Piscina Privata",
            "Appartamento Raffinato con Vista sul Fiume",
            "Bungalow Romantico Immerso nel Verde",
            "Loft Chic nel Quartiere delle Gallerie",
            "Cottage di Campagna con Vista Panoramica",
            "Suite di Lusso in un Palazzo Barocco",
            "Villetta con Patio e Piscina",
            "Appartamento Moderno a due passi dai Musei",
            "Villa Panoramica con Accesso Privato alla Spiaggia",
            "Casa Vacanza con Vista Mare e Giardino",
            "Chalet di Montagna con Camino e Bagno Turco",
            "Dimora Storica con Cortile Segreto",
            "Rifugio di Lusso nel Cuore della Foresta",
            "Attico di Design con Terrazza Panoramica",
            "Cottage Romantico con Vista sulle Colline",
            "Suite di Charme in un Palazzo Rinascimentale",
            "Villetta con Piscina Privata e Giardino Fiorito",
            "Appartamento di Stile nel Quartiere Trendy",
            "Villa Esclusiva con Piscina Infinity e Accesso al Mare",
            "Casa Vacanza con Patio e Vista sulla Baia",
            "Chalet Accogliente tra i Monti",
            "Dimora di Prestigio con Giardino Segreto e Piscina",
            "Loft Moderno nel Quartiere delle Gallerie d'Arte"
        ];


        $service_ids = Service::all()->pluck("id")->all();
        $user_ids = User::all()->pluck('id')->all();


        for ($i = 0; $i < 100; $i++) {
            $num_bath = $faker->numberBetween(1, 6);
            $num_rooms = $num_bath * 3;
            $num_beds = ceil($num_rooms / 2);
            $sqm = $num_rooms * 12;
            $price = $sqm * 1.8;

            $new_apartment = new Apartment();


            $new_apartment->title = $good_title[$i];
            $new_apartment->rooms = $num_rooms;
            $new_apartment->beds = $num_beds;
            $new_apartment->bathrooms = $num_bath;
            $new_apartment->sqm = $sqm;
            $new_apartment->address = $faker->streetAddress();
            $new_apartment->city = $faker->city();
            $new_apartment->lat = $faker->latitude(-90, 90);
            $new_apartment->lng = $faker->longitude(-180, 180);
            $new_apartment->visibility = $faker->boolean();
            $new_apartment->price = $price;
            $new_apartment->description = $faker->paragraph(4);
            $new_apartment->cover_image = $faker->imageUrl();
            $new_apartment->slug = Str::slug($new_apartment->title, "-");
            $new_apartment->user_id = $faker->randomElement($user_ids);

            $new_apartment->save();

            $new_apartment->services()->attach($faker->randomElements($service_ids, rand(7, 35)));
        }
    }
}

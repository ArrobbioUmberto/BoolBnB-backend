<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartment_id = Apartment::all()->pluck('id')->all();
        $photos = [
            "Camera da letto principale",
            "Soggiorno spazioso",
            "Cucina completamente attrezzata",
            "Bagno moderno",
            "Studio tranquillo",
            "Terrazza panoramica",
            "Sala da pranzo elegante",
            "Area relax con divano comodo",
            "Stanza degli ospiti accogliente",
            "Cameretta colorata per bambini",
            "Camera da letto con vista panoramica",
            "Soggiorno luminoso con camino",
            "Cucina open space con isola centrale",
            "Bagno con vasca idromassaggio",
            "Studio con scrivania ergonomica",
            "Balcone privato con vista sul giardino",
            "Sala cinema con comodi divani",
            "Area fitness attrezzata",
            "Spaziosa sala giochi per bambini",
            "Stanza degli ospiti con bagno privato"
        ];
        for ($i = 0; $i < 100; $i++) {
            $new_image = new Image();
            $new_image->name = $faker->randomElement($photos);
            $new_image->url = $faker->imageUrl();
            $new_image->apartment_id = $faker->randomElement($apartment_id, rand(1, 4));
            $new_image->save();
        }
    }
}

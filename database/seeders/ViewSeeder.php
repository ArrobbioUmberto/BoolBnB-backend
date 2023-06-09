<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\View;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $apartment_ids = Apartment::all()->pluck('id')->all();

        for ($i = 0; $i < 300; $i++) {
            $new_view = new View();

            $new_view->ip = $faker->ipv4();
            $new_view->accessed = $faker->dateTimeBetween('-2 weeks', 'now')->format('Y-m-d H:i:s');
            $new_view->apartment_id = $faker->randomElement($apartment_ids, rand(1,20));

            $new_view->save();
        }
    }
}

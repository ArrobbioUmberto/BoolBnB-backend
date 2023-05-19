<?php

namespace Database\Seeders;

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
        for ($i = 0; $i < 20; $i++) {
            $new_view = new View();

            $new_view->ip = $faker->ipv4();
            $new_view->accessed = $faker->dateTime()->format('Y-m-d H:i:s');

            $new_view->save();
        }
    }
}

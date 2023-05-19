<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class ApartmentSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i = 1; $i < 11; $i++) {
            $random_id = $faker->numberBetween(1, 3);
            $start_date = $faker->dateTime()->format('Y-m-d H:i:s');
            $end_date = '';
            if ($random_id === 1) {
                $end_date = date('Y-m-d H:i:s', strtotime($start_date . '+24 hours'));
            } else if ($random_id === 2) {
                $end_date = date('Y-m-d H:i:s', strtotime($start_date . '+72 hours'));
            } else {
                $end_date = date('Y-m-d H:i:s', strtotime($start_date . '+144 hours'));
            };
            DB::table('apartment_sponsorship')->insert([
                'apartment_id' => $i,
                'sponsorship_id' => $random_id,
                'start_date' => $start_date,
                'end_date' => $end_date,
            ]);
        }
    }
}

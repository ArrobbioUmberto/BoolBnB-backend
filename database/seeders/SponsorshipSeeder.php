<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsorship;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sponsorships = [
            [
                'name' => 'Spotlight Stay',
                'duration' => 24,
                'price' => 2.99
            ],
            [
                'name' => 'Featured Getaway',
                'duration' => 72,
                'price' => 5.99
            ],
            [
                'name' => 'Exclusive retreat',
                'duration' => 144,
                'price' => 9.99
            ],
        ];

        foreach ($sponsorships as $sponsorship) {
            
            $new_sponsorship = new Sponsorship();

            $new_sponsorship->name = $sponsorship['name'];
            $new_sponsorship->duration = $sponsorship['duration'];
            $new_sponsorship->price = $sponsorship['price'];

            $new_sponsorship->save();
        }
    }
}

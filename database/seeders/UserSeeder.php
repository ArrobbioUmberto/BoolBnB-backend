<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 30; $i++) {
            $new_user = new User();
            $new_user->first_name = $faker->firstName();
            $new_user->last_name = $faker->lastName();
            $new_user->date_birth = $faker->dateTime();
            $new_user->email = strtolower($new_user->first_name . str_replace(" ", '', $new_user->last_name) . $faker->unique()->numberBetween(0, 100)) . '@gmail.com';
            $new_user->password = $faker->password();
            $new_user->save();
        }
    }
}

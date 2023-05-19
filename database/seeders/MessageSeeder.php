<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $messages = [
            "Salve, vorrei avere informazioni sulla disponibilità di un appartamento nel periodo dal 05/06 al 15/06. Potete fornirmi maggiori dettagli?",
            "Buongiorno, sto cercando un appartamento per 4 persone nel periodo 10/07 - 20/07. Potete dirmi se avete disponibilità?",
            "Salve, sto pianificando una vacanza e mi interesserebbe prenotare un appartamento nel vostro complesso. Potete indicarmi i prezzi e la disponibilità?",
            "Ciao, volevo sapere se avete appartamenti disponibili per un soggiorno di 7 notti nel mese di settembre. Quali sono i prezzi?",
            "Buonasera, vorrei avere informazioni sui vostri appartamenti con vista mare. Sarebbe possibile prenotarne uno per 5 notti nel periodo 20/08 - 27/08?",
            "Salve, sto cercando un appartamento per un weekend lungo nel mese di maggio. Mi potete fornire maggiori dettagli sulle vostre opzioni disponibili?",
            "Buongiorno, mi interesserebbe prenotare un appartamento nel vostro complesso per 2 persone nel periodo dal dal 05/06 al 15/06. Potete fornirmi le tariffe?",
            "Salve, sto programmando una visita nella vostra città e mi piacerebbe prenotare un appartamento per 4 notti. Quali sono le vostre disponibilità?",
            "Ciao, volevo chiedere se avete appartamenti con cucina attrezzata. Sto cercando una soluzione per 3 persone nel periodo 10/07 - 20/07.",
            "Buongiorno, vorrei avere informazioni sulla disponibilità di un appartamento nel vostro complesso per il periodo dal 20/05 al 30/05. Quali sono i servizi inclusi?",
            "Salve, sto cercando un appartamento nel vostro quartiere. Potete dirmi se avete disponibilità per 5 notti nel mese di aprile?",
            "Ciao, mi interesserebbe prenotare un appartamento nel vostro complesso per 5 persone nel periodo dal 04/04 al 09/04. Quali sono i servizi aggiuntivi disponibili?",
            "Buongiorno, sto programmando una visita nella vostra città e vorrei sapere se avete appartamenti con accesso per disabili. Quali sono le vostre disponibilità nel periodo 20/08 - 27/08??",
            "Salve, sto cercando un appartamento nel centro città. Potete fornirmi informazioni sulla disponibilità nel periodo dal 04/04 al 09/04?",
            "Ciao, vorrei prenotare un appartamento per 10 notti nel vostro complesso. Potete indicarmi se avete disponibilità nel periodo 04/06 al 09/06?",
            "Buongiorno, mi piacerebbe prenotare un appartamento nel vostro complesso per 4 persone nel periodo dal 14/04 al 19/04. Quali sono i servizi inclusi nel prezzo?",
            "Salve, sto cercando un appartamento con parcheggio incluso. Potete dirmi se avete disponibilità per 3 notti nel mese di luglio?",
            "Ciao, mi piacerebbe prenotare un appartamento nel vostro complesso per 6 notti nel periodo 05/06 - 15/06. Quali sono i servizi disponibili?",
            "Buongiorno, sto programmando una visita nella vostra città e vorrei sapere se avete appartamenti con terrazza o balcone. Quali sono le vostre disponibilità nel periodo 10/07 - 20/07.?",
            "Salve, sto cercando un appartamento nel vostro quartiere. Potete fornirmi informazioni sulla disponibilità per 3 notti nel mese di settembre?",
            "Ciao, vorrei prenotare un appartamento per 5 notti nel vostro complesso. Potete indicarmi se avete disponibilità nel periodo 05/06 - 15/06?"
        ];

        $app_ids = Apartment::all()->pluck('id')->all();


        for ($i = 0; $i < 50; $i++) {

            $new_message = new Message();

            $new_message->name = $faker->firstName();
            $new_message->email =  strtolower($new_message->name . $faker->unique()->numberBetween(0, 100)) . '@gmail.com';
            $new_message->text = $faker->randomElement($messages);
            $new_message->apartment_id = $faker->randomElement($app_ids, rand(1, 5));

            $new_message->save();
        }
    }
}

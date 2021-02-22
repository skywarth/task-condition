<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //no need to check if exists in db :P
        Currency::create([
            'name' => "Turkish Lira",
            'sign'=>"₺"

        ]);

        Currency::create([
            'name' => "Euro",
            'sign'=>"€"


        ]);

        Currency::create([
            'name' => "US Dollar",
            'sign'=>"$"


        ]);
        Currency::create([
            'name' => "British Pound",
            'sign'=>"£"


        ]);
    }
}

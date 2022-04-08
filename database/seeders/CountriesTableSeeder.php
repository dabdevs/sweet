<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertCountry('Argentina', 'AR', 'ARS'); 
        $this->insertCountry('Brazil', 'BR', 'BRL'); 
        $this->insertCountry('Chile', 'CL', 'CLP'); 
        $this->insertCountry('Uruguay', 'UR', 'UYU'); 
    }

    private function insertCountry($name, $code, $currency)
    {
        $country = Country::where(['name' => $name, 'code' => $code])->first();
        if($country == null) {
            $country = new Country();
        }

        $country->name = $name;
        $country->code = $code;
        $country->currency = $currency;
        $country->save();
    }
}

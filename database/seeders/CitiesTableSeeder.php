<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $argentina = Country::where('code', 'AR')->firstOrFail();

        $this->insertCity('CABA', $argentina); 
        $this->insertCity('Cordoba', $argentina); 
        $this->insertCity('Rosario', $argentina); 
        $this->insertCity('Santiago del Estero', $argentina); 
    }

    private function insertCity($name, Country $country)
    {
        $city = City::where(['name' => $name, 'country_id' => $country->id])->first();
        if($city == null) {
            $city = new City();
        }

        $city->name = $name;
        $city->country_id = $country->id;
        $city->save();
    }
}

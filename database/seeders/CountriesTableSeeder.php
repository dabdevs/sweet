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
        $this->insertCountry('Argentina', 'AR'); 
        $this->insertCountry('Brazil', 'BR'); 
        $this->insertCountry('Chile', 'CL'); 
        $this->insertCountry('Uruguay', 'UR'); 
    }

    private function insertCountry($name, $code)
    {
        $country = Country::where(['name' => $name, 'code' => $code])->first();
        if($country == null) {
            $country = new Country();
        }

        $country->name = $name;
        $country->code = $code;
        $country->save();
    }
}

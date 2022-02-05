<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertLocation('Microcentro', 1); 
        $this->insertLocation('Caballito', 1); 
        $this->insertLocation('Palermo', 1); 
        $this->insertLocation('Recolecta', 1);
        
        $this->insertLocation('Nueva Cordoba', 2); 
        $this->insertLocation('Villa Maria', 2); 
        $this->insertLocation('Carlos Paz', 2); 
    }

    private function insertLocation($name, $city_id)
    {
        $location = Location::where('name', $name)->first();
        if($location == null) {
            $location = new Location(); 
        }

        $location->name = $name;
        $location->city_id = $city_id;
        $location->save();
    }
}

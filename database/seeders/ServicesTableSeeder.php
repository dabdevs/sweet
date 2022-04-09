<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertService('Actors & Actresses'); 
        $this->insertService('Comedians'); 
        $this->insertService('Dancers');
        $this->insertService('Djs & Producers');
        $this->insertService('Magicians');
        $this->insertService('Musician'); 
        $this->insertService('Photographers'); 
        $this->insertService('Videographers'); 
    }

    private function insertService($name, $parent_id = null)
    {
        $service = Service::where('name', $name)->first();
        if($service == null) {
            $service = new Service(); 
        }

        $service->name = $name;
        $service->parent_id = $parent_id;
        $service->save();
    }
}

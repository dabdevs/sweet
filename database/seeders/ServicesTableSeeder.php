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
        $this->insertService('Service 1'); 
        $this->insertService('Service 2'); 
        $this->insertService('Service 3');
        $this->insertService('Service 4'); 
    }

    private function insertService($name)
    {
        $service = Service::where('name', $name)->first();
        if($service == null) {
            $service = new Service(); 
        }

        $service->name = $name;
        $service->save();
    }
}

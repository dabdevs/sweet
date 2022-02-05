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
        $this->insertService('Phone calls'); 
        $this->insertService('Video calls'); 
        $this->insertService('Nude selling');
        $this->insertService('Hook ups'); 
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

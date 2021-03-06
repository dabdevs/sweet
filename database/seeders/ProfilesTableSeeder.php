<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createProfile(1, 1, 1, 1, 1, '13235265', 1, 1);
        $this->createProfile(2, 1, 1, 1, 1, '54434344', 0, 1);
        $this->createProfile(3, 2, 1, 2, 2, '4566667654', 1, 1);
        $this->createProfile(4, 3, 1, 1, 3, '65788865', 1, 1);
        $this->createProfile(5, 4, 1, 2, 2, '12343555', 1, 1);
    }

    private function createProfile($user_id, $category_id, $country_id, $city_id, $location_id, $telephone, $whatsapp, $file_id)
    {
        $profile = Profile::where('user_id', $user_id)->first();
        if ($profile == null) {
            $profile = new Profile();
            $profile->user_id = $user_id;
        }
        $profile->country_id = $country_id;
        $profile->category_id = $category_id;
        $profile->city_id = $city_id;
        $profile->location_id = $location_id;
        $profile->telephone = $telephone;
        $profile->whatsapp = $whatsapp;
        $profile->file_id = $file_id;
        $profile->save();
    }
}

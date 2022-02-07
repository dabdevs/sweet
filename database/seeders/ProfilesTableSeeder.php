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
        $this->createProfile(1, 1, 1, 1, 'Female', null, '13235265', 1);
        $this->createProfile(2, 1, 1, 1, 'Male', null, '54434344', 0); 
        $this->createProfile(3, 1, 2, 2, 'Female', null, '4566667654', 1);
        $this->createProfile(4, 1, 1, 3, 'Female', null, '65788865', 1);
        $this->createProfile(5, 1, 2, 2, 'Female', null, '12343555', 1);
    }

    private function createProfile($user_id, $country_id, $city_id, $location_id, $gender, $bio, $telephone, $whatsapp)
    {
        $profile = Profile::where('user_id', $user_id)->first();
        if($profile == null) {
            $profile = new Profile(); 
            $profile->user_id = $user_id;
        }
        $profile->country_id = $country_id;
        $profile->city_id = $city_id;
        $profile->location_id = $location_id;
        $profile->gender = $gender;
        $profile->bio = $bio;
        $profile->telephone = $telephone;
        $profile->whatsapp = $whatsapp;
        $profile->save();
    }
}
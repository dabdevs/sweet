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
        $this->createProfile(1, 1, 1, 1, null, '13235265', 1, 1);
        $this->createProfile(2, 1, 1, 1, null, '54434344', 0, 1);
        $this->createProfile(3, 1, 2, 2, null, '4566667654', 1, 1);
        $this->createProfile(4, 1, 1, 3, null, '65788865', 1, 1);
        $this->createProfile(5, 1, 2, 2, null, '12343555', 1, 1);
    }

    private function createProfile($user_id, $country_id, $city_id, $location_id, $bio, $telephone, $whatsapp, $file_id)
    {
        $profile = Profile::where('user_id', $user_id)->first();
        if ($profile == null) {
            $profile = new Profile();
            $profile->user_id = $user_id;
        }
        $profile->country_id = $country_id;
        $profile->city_id = $city_id;
        $profile->location_id = $location_id;
        $profile->bio = $bio;
        $profile->telephone = $telephone;
        $profile->whatsapp = $whatsapp;
        $profile->file_id = $file_id;
        $profile->save();
    }
}

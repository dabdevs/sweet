<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertUser('dabdevs@gmail.com', 'Alain', '1234', 'Male', '02/12/1998');
        $this->insertUser('lola@gmail.com', 'Lola', 'lola', 'Female', '02/01/1995'); 
        $this->insertUser('martin@gmail.com', 'Martin', '1234', 'Male', '22/04/2011'); 
        $this->insertUser('veronica@gmail.com', 'Vero', '1234', 'Female', '10/09/1990');
        $this->insertUser('pampalu@gmail.com', 'Pampalu', '1234', 'Female', '09/03/2000'); 
    }

    private function insertUser($email, $name, $password, $gender, $birthdate)
    {
        $user = User::where('email', $email)->first();
        if($user == null) {
            $user = new User();
        }

        $user->email = $email; 
        $user->username = $name;
        $user->password = Hash::make($password);
        $user->save();
    }
}

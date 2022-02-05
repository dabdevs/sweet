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
        $this->insertUser('admin@sweet.com', 'Admin', 'admin'); 
        $this->insertUser('dabdves@gmail.com', 'Alain', '1234');
        $this->insertUser('lola@gmail.com', 'Lola', 'lola'); 
        $this->insertUser('martinp@gmail.com', 'Martin', '1234'); 
        $this->insertUser('veronica@gmail.com', 'Vero', '1234');
        $this->insertUser('pampalu@gmail.com', 'Pampalu', '1234'); 
    }

    private function insertUser($email, $name, $password)
    {
        $user = User::where('email', $email)->first();
        if($user == null) {
            $user = new User();
        }

        $user->email = $email; 
        $user->name = $name;
        $user->password = Hash::make($password);
        $user->save();
    }
}

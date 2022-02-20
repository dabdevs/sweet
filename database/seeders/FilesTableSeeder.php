<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::insert('insert into files (name, path) values (?, ?)', ['default.jpg', 'default.jpg']);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertTag('Wedding'); 
        $this->insertTag('Graduation');
        $this->insertTag('Photo Book'); 
        $this->insertTag('Hip Hop');
        $this->insertTag('Dancehall');
        $this->insertTag('Salsa');
        $this->insertTag('Kizomba');
    }

    private function insertTag($name, $service_id = null)
    {
        $tag = Tag::where('name', $name)->first();
        if($tag == null) {
            $tag = new Tag(); 
        }

        $tag->name = $name;
        $tag->service_id = $service_id;
        $tag->save();
    }
}

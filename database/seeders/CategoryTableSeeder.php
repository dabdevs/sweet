<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertCategory('Actors & Actresses'); 
        $this->insertCategory('Comedians'); 
        $this->insertCategory('Dancers');
        $this->insertCategory('Djs & Producers');
        $this->insertCategory('Magicians');
        $this->insertCategory('Musicians'); 
        $this->insertCategory('Photographers'); 
        $this->insertCategory('Videographers');
        $this->insertCategory('Singers'); 
    }

    private function insertCategory($name, $parent_id = null)
    {
        $category = Category::where('name', $name)->first();
        if($category == null) {
            $category = new Category(); 
        }

        $category->name = $name;
        $category->parent_id = $parent_id;
        $category->save();
    }
}

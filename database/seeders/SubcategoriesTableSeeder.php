<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Subcategory;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $acting = Category::whereName('Actors & Actresses')->first()->id;
        $comedy = Category::whereName('Comedians')->first()->id;
        $dancing = Category::whereName('Dancers')->first()->id;
        $djing = Category::whereName('Djs & Producers')->first()->id;
        $magic = Category::whereName('Magicians')->first()->id;
        $music = Category::whereName('Musicians')->first()->id;
        $photo = Category::whereName('Photographers')->first()->id;
        $video = Category::whereName('Videographers')->first()->id;
        $singing = Category::whereName('Singers')->first()->id;


        $this->insertSubcategory('Teather', $acting); 
        $this->insertSubcategory('Movies', $acting);
        $this->insertSubcategory('Photo Book', $photo);
        $this->insertSubcategory('Wedding', $photo);
        $this->insertSubcategory('Birthday', $photo); 
        $this->insertSubcategory('Graduation', $photo); 
        $this->insertSubcategory('Hip Hop', $dancing);
        $this->insertSubcategory('Dancehall', $dancing);
        $this->insertSubcategory('Salsa', $dancing);
        $this->insertSubcategory('Kizomba', $dancing);
        $this->insertSubcategory('Tango', $dancing);
        $this->insertSubcategory('Opera', $singing);
        $this->insertSubcategory('Hip Hop', $singing);
        $this->insertSubcategory('Hip Hop', $singing);
    }

    private function insertSubcategory($name, $category_id)
    {
        $subcategory = Subcategory::where('name', $name)->first();
        if($subcategory == null) {
            $subcategory = new Subcategory(); 
        }

        $subcategory->name = $name;
        $subcategory->category_id = $category_id;
        $subcategory->save();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'subcategories';

    /**
     * The profile that owns the subcategories
     *
     */
    public function profile()
    {
        return $this->belongsToMany(Profile::class, 'profile_subcategory', 'subcategory_id', 'profile_id')->withTimeStamps();
    }
}

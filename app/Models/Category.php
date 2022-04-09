<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    /**
     * The profile that owns the categories
     *
     */
    public function profile()
    {
        return $this->belongsToMany(Profile::class, 'profile_category', 'category_id', 'profile_id')->withTimeStamps();
    }
}

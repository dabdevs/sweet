<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    /**
     * The profile that owns the tags
     *
     */
    public function profile()
    {
        return $this->belongsToMany(Profile::class, 'profile_tag', 'tag_id', 'profile_id')->withTimeStamps();
    }
}

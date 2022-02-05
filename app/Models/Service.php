<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    /**
     * The profile that owns the services
     *
     */
    public function profile()
    {
        return $this->belongsToMany(Profile::class, 'profile_service', 'service_id', 'profile_id')->withTimeStamps();
    }
}

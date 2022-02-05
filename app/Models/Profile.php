<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    protected $fillable = ['gender', 'country_id', 'city_id', 'location_id', 'telephone', 'whatsapp', 'instagram', 'telegram'];

    /**
     * The services that belong to the profile
     *
     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'profile_service', 'profile_id', 'service_id')->withTimeStamps();
    }
}

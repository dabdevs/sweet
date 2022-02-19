<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    protected $fillable = ['country_id', 'city_id', 'location_id', 'telephone', 'whatsapp', 'instagram', 'telegram'];

    /**
     * The services that belong to the profile
     *
     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'profile_service', 'profile_id', 'service_id')->withTimeStamps();
    }

    /**
     * The country that belong to the Profile
     *
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * The city that belong to the Profile
     *
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * The location that belong to the Profile
     *
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}

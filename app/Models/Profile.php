<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    protected $fillable = ['country_id', 'city_id', 'location_id', 'telephone', 'whatsapp', 'instagram', 'telegram', 'file_id'];

    /**
     * The attributes that should be cast.
     *
     */
    protected $casts = [
    ];

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

    /**
     * Get the file associated with the Profile
     *
     */
    public function file()
    {
        return $this->belongsTo(File::class);
    }
}

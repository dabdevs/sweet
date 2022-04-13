<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    protected $fillable = ['firstname', 'lastname', 'nickname', 'gender', 'birthdate', 'country_id', 'city_id', 'location_id', 'telephone', 'whatsapp', 'instagram', 'telegram', 'file_id', 'fee', 'category_id', 'featured_video', 'instagram', 'facebook', 'headline'];

    /**
     * The attributes that should be cast.
     *
     */
    protected $casts = [
        'birthdate' => 'date:d/m/Y',
    ];

    /**
     * The categories that belong to the profile
     *
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The subcategory that belong to the profile
     *
     */
    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class, 'profile_subcategory', 'profile_id', 'subcategory_id')->withTimeStamps();
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

    /**
     * Get the user that owns the Profile
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

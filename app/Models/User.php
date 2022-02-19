<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birthdate',
        'gender'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthdate' => 'date:m/d/Y'
    ];

    /**
     * Get the profile associated with the User
     *
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Create a profile for the User
     *
     */
    public function createProfile()
    {
        $profile = Profile::where('user_id', $this->id)->first(); 
        try {
            if($profile == null) {
                $profile = new Profile();
                $profile->user_id = $this->id;
                $profile->save();
                request()->session()->flash('success', 'Tu perfil fue creado correctamente!');
            }
        } catch (\Throwable $th) {
            throw $th;
        }  
    }
}

<?php

namespace App\Models;

use App\DataTransferObjects\Geolocation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'user_type',
        'email',
        'password',
        'image',
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
    ];

     /**
     * Get he contact that belong to the user.
     */
    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    /**
     * Get all the posts that belong to the user.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * get the roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Get the user's image.
     */
    public function photo()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * The all the Geolocations that belong to the user.
     */
    public function userGeolocation ()
    {
        return $this->hasMany(UserGeolocation::class);
    }
}

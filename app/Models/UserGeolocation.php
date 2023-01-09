<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGeolocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'ip_address',
        'city',
       
    ];
}

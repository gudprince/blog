<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'phone_number',
        'country',
        'city',
        'address',
    ];


     /**
     * The user that belong to the contact.
     */
    public function user()
    {
        return $this->hasOne(Contact::class);
    }


}

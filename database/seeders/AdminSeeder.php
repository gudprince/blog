<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'first_name' => 'Sunday',
            'last_name' => 'Shola',
            'email' => 'super_admin@gmail.com',
            'phone_number' => '0982663738',
            'address' => 'Lagos',
            'image' => '',
            'user_type' => 'super_admin',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'), // password
            'remember_token' => Str::random(10),
        ];

        User::create($data);
    }
}

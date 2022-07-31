<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminUser= User::create([
            'first_name' => "Admin",
            'last_name' => "Admin",
            'email' => "hafiz@hafiz.com",
            'password' => "11111111",
            'total_amount' => "50000",
            'active'=>true
        ]);

        $superAdminUser2= User::create([
            'first_name' => "Admin",
            'last_name' => "Admin",
            'email' => "admin.akash.manna.developer@admin.com",
            'password' => "11111111",
            'total_amount' => "50000",
            'active'=>true
        ]);
        $superAdminUser->assignRole('SUPER-ADMIN');
        $superAdminUser2->assignRole('SUPER-ADMIN');
        User::factory(50)->create()->each(function ($user) {
            $user->assignRole('CLIENT');
        });
    }
}

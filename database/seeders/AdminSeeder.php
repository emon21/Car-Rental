<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@mail.com';
        $admin->password = Hash::make('12345678');
        // $admin->password = make::hash('12345678');
        // $admin->password = bcrypt('password');
        //  'password' => Hash::make(env('ADMIN_PASSWORD')),
        $admin->role = 'admin';
        $admin->save();
        
        User::create([
            'name' => 'User',
            'email' => 'user@mail.com',
            'password' => Hash::make('12345678'),
            'role' => 'customer'
        ]);
    }
}

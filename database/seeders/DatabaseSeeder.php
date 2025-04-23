<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Blood_Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Core\Blood;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // admin account
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'phone'=>'09425371538',
            'address'=>'Yangon',
            'role'=>'admin',
            'password'=>Hash::make('admin123')
        ]);

        // blood types
        Blood_Group::create([
            'blood_type'=>'A+'
        ]);
        Blood_Group::create([
            'blood_type'=>'A-'
        ]);
        Blood_Group::create([
            'blood_type'=>'B+'
        ]);
        Blood_Group::create([
            'blood_type'=>'B-'
        ]);
        Blood_Group::create([
            'blood_type'=>'AB+'
        ]);
        Blood_Group::create([
            'blood_type'=>'AB-'
        ]);
        Blood_Group::create([
            'blood_type'=>'O+'
        ]);
        Blood_Group::create([
            'blood_type'=>'O-'
        ]);
    }
}

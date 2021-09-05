<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::create([
             'name'=>'Superadmin',
             'phone'=>'0800000000',
             'email'=>'admin@admin.com',
             'password'=>Hash::make('password'),
             'is_admin' => true,
             ]);

        \App\Models\User::create([
            'name'=>'Jhon Doe',
            'phone'=>'08123123123',
            'email'=>'jhon@user.com',
            'password'=>Hash::make('password'),
            'is_admin' => false,
        ]);

         $this->call(SymptopSeeder::class);
         $this->call(DiseaseSeeder::class);
    }
}

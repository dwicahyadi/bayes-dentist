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
             'phone'=>'087779537772',
             'password'=>Hash::make('password'),
             'is_admin' => true,
             ]);

         $this->call(SymptopSeeder::class);
         $this->call(DiseaseSeeder::class);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nom' => 'Admin',
            'prenom' => 'System',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'date_naissance' => '1990-01-01',// Example date
            'ville' => 'Fes',
            'id_groupe' => null,
        ]);
    }
}
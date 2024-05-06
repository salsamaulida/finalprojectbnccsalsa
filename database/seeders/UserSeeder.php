<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'fullName' => 'Salsa Maulida',
            'email' => 'salsamaulida@gmail.com',
            'password' => Hash::make('salsa321'),
            'phoneNumber' => '088123456789',
            'isAdmin' => '1'
        ]);
        DB::table('users')->insert([
            'fullName' => 'Renjana Manohara',
            'email' => 'renjana@gmail.com',
            'password' => Hash::make('renjana321'),
            'phoneNumber' => '08213456789',
            'isAdmin' => '0'
        ]);
    }
}

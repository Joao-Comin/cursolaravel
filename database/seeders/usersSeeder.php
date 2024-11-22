<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstName' => 'Joao',
            'lastName' => 'Comin',
            'email' => 'joao@gmail.com',
            'password' => bcrypt('123')
        ]);
    }
}

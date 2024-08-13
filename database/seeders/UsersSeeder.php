<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  
     */
    public function run()
    {
        User::create([
            'firstName' => 'Dom',
            'lastName' => 'Coxitos',
            'email' => 'contato@domcoxitos.com',
            'password' => bcrypt('Mudar@432!'),
        ]);
    }
}

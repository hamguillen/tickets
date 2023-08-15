<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Homero',
            'email'=>'hamguillen@arteria.com.mx',
            'password'=>bcrypt('folkenhamg64'),
            'department_id'=>0,
            'client_id'=>0,
            'tipo'=>'ADMIN',
            'status'=>'ACTIVO'
        ])->assignRole('ADMIN');
    }
}

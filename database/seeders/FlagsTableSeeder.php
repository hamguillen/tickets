<?php

namespace Database\Seeders;
use App\Models\Flag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Flag::create([
            'descripcion' => 'Critical',
            'color'       => '#ff0000',
            'status'      => 'ACTIVO'
        ]);
        Flag::create([
            'descripcion' => 'Urgent',
            'color'       => '#00ff00',
            'status'      => 'ACTIVO'
        ]);
        Flag::create([
            'descripcion' => 'High',
            'color'       => '#0000ff',
            'status'      => 'ACTIVO'
        ]);
        Flag::create([
            'descripcion' => 'Medium',
            'color'       => '#ff7d03',
            'status'      => 'ACTIVO'
        ]);
        Flag::create([
            'descripcion' => 'Low',
            'color'       => '#f8fc03',
            'status'      => 'ACTIVO'
        ]);
    }
}

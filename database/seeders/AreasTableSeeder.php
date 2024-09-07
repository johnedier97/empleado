<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('areas')->insert([
            ['nombre' => 'Recursos Humanos'],
            ['nombre' => 'Desarrollo'],
            ['nombre' => 'Marketing'],
            ['nombre' => 'Ventas'],
            ['nombre' => 'Finanzas'],
        ]);
    }
}

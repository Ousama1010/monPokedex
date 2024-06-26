<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::factory()->create([
            'name' => 'Eau',
            'img_path' => 'images\Eau.png',
            'color' =>'#2980EF'
        ]);
        Type::factory()->create([
            'name' => 'Electrique',
            'img_path' => 'images\Electrique.png',
            'color' =>'#FAC000'
        ]);
        Type::factory()->create([
            'name' => 'Feu',
            'img_path' => 'images\Feu.png',
            'color' =>'#E62829'
        ]);
    }
}

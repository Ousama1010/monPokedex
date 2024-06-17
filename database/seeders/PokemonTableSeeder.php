<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PokemonTableSeeder extends Seeder
{
    public function run(): void
    {
        Pokemon::factory()->create([
            "name" => "Bulbizzare",
            "hp" => "95",
            "weight" => "120",
            "height" => "1.7",
            "img_path" => "images\bulbizzare.png",
            "primary_type_id" =>"1",
            "secondary_type_id" =>"2"
        ]);
        Pokemon::factory()->create([
            "name" => "Dracaufeu",
            "hp" => "120",
            "weight" => "160",
            "height" => "1.3",
            "img_path" => "images\Dracaufeu.png",
            "primary_type_id" =>"3"
        ]);
        Pokemon::factory()->create([
            "name" => "Miaouss",
            "hp" => "95",
            "weight" => "80",
            "height" => "1.0",
            "img_path" => "images\Miaouss.png",
            "primary_type_id" =>"1"
        ]);
        Pokemon::factory()->create([
            "name" => "Roucool",
            "hp" => "220",
            "weight" => "320",
            "height" => "3.0",
            "img_path" => "images\Roucool.png",
            "primary_type_id" =>"1",
            "secondary_type_id" =>"2"
        ]);
        Pokemon::factory()->create([
            "name" => "Pikachu",
            "hp" => "80",
            "weight" => "80",
            "height" => "0.7",
            "img_path" => "images\Pikachu.png",
            "primary_type_id" =>"3"
        ]);
    }
}

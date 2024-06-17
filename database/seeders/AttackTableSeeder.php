<?php

namespace Database\Seeders;

use App\Models\Attack;
use Illuminate\Database\Seeder;

class AttackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attack::factory()->create([
            'name' => "Éclair Fulgurant",
            'damage' => '15',
            'description' => "Un éclair puissant qui frappe l'adversaire avec une rapidité éblouissante, laissant peu de chance d'évasion.",
            'img_path' => 'images\eclaire.jpeg',
            'type_id' => '1'  // Supposons que 3 représente le type électrique
        ]);
        Attack::factory()->create([
            'name' => "Danse Flamme",
            'damage' => '12',
            'description' => "Un tourbillon de flammes enveloppe le champ de bataille, infligeant des dégâts continus à tous ceux qui s'y trouvent.",
            'img_path' => 'images\attaqueFeu.jpeg',
            'type_id' => '2'  // Supposons que 4 représente le type feu
        ]);
        Attack::factory()->create([
            'name' => "Tourbillon d'eau",
            'damage' => '18',
            'description' => "Une tornade d'eau puissante et dévastatrice",
            'img_path' => 'images\tornadeEau.jpeg',
            'type_id' => '3'
        ]);

    }
}

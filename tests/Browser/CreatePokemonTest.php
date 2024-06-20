<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Type;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreatePokemonTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        // Créer un utilisateur pour les tests
        User::factory()->create(['email' => 'test@example.com']);

        // Créer des types pour les tests
        Type::factory()->create([
            'name' => 'Eau1',
            'img_path' => 'images/Electrique.png',
            'color' => '#FAC000'
        ]);
        Type::factory()->create([
            'name' => 'Feu1',
            'img_path' => 'images/Feu.png',
            'color' => '#E62829'
        ]);
    }

    public function testAuthenticatedFeature()
    {
        $this->browse(function (Browser $browser) {
            $user = User::first();
            $browser->loginAs($user)
                    ->visit('/admin/pokemons/create')
                    ->assertSee('Ajouter un nouveau Pokémon');
        });
    }

    public function testUserCanCreatePokemon()
    {
        $type1 = Type::where('name', 'Feu1')->first();
        $type2 = Type::where('name', 'Eau1')->first();

        $this->browse(function (Browser $browser) use ($type1, $type2) {
            $browser->loginAs(User::first())
                    ->visit('/admin/pokemons/create')
                    ->type('name', 'ouss')
                    ->type('hp', '80')
                    ->type('weight', '6')
                    ->type('height', '0.4')
                    ->attach('img_path', storage_path('app/public/images/Pikachu.png'))
                    ->select('primary_type_id', $type1->id)
                    ->select('secondary_type_id', $type2->id)
                    ->press('Enregistrer')
                    ->assertPathIs('/admin/pokemons')
                    ->assertSee('ouss');
        });
    }
}

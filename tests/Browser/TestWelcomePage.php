<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class WelcomePageTest extends DuskTestCase
{
    /**
     * Teste si la page welcome affiche "Bienvenue".
     *
     * @return void
     */
    public function testWelcomePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/welcome.blade.php') // Assurez-vous que cette URL est correcte pour accéder à la page welcome
                    ->screenshot('before_assertSee') // Capture d'écran avant l'assertion
                    ->assertSee('Liste de pokemons') // Remplacez 'Bienvenue' par le texte que vous souhaitez vérifier sur la page welcome
                    ->screenshot('after_assertSee'); // Capture d'écran après l'assertion
        });
    }
}

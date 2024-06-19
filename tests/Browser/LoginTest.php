<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * Teste si un utilisateur peut se connecter et être redirigé vers le tableau de bord.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create([
                'email' => 'test@example.com',
                'password' => bcrypt('password'), // Assurez-vous que le mot de passe est correctement crypté
            ]);

            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('LOG IN')
                ->assertPathIs('/dashboard') // Vérifiez que l'utilisateur est redirigé vers le tableau de bord
                ->screenshot("You're logged in!"); // Capture d'écran après la connexion
        });
    }
}

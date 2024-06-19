<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <!-- Logo et lien vers le dashboard -->
            <div>
                <a href="{{ route('dashboard') }}" class="text-lg font-semibold text-gray-800 hover:text-gray-600">
                    monPokédex
                </a>
            </div>

            <!-- Liens de navigation principale -->
            <div class="space-x-8">
                <a href="{{ route('dashboard') }}" class="text-gray-800 hover:text-gray-600 {{ request()->routeIs('dashboard') ? 'border-b-2 border-blue-500' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('types.index') }}" class="text-gray-800 hover:text-gray-600 {{ request()->routeIs('types.index') ? 'border-b-2 border-blue-500' : '' }}">
                    Types
                </a>
                <a href="{{ route('attacks.index') }}" class="text-gray-800 hover:text-gray-600 {{ request()->routeIs('attacks.index') ? 'border-b-2 border-blue-500' : '' }}">
                    Attaques
                </a>
                <a href="{{ route('pokemons.index') }}" class="text-gray-800 hover:text-gray-600 {{ request()->routeIs('pokemons.index') ? 'border-b-2 border-blue-500' : '' }}">
                    Pokémons
                </a>
            </div>

            <!-- Bouton de déconnexion -->
            <div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-gray-800 hover:text-gray-600">
                    Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>

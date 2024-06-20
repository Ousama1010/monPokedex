<nav class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 shadow-md">
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <!-- Logo et lien vers le dashboard -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center text-lg font-semibold text-white hover:text-gray-300">
                    <x-css-pokemon class="h-8 w-auto mr-2 text-white"/>
                    monPokédex
                </a>
            </div>

            <!-- Liens de navigation principale -->
            <div class="space-x-8 hidden sm:flex">
                <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-300 {{ request()->routeIs('dashboard') ? 'border-b-2 border-blue-500' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('types.index') }}" class="text-white hover:text-gray-300 {{ request()->routeIs('types.index') ? 'border-b-2 border-blue-500' : '' }}">
                    Types
                </a>
                <a href="{{ route('attacks.index') }}" class="text-white hover:text-gray-300 {{ request()->routeIs('attacks.index') ? 'border-b-2 border-blue-500' : '' }}">
                    Attaques
                </a>
                <a href="{{ route('pokemons.index') }}" class="text-white hover:text-gray-300 {{ request()->routeIs('pokemons.index') ? 'border-b-2 border-blue-500' : '' }}">
                    Pokémons
                </a>
            </div>

            <!-- Bouton de déconnexion -->
            <div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-white hover:text-gray-300">
                    Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>

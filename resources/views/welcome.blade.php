<!-- resources/views/welcome.blade.php -->
<x-guest-layout>
    <div class="w-full px-4 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-8">
            <div class="text-center mt-10 text-4xl font-extrabold text-blue-600 mb-8" style="font-family: 'Roboto', sans-serif;">
                Liste des Pokémons
            </div>

            <form method="GET" action="{{ route('pokedex.index') }}" class="mb-8 flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <input type="text" name="search" placeholder="Rechercher un Pokémon" class="bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full sm:w-auto" value="{{ request('search') }}">
                <select name="primary_type" class="bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full sm:w-auto">
                    <option value="">Type Primaire</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ request('primary_type') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
                <select name="secondary_type" class="bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full sm:w-auto">
                    <option value="">Type Secondaire</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ request('secondary_type') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2 hover:bg-blue-600 transition w-full sm:w-auto">Rechercher</button>
            </form>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($pokemons as $pokemon)
                    <a href="{{ route('pokedex.show', $pokemon->id) }}" class="block bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition">
                        <div class="flex justify-center mb-4">
                            <img src="{{ Storage::url($pokemon->img_path) }}" alt="Image de {{ $pokemon->name }}" class="h-32 w-32 object-cover rounded-full border-2 border-blue-600">
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-semibold text-gray-700">{{ $pokemon->name }}</h3>
                            <p class="text-gray-500">N° {{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</p>
                            <div class="mt-2 flex justify-center space-x-2">
                                <span class="text-white text-xs font-semibold px-2.5 py-0.5 rounded-full" style="background-color: {{ $pokemon->primaryType->color }};">{{ $pokemon->primaryType->name }}</span>
                                @if ($pokemon->secondaryType)
                                    <span class="text-white text-xs font-semibold px-2.5 py-0.5 rounded-full" style="background-color: {{ $pokemon->secondaryType->color }};">{{ $pokemon->secondaryType->name }}</span>
                                @endif
                            </div>
                            <div class="mt-2 text-left">
                                <p class="text-sm text-gray-600"><strong>Point de vie:</strong> {{ $pokemon->hp }}</p>
                                <p class="text-sm text-gray-600"><strong>Poids:</strong> {{ $pokemon->weight }} kg</p>
                                <p class="text-sm text-gray-600"><strong>Taille:</strong> {{ $pokemon->height }} m</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $pokemons->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</x-guest-layout>

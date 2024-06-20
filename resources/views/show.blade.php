<x-guest-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-8">
            <div class="flex justify-between mb-4">
                <div class="text-3xl font-extrabold text-gray-700">
                    {{ $pokemon->name }}
                </div>
                <div>
                    <a href="{{ route('pokedex.index') }}" class="text-blue-600 hover:underline">Retour à la liste</a>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row items-center lg:items-start lg:space-x-8">
                <img src="{{ asset('storage/' . $pokemon->img_path) }}" alt="Image de {{ $pokemon->name }}" class="h-80 w-80 object-cover rounded-full mb-4 lg:mb-0 border-4 border-blue-600">
                <div class="flex-1">
                    <h3 class="text-xl font-bold text-gray-600">N° {{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</h3>
                    <div class="mt-2 flex justify-center lg:justify-start space-x-2">
                        <span class="text-white text-xs font-semibold px-2.5 py-0.5 rounded-full" style="background-color: {{ $pokemon->primaryType->color }};">{{ $pokemon->primaryType->name }}</span>
                        @if ($pokemon->secondaryType)
                            <span class="text-white text-xs font-semibold px-2.5 py-0.5 rounded-full" style="background-color: {{ $pokemon->secondaryType->color }};">{{ $pokemon->secondaryType->name }}</span>
                        @endif
                    </div>
                    <div class="mt-4 text-left">
                        <p class="text-sm text-gray-700"><strong>Point de vie:</strong> {{ $pokemon->hp }}</p>
                        <p class="text-sm text-gray-700"><strong>Poids:</strong> {{ $pokemon->weight }} kg</p>
                        <p class="text-sm text-gray-700"><strong>Taille:</strong> {{ $pokemon->height }} m</p>
                    </div>
                    <div class="mt-8">
                        <h4 class="text-lg font-bold text-gray-700">Attaques disponibles:</h4>
                        <ul class="list-none p-0 mt-2">
                            @foreach ($pokemon->primaryType->attacks as $attack)
                                <li class="flex text-gray-700 bg-gray-100 px-4 py-2 rounded-lg mb-2 items-center shadow" title="{{ $attack->description }}">
                                    <img src="{{ asset('storage/' . $attack->img_path) }}" alt="Image de {{ $attack->name }}" class="h-12 w-12 mr-4 rounded-full border-2 border-blue-600">
                                    <div>
                                        <p class="font-semibold">{{ $attack->name }} <span class="text-xs text-gray-500">({{ $attack->type->name }})</span></p>
                                        <p class="text-sm">Dégâts: {{ $attack->damage }}</p>
                                    </div>
                                </li>
                            @endforeach
                            @if ($pokemon->secondaryType)
                                @foreach ($pokemon->secondaryType->attacks as $attack)
                                    <li class="flex text-gray-700 bg-gray-100 px-4 py-2 rounded-lg mb-2 items-center shadow" title="{{ $attack->description }}">
                                        <img src="{{ asset('storage/' . $attack->img_path) }}" alt="Image de {{ $attack->name }}" class="h-12 w-12 mr-4 rounded-full border-2 border-blue-600">
                                        <div>
                                            <p class="font-semibold">{{ $attack->name }} <span class="text-xs text-gray-500">({{ $attack->type->name }})</span></p>
                                            <p class="text-sm">Dégâts: {{ $attack->damage }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

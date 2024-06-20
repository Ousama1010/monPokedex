<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 p-6 rounded-lg">
            {{ __('Modifier le Pokémon : ') . $pokemon->name }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg">
                <div class="p-6 bg-gray-50 border-b border-gray-200 rounded-t-lg">
                    <div class="text-2xl font-semibold text-gray-700 mb-4">
                        Modifier les informations du Pokémon
                    </div>
                </div>
                <div class="p-6">
                    <form method="POST" action="{{ route('pokemons.update', $pokemon->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block font-medium text-sm text-gray-700">Nom</label>
                                <input id="name" type="text" name="name" value="{{ old('name', $pokemon->name) }}" required autofocus class="mt-1 block w-full rounded-md shadow-sm border-gray-300" />
                                @error('name')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="hp" class="block font-medium text-sm text-gray-700">Points de vie</label>
                                <input id="hp" type="number" name="hp" value="{{ old('hp', $pokemon->hp) }}" required class="mt-1 block w-full rounded-md shadow-sm border-gray-300" />
                                @error('hp')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="weight" class="block font-medium text-sm text-gray-700">Poids (kg)</label>
                                <input id="weight" type="number" name="weight" step="0.01" value="{{ old('weight', $pokemon->weight) }}" required class="mt-1 block w-full rounded-md shadow-sm border-gray-300" />
                                @error('weight')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="height" class="block font-medium text-sm text-gray-700">Taille (m)</label>
                                <input id="height" type="number" name="height" step="0.01" value="{{ old('height', $pokemon->height) }}" required class="mt-1 block w-full rounded-md shadow-sm border-gray-300" />
                                @error('height')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="img_path" class="block font-medium text-sm text-gray-700">Image</label>
                                @if ($pokemon->img_path)
                                    <img src="{{ asset('storage/' . $pokemon->img_path) }}" alt="Image de {{ $pokemon->name }}" class="h-24 w-24 rounded-full object-cover mt-2">
                                @endif
                                <input id="img_path" type="file" name="img_path" class="mt-4 block w-full rounded-md shadow-sm border-gray-300" />
                                @error('img_path')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="primary_type_id" class="block font-medium text-sm text-gray-700">Type primaire</label>
                                <select id="primary_type_id" name="primary_type_id" required class="mt-1 block w-full rounded-md shadow-sm border-gray-300">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}" {{ $pokemon->primary_type_id == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('primary_type_id')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="secondary_type_id" class="block font-medium text-sm text-gray-700">Type secondaire</label>
                                <select id="secondary_type_id" name="secondary_type_id" class="mt-1 block w-full rounded-md shadow-sm border-gray-300">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}" {{ $pokemon->secondary_type_id == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('secondary_type_id')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-400 to-blue-500 text-white font-bold rounded-lg hover:from-green-500 hover:to-blue-600 transition ease-in-out duration-150">
                                {{ __('Mettre à jour') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

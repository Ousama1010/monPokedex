<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Modifier le Pokémon : {{ $pokemon->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('pokemons.update', $pokemon->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block font-medium text-sm text-gray-700">Nom</label>
                                <input id="name" type="text" name="name" value="{{ old('name', $pokemon->name) }}" required autofocus class="mt-1 block w-full" />
                                @error('name')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="hp" class="block font-medium text-sm text-gray-700">Points de vie</label>
                                <input id="hp" type="number" name="hp" value="{{ old('hp', $pokemon->hp) }}" required class="mt-1 block w-full" />
                                @error('hp')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="weight" class="block font-medium text-sm text-gray-700">Poids (kg)</label>
                                <input id="weight" type="number" name="weight" step="0.01" value="{{ old('weight', $pokemon->weight) }}" required class="mt-1 block w-full" />
                                @error('weight')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="height" class="block font-medium text-sm text-gray-700">Taille (m)</label>
                                <input id="height" type="number" name="height" step="0.01" value="{{ old('height', $pokemon->height) }}" required class="mt-1 block w-full" />
                                @error('height')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="img_path" class="block font-medium text-sm text-gray-700">Image</label>
                                @if ($pokemon->img_path)
                                    <img src="{{ Storage::url($pokemon->img_path) }}" alt="Image de {{ $pokemon->name }}" class="h-24 w-24 rounded-full object-cover mt-2">
                                @endif
                                <input id="img_path" type="file" name="img_path" class="mt-4 block w-full" />
                                @error('img_path')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="primary_type_id" class="block font-medium text-sm text-gray-700">Type primaire</label>
                                <select id="primary_type_id" name="primary_type_id" required class="mt-1 block w-full">
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
                                <select id="secondary_type_id" name="secondary_type_id" class="mt-1 block w-full">
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
                            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

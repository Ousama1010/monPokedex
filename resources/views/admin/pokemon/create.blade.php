<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            {{ __('Ajouter un nouveau Pokémon') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <form method="POST" action="{{ route('pokemons.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block font-medium text-sm text-gray-700">Nom</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" required
                                    autofocus class="mt-1 block w-full" />
                            </div>

                            <div>
                                <label for="hp" class="block font-medium text-sm text-gray-700">Points de
                                    vie</label>
                                <input id="hp" type="number" name="hp" value="{{ old('hp') }}" required
                                    class="mt-1 block w-full" />
                            </div>

                            <div>
                                <label for="weight" class="block font-medium text-sm text-gray-700">Poids (kg)</label>
                                <input id="weight" type="number" name="weight" step="0.01"
                                    value="{{ old('weight') }}" required class="mt-1 block w-full" />
                            </div>

                            <div>
                                <label for="height" class="block font-medium text-sm text-gray-700">Taille (m)</label>
                                <input id="height" type="number" name="height" step="0.01"
                                    value="{{ old('height') }}" required class="mt-1 block w-full" />
                            </div>

                            <div>
                                <label for="img_path" class="block font-medium text-sm text-gray-700">Image du
                                    Pokémon</label>
                                <input id="img_path" type="file" name="img_path" class="mt-4 block w-full" />
                            </div>

                            <div>
                                <label for="primary_type_id" class="block font-medium text-sm text-gray-700">Type
                                    primaire</label>
                                <select id="primary_type_id" name="primary_type_id" required class="mt-1 block w-full">
                                    <option value="">Sélectionnez un type</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="secondary_type_id" class="block font-medium text-sm text-gray-700">Type
                                    secondaire</label>
                                <select id="secondary_type_id" name="secondary_type_id" class="mt-1 block w-full">
                                    <option value="">Sélectionnez un type</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" style="background-color: #4F46E5; color: white;"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Enregistrer') }}
                        </button>

                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>

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
                                <x-label for="name" :value="__('Nom')" />
                                <x-input id="name" type="text" name="name" :value="old('name')" required autofocus />
                                <x-input-error for="name" class="mt-2" />
                            </div>

                            <div>
                                <x-label for="hp" :value="__('Points de vie')" />
                                <x-input id="hp" type="number" name="hp" :value="old('hp')" required />
                                <x-input-error for="hp" class="mt-2" />
                            </div>

                            <div>
                                <x-label for="weight" :value="__('Poids (kg)')" />
                                <x-input id="weight" type="number" name="weight" step="0.01" :value="old('weight')" required />
                                <x-input-error for="weight" class="mt-2" />
                            </div>

                            <div>
                                <x-label for="height" :value="__('Taille (m)')" />
                                <x-input id="height" type="number" name="height" step="0.01" :value="old('height')" required />
                                <x-input-error for="height" class="mt-2" />
                            </div>

                            <div>
                                <x-label for="img_path" :value="__('Image du Pokémon')" />
                                <x-input id="img_path" type="file" name="img_path" />
                                <x-input-error for="img_path" class="mt-2" />
                            </div>

                            <div>
                                <x-label for="primary_type_id" :value="__('Type primaire')" />
                                <select id="primary_type_id" name="primary_type_id" required class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Sélectionnez un type</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="primary_type_id" class="mt-2" />
                            </div>

                            <div>
                                <x-label for="secondary_type_id" :value="__('Type secondaire')" />
                                <select id="secondary_type_id" name="secondary_type_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Sélectionnez un type</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="secondary_type_id" class="mt-2" />
                            </div>
                        </div>

                        <div class="mt-5 flex justify-end">
                            <x-button class="ml-3">
                                {{ __('Enregistrer') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

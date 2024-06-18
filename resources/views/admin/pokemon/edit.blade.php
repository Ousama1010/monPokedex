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
                                <x-label for="name" :value="__('Nom')" />
                                <x-input id="name" type="text" name="name" :value="old('name', $pokemon->name)" required autofocus />
                                <x-input-error for="name" class="mt-2" />
                            </div>

                            <div>
                                <x-label for="hp" :value="__('Points de vie')" />
                                <x-input id="hp" type="number" name="hp" :value="old('hp', $pokemon->hp)" required />
                                <x-input-error for="hp" class="mt-2" />
                            </div>

                            <div>
                                <x-label for="weight" :value="__('Poids (kg)')" />
                                <x-input id="weight" type="number" name="weight" step="0.01" :value="old('weight', $pokemon->weight)" required />
                                <x-input-error for="weight" class="mt-2" />
                            </div>

                            <div>
                                <x-label for="height" :value="__('Taille (m)')" />
                                <x-input id="height" type="number" name="height" step="0.01" :value="old('height', $okemon->height)" required />
                                <x-input-error for="height" class="mt-2" />
                            </div>

                            <div>
                                <x-label for="img_path" :value="__('Image')" />
                                @if ($pokemon->img_path)
                                    <img src="{{ Storage::url($pokemon->img_path) }}" alt="Image de {{ $pokemon->name }}" class="h-24 w-24 rounded-full object-cover mt-2">
                                @endif
                                <x-input id="img_path" type="file" name="img_path" class="mt-4" />
                                <x-input-error for="img_path" class="mt-2" />
                            </div>

                            <div>
                                <x-label for="primary_type_id" :value="__('Type primaire')" />
                                <select id="primary_type_id" name="primary_type_id" required class="mt-1 block w-full">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}" {{ $pokemon->primary_type_id == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error for="primary_type_id" class="mt-2" />
                            </div>

                            <div>
                                <x-label for="secondary_type_id" :value="__('Type secondaire')" />
                                <select id="secondary_type_id" name="secondary_type_id" class="mt-1 block w-full">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}" {{ $pokemon->secondary_type_id == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error for="secondary_type_id" class="mt-2" />
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <x-button class="ml-3">
                                {{ __('Mettre à jour') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </v>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier Attaque') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('attacks.update', $attack) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nom de l'attaque -->
                            <div>
                                <x-label for="name" :value="__('Nom')" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $attack->name)" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-1" />
                            </div>

                            <!-- Dommage -->
                            <div>
                                <x-label for="damage" :value="__('Dommage')" />
                                <x-input id="damage" class="block mt-1 w-full" type="number" name="damage" :value="old('damage', $attack->damage)" required />
                                <x-input-error :messages="$errors->get('damage')" class="mt-1" />
                            </div>

                            <!-- Description -->
                            <div class="md:col-span-2">
                                <x-label for="description" :value="__('Description')" />
                                <textarea id="description" class="block mt-1 w-full" name="description" required>{{ old('description', $attack->description) }}</textarea>
                                <x-input-error :messages="$rs->get('description')" class="mt-1" />
                            </div>

                            <!-- Image -->
                            <div>
                                <x-label for="img_path" :value="__('Image')" />
                                @if ($attack->img_path)
                                    <img src="{{ asset('storage/' . $attack->img_path) }}" alt="Image de l'attaque" class="h-32 w-32 object-cover rounded-lg mt-2 mb-4">
                                @endif
                                <x-input id="img_path" class="block mt-1 w-full" type="file" name="img_path" />
                                <x-input-error :messages="$errors->get('img_path')" class="mt-1" />
                            </div>

                            <!-- Type -->
                            <div>
                                <x-label for="type_id" :value="__('Type')" />
                                <select id="type_id" name="type_id" class="block mt-1 w-full">
                                    <option value="">Sélectionnez un type</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}" {{ (old('type_id', $attack->type_id) == $type->id) ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('type_id')" class="mt-1" />
                            </div>
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="flex justify-end mt-4">
                            <x-primary-button>
                                {{ __('Enregistrer les modifications') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

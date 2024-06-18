<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nouvelle Attaque') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('attacks.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Nom de l'attaque -->
                            <div>
                                <x-label for="name" :value="__('Nom de l\'attaque')" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-1" />
                            </div>

                            <!-- Dommages -->
                            <div>
                                <x-label for="damage" :value="__('Dommages')" />
                                <x-input id="damage" class="block mt-1 w-full" type="number" name="damage" :value="old('damage')" required />
                                <x-input-error :messages="$errors->get('damage')" class="mt-1" />
                            </div>

                            <!-- Description -->
                            <div class="md:col-span-2">
                                <x-label for="description" :value="__('Description')" />
                                <textarea id="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" name="description" required>{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-1" />
                            </div>

                            <!-- Image -->
                            <div>
                                <x-label for="img_path" :value="__('Image')" />
                                <x-input id="img_path" class="block mt-1 w-full" type="file" name="img_path" />
                                <x-input-error :messages="$errors->get('img_path')" class="mt-1" />
                            </div>

                            <!-- Type -->
                            <div>
                                <x-label for="type_id" :value="__('Type')" />
                                <select id="type_id" name="type_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">{{ __('Sélectionnez un type') }}</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('type_id')" class="mt-1" />
                            </div>
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="flex justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Enregistrer') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

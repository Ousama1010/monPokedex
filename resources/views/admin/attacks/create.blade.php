<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une nouvelle Attaque') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <form method="POST" action="{{ route('attacks.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nom de l'attaque -->
                            <div>
                                <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Nom') }}</label>
                                <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                @error('name')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Dommages -->
                            <div>
                                <label for="damage" class="block font-medium text-sm text-gray-700">{{ __('Dommages') }}</label>
                                <input id="damage" class="block mt-1 w-full" type="number" name="damage" :value="old('damage')" required />
                                @error('damage')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="md:col-span-2">
                                <label for="description" class="block font-medium text-sm text-gray-700">{{ __('Description') }}</label>
                                <textarea id="description" class="block mt-1 w-full" name="description" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div>
                                <label for="img_path" class="block font-medium text-sm text-gray-700">{{ __('Image (facultatif)') }}</label>
                                <input id="img_path" class="block mt-1 w-full" type="file" name="img_path" />
                                @error('img_path')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Type -->
                            <div>
                                <label for="type_id" class="block font-medium text-sm text-gray-700">{{ __('Type d\'attaque') }}</label>
                                <select id="type_id" name="type_id" class="block mt-1 w-full">
                                    <option value="">{{ __('Choisir un type') }}</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="flex justify-end mt-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Sauvegarder') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

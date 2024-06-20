<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 p-6 rounded-lg">
            {{ __('Modifier Attaque') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg">
                <div class="p-6 bg-gray-50 border-b border-gray-200 rounded-t-lg">
                    <form method="POST" action="{{ route('attacks.update', $attack) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nom de l'attaque -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Nom') }}</label>
                                <input id="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="text" name="name" value="{{ old('name', $attack->name) }}" required autofocus />
                                @error('name')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Dommage -->
                            <div>
                                <label for="damage" class="block text-sm font-medium text-gray-700">{{ __('Dommage') }}</label>
                                <input id="damage" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="number" name="damage" value="{{ old('damage', $attack->damage) }}" required />
                                @error('damage')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="md:col-span-2">
                                <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                                <textarea id="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" name="description" required>{{ old('description', $attack->description) }}</textarea>
                                @error('description')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div>
                                <label for="img_path" class="block text-sm font-medium text-gray-700">{{ __('Image') }}</label>
                                @if ($attack->img_path)
                                    <img src="{{ asset('storage/' . $attack->img_path) }}" alt="Image de l'attaque" class="h-32 w-32 object-cover rounded-lg mt-2 mb-4">
                                @endif
                                <input id="img_path" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="file" name="img_path" />
                                @error('img_path')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Type -->
                            <div>
                                <label for="type_id" class="block text-sm font-medium text-gray-700">{{ __('Type') }}</label>
                                <select id="type_id" name="type_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
                                    <option value="">{{ __('Sélectionnez un type') }}</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}" {{ (old('type_id', $attack->type_id) == $type->id) ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-400 to-blue-500 text-white font-bold rounded-lg hover:from-green-500 hover:to-blue-600 transition">
                                {{ __('Enregistrer les modifications') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

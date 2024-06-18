<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 p-6 rounded-lg">
            {{ __('Types') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-12">
        <div class="bg-white shadow-md rounded-lg p-8">
            <div class="flex justify-between items-center mb-6">
                <div class="text-3xl font-bold text-gray-700">
                    Modifier un type
                </div>
            </div>

            <form method="POST" action="{{ route('types.update', $type) }}" class="space-y-6" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="flex flex-col space-y-2">
                    <label for="name" class="text-sm font-semibold text-gray-600">{{ __('Nom') }}</label>
                    <input id="name" type="text" name="name" class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500" :value="old('name', $type)" autofocus />
                    <span class="text-red-500 text-sm mt-1">{{ $errors->first('name') }}</span>
                </div>

                <div class="flex flex-col space-y-2">
                    <label for="color" class="text-sm font-semibold text-gray-600">{{ __('Couleur') }}</label>
                    <input id="color" type="text" name="color" class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500" :value="old('color', $type)" />
                    <span class="text-red-500 text-sm mt-1">{{ $errors->first('color') }}</span>
                </div>

                <div class="flex flex-col space-y-2">
                    <label for="img_path" class="text-sm font-semibold text-gray-600">{{ __('Image') }}</label>
                    @if ($type->img_path)
                        <img src="{{ asset('storage/' . $type->img_path) }}" alt="Image du type" class="aspect-auto h-20 rounded shadow mt-2 mb-4 object-cover object-center">
                    @endif
                    <input id="img_path" type="file" name="img_path" class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500" />
                    <span class="text-red-500 text-sm mt-1">{{ $errors->first('img_path') }}</span>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-gradient-to-r from-green-400 to-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:from-green-500 hover:to-blue-600 transition">
                        {{ __('Modifier') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

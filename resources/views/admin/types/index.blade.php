<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 p-6 rounded-lg">
            {{ __('Types') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 shadow-md rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <div class="text-3xl font-bold text-gray-700">
                            Liste des types
                        </div>
                        <a href="{{ route('types.create') }}"
                            class="bg-gradient-to-r from-green-400 to-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:from-green-500 hover:to-blue-600 transition">
                            Ajouter un type
                        </a>
                    </div>

                    <div class="text-gray-600">
                        <table class="w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Nom</th>
                                    <th class="py-3 px-6 text-left">Couleur</th>
                                    <th class="py-3 px-6 text-left">Images</th>
                                    <th class="py-3 px-6 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @foreach ($types as $type)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">{{ $type->name }}</td>
                                        <td class="py-3 px-6 text-left">{{ $type->color }}</td>
                                        <td class="py-3 px-6 text-left">
                                            <img src="{{ Storage::url($type->img_path) }}" alt="illustration du type" class="h-10 w-10 rounded-full">
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex item-center space-x-2">
                                                <a href="{{ route('types.edit', $type->id) }}"
                                                    class="text-blue-500 hover:text-blue-700">
                                                    <x-heroicon-o-pencil class="w-5 h-5" />
                                                </a>
                                                <button x-data="{ id: {{ $type->id }} }"
                                                    x-on:click.prevent="window.selected = id; $dispatch('open-modal', 'confirm-type-deletion');"
                                                    type="button" class="text-red-500 hover:text-red-700">
                                                    <x-heroicon-o-trash class="w-5 h-5" />
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $types->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-modal name="confirm-type-deletion" focusable>
            <form method="post" onsubmit="event.target.action= '/admin/types/' + window.selected" class="p-6">
                @csrf
                @method('DELETE')

                <h2 class="text-lg font-medium text-gray-900">
                    Êtes-vous sûr de vouloir supprimer ce type ?
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Cette action est irréversible. Toutes les données seront supprimées.
                </p>

                <div class="mt-6 flex justify-end">
                    <button type="button" class="bg-gray-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-gray-600 transition"
                        x-on:click="$dispatch('close')">
                        Annuler
                    </button>
                    <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-red-600 transition ml-3">
                        Supprimer
                    </button>
                </div>
            </form>
        </x-modal>
    </div>
</x-app-layout>

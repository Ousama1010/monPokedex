<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 p-6 rounded-lg">
            {{ __('Liste des Attaques') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg">
                <div class="p-6 bg-gray-50 border-b border-gray-200 rounded-t-lg">
                    <div class="flex justify-between items-center">
                        <div class="text-2xl font-semibold text-gray-700">
                            Attaques disponibles :
                        </div>
                        <a href="{{ route('attacks.create') }}"
                            class="bg-gradient-to-r from-green-400 to-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:from-green-500 hover:to-blue-600 transition">
                            Ajouter une attaque
                        </a>
                    </div>
                </div>
                <div class="p-6">
                    <table class="w-full table-auto">
                        <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <tr>
                                <th class="py-3 px-4 text-left">Nom</th>
                                <th class="py-3 px-4 text-left">Dommage</th>
                                <th class="py-3 px-4 text-left">Description</th>
                                <th class="py-3 px-4 text-left">Image</th>
                                <th class="py-3 px-4 text-left">Type</th>
                                <th class="py-3 px-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($attacks as $attack)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-4 text-left">{{ $attack->name }}</td>
                                <td class="py-3 px-4 text-left">{{ $attack->damage }}</td>
                                <td class="py-3 px-4 text-left">{{ $attack->description }}</td>
                                <td class="py-3 px-4 text-left">
                                    <img src="{{ asset('storage/' . $attack->img_path) }}" alt="illustration de l'attaque" class="h-20 w-20 object-cover rounded-lg">
                                </td>
                                <td class="py-3 px-4 text-left">{{ $attack->type->name }}</td>
                                <td class="py-3 px-4 text-left">
                                    <div class="flex item-center space-x-2">
                                        <a href="{{ route('attacks.edit', $attack->id) }}" class="text-blue-500 hover:text-blue-700">
                                            <x-heroicon-o-pencil class="w-5 h-5" />
                                        </a>
                                        <button x-data="{ id: {{ $attack->id }} }"
                                                x-on:click.prevent="window.selected = id; $dispatch('open-modal', 'confirm-attack-deletion');"
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
                        {{ $attacks->links() }}
                    </div>
                </div>
            </div>
        </div>

        <x-modal name="confirm-attack-deletion" focusable>
            <form method="post" onsubmit="event.target.action= '/admin/attacks/' + window.selected" class="p-6">
                @csrf
                @method('DELETE')

                <h2 class="text-lg font-medium text-gray-900">
                    Êtes-vous sûr de vouloir supprimer cette attaque ?
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Cette action est irréversible. Toutes les données seront supprimées.
                </p>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        Annuler
                    </x-secondary-button>

                    <x-danger-button class="ml-3" type="submit">
                        Supprimer
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    </div>
</x-app-layout>

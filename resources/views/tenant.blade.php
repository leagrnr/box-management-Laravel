<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Locataire</title>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-bold font-xl">
            {{ __('Locataire') }}
        </h2>
    </x-slot>

    <body>
    <div class="flex flex-col items-center">
        <h1 class="text-white font-bold font-xl mb-5">Liste des locataires</h1>

        <table class="text-white font-bold font-xl m-auto  border-collapse border border-sky-500 mb-5">
            <thead >
            <tr>
                <th class="border border-sky-500 px-2">Nom</th>
                <th class="border border-sky-500 px-2">Prénom</th>
                <th class="border border-sky-500 px-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tenants as $tenant)
                <tr>
                    <td class="border border-sky-500 px-2">{{ $tenant->last_name }}</td>
                    <td class="border border-sky-500 px-2">{{ $tenant->name }}</td>
                    <td class="border border-sky-500 px-2">
                        <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold px-4 my-1 w-full rounded">
                            <a href="{{ route('tenants.edit', $tenant->id) }}">Modifier</a>
                        </button>

                        <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" value="{{ $tenant->id }}" name="id">
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 my-1  w-full rounded ">Supprimer</button>
                        </form>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 my-1 w-full rounded">
                            <a href="{{ route('tenants.show', $tenant->id) }}">Voir plus</a>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 my-10 rounded dark:bg-blue-500 dark:hover:bg-blue-700">
            <a href="{{ route('tenants.create') }}">Ajouter un Locataire</a>
        </button>
    </div>
    </body>
</x-app-layout>
</html>

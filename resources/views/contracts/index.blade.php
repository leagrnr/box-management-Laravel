<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrat</title>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-bold font-xl">
            {{ __('Contract') }}
        </h2>
    </x-slot>

    <body>
    <div class="flex flex-col items-center">
        <h1 class="text-white font-bold font-xl mb-5">Liste des contrats</h1>

        <table class="text-white font-bold font-xl m-auto  border-collapse border border-sky-500 mb-5">
            <thead >
            <tr>
                <th class="border border-sky-500 px-2">Locataire</th>
                <th class="border border-sky-500 px-2">Box</th>
                <th class="border border-sky-500 px-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($contracts as $contract)
                <tr>
                    <td class="border border-sky-500 px-2">{{ $contract->tenant->name}}</td>
                    <td class="border border-sky-500 px-2">{{ $contract->box->name }}</td>
                    <td class="border border-sky-500 px-2">
                        <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold px-4 my-1 w-full rounded">
                            <a href="{{ route('contracts.edit', $contract->id) }}">Modifier</a>
                        </button>

                        <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" value="{{ $contract->id }}" name="id">
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 my-1  w-full rounded ">Supprimer</button>
                        </form>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 my-1 w-full rounded">
                            <a href="{{ route('contracts.show', $contract->id) }}">Voir plus</a>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 my-10 rounded dark:bg-blue-500 dark:hover:bg-blue-700">
            <a href="{{ route('contracts.create') }}">Ajouter un box</a>
        </button>
    </div>
    </body>
</x-app-layout>
</html>

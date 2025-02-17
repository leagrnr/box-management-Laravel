<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modèle de contrat</title>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-bold font-xl">
            {{ __('Modèle de contrat') }}
        </h2>
    </x-slot>

    <body>
    <div class="flex flex-col items-center">
        <h1 class="text-white font-bold font-xl mb-5">Liste des modèles de contrats</h1>

        <table class="text-white font-bold font-xl m-auto  border-collapse border border-sky-500 mb-5">
            <thead >
            <tr>
                <th class="border border-sky-500 px-2">Nom</th>
                <th class="border border-sky-500 px-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($contracts_model as $contract_model)
                <tr>
                    <td class="border border-sky-500 px-2">{{ $contract_model->name }}</td>
                    <td class="border border-sky-500 px-2">
                        <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold px-4 my-1 w-full rounded">
                            <a href="{{ route('contracts_model.edit', $contract_model->id) }}">Modifier</a>
                        </button>

                        <form action="{{ route('contracts_model.destroy', $contract_model->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" value="{{ $contract_model->id }}" name="id">
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 my-1  w-full rounded ">Supprimer</button>
                        </form>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 my-1 w-full rounded">
                            <a href="{{ route('contracts_model.show', $contract_model->id) }}">Voir plus</a>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 my-10 rounded dark:bg-blue-500 dark:hover:bg-blue-700">
            <a href="{{ route('contracts_model.create') }}">Ajouter un modèle de contrat</a>
        </button>


    </body>
</x-app-layout>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facture</title>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-bold font-xl">
            {{ __('Facture') }}
        </h2>
    </x-slot>

    <body>
    <div class="flex flex-col items-center">
        <h1 class="text-white font-bold font-xl mb-5">Liste des factures</h1>

        <table class="text-white font-bold font-xl m-auto  border-collapse border border-sky-500 mb-5">
            <thead >
            <tr>
                <th class="border border-sky-500 px-2">Locataire</th>
                <th class="border border-sky-500 px-2">Montant du paiement</th>
                <th class="border border-sky-500 px-2">Période du paiement</th>
                <th class="border border-sky-500 px-2">Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($bills as $bill)
                <tr>
                    <td class="border border-sky-500 px-2">{{ $bill->contract->tenant->name }}</td>
                    <td class="border border-sky-500 px-2">{{ $bill->payment_montant }} €</td>
                    <td class="border border-sky-500 px-2">{{ $bill->period_number }}</td>
                    <td class="border border-sky-500 px-2">
                        <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold px-4 my-1 w-full rounded">
                            <a href="{{ route('bills.edit', $bill->id) }}">Modifier</a>
                        </button>

                        <form action="{{ route('bills.destroy', $bill->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" value="{{ $bill->id }}" name="id">
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 my-1  w-full rounded ">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 my-10 rounded dark:bg-blue-500 dark:hover:bg-blue-700">
            <a href="{{ route('bills.create') }}">Ajouter une facture</a>
        </button>
    </div>
    </body>
</x-app-layout>
</html>

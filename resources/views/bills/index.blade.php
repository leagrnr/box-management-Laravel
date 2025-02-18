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
        <h1 class="text-white font-bold font-xl mb-5">Liste des contrats</h1>

        <table class="text-white font-bold text-lg m-auto border-collapse border border-sky-500 mb-5">
            <thead>
            <tr>
                <th class="border border-sky-500 px-2 py-1">ID</th>
                <th class="border border-sky-500 px-2 py-1">Box</th>
                <th class="border border-sky-500 px-2 py-1">Locataire</th>
                <th class="border border-sky-500 px-2 py-1">Date début</th>
                <th class="border border-sky-500 px-2 py-1">Date fin</th>
                <th class="border border-sky-500 px-2 py-1">Prix mensuel</th>
                <th class="border border-sky-500 px-2 py-1">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contracts as $contract)
                <tr>
                    <td class="border border-sky-500 px-2 py-1">{{ $contract->id }}</td>
                    <td class="border border-sky-500 px-2 py-1">{{ $contract->box->name }}</td>
                    <td class="border border-sky-500 px-2 py-1">{{ $contract->tenant->name }}</td>
                    <td class="border border-sky-500 px-2 py-1">{{ $contract->date_start }}</td>
                    <td class="border border-sky-500 px-2 py-1">{{ $contract->date_end }}</td>
                    <td class="border border-sky-500 px-2 py-1">{{ number_format($contract->monthly_price, 2) }} €</td>
                    <td class="border border-sky-500 px-2 py-1">
                        <form action="{{ route('bills.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="contract_id" value="{{ $contract->id }}">
                            <input type="hidden" name="payment_montant" value="{{ $contract->monthly_price }}">
                            <input type="hidden" name="period_number" value="1">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 my-1 w-full rounded">
                                Générer une facture
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </body>
</x-app-layout>
</html>

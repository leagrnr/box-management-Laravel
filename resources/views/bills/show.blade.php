<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Liste des factures</title>
</head>
<x-app-layout>
    <x-slot name="header">
        {{ __('Liste des factures') }}
    </x-slot>
    <body>
    <div class="flex flex-col items-center">
        <h1 class="text-white font-bold font-xl mb-5">Liste des factures</h1>

        <hr>

        <table class="table-auto w-full max-w-4xl">
            <thead>
            <tr>
                <th class="px-4 py-2">Montant du Paiement</th>
                <th class="px-4 py-2">Numéro de Période</th>
            <tbody>
            @foreach($bills as $bill)
                <tr>
                    <td class="border px-4 py-2">{{ $bill->payment_montant }}</td>
                    <td class="border px-4 py-2">{{ $bill->period_number }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </body>
</x-app-layout>
</html>

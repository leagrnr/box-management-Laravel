<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier une facture</title>
</head>
<x-app-layout>
    <x-slot name="header">
        {{ __('Modification de facture') }}
    </x-slot>
    <body>
    <div class="flex flex-col items-center">
        <h1 class="text-white font-bold font-xl mb-5">Modification de facture</h1>

        <hr>

        <form action="{{ route('bills.update', $bill->id) }}" method="POST" class="w-full max-w-sm">
            @csrf
            @Method('PUT')
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="contract_id">Contrat:</label>
                </div>
                <div class="md:w-2/3">
                    <select name="contract_id" id="contract_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" required>
                        @foreach($contracts as $contract)
                            <option value="{{ $contract->id }}" {{ $bill->contract_id == $contract->id ? 'selected' : '' }}>
                                (Locataire: {{ $contract->tenant->name }}, Box: {{ $contract->box->name }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

    <div class="md:flex md:items-center mb-6">
        <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="payment_montant">Montant du Paiement:</label>
        </div>
        <div class="md:w-2/3">
            <input type="number" name="payment_montant" id="payment_montant" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" value="{{ $bill->payment_montant }}" required>
        </div>
    </div>

    <div class="md:flex md:items-center mb-6">
        <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="period_number">Numéro de Période:</label>
        </div>
        <div class="md:w-2/3">
            <input type="number" name="period_number" id="period_number" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" value="{{ $bill->period_number }}" required>
        </div>
    </div>

    <div class="md:flex md:items-center">
        <div class="md:w-1/3"></div>
        <div class="md:w-2/3">
            <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                Enregistrer
            </button>
        </div>
    </div>
    </form>
    </div>
    </body>
</x-app-layout>
</html>

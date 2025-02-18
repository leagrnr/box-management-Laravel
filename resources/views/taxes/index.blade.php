<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des Impôts</title>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-bold font-xl">
            {{ __('Gestion des Impôts') }}
        </h2>
    </x-slot>

    <body>
    <div class="flex flex-col items-center">
        <h1 class="text-white font-bold font-xl mb-5">Impots</h1>

        <table class="text-white font-bold font-xl m-auto border-collapse border border-sky-500 mb-5">
            <thead>
            <tr>
                <th class="border border-sky-500 px-2">Montant Total</th>
                <th class="border border-sky-500 px-2">Montant Imposable</th>
                <th class="border border-sky-500 px-2">Case</th>
                <th class="border border-sky-500 px-2">Déclaration</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="border border-sky-500 px-2">{{ $taxData['montant_total'] }}€</td>
                <td class="border border-sky-500 px-2">{{ $taxData['montant_imposable'] }}€</td>
                <td class="border border-sky-500 px-2">{{ $taxData['case'] }}</td>
                <td class="border border-sky-500 px-2">{{ $taxData['declaration'] }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    </body>
</x-app-layout>
</html>

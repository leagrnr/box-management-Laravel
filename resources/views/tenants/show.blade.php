<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tenant Details</title>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-bold font-xl">
            {{ __('Tenant Details') }}
        </h2>
    </x-slot>
    <body>
    <div class="flex flex-col items-center">
        <h1 class="text-white font-bold font-xl mb-5">Détails du locataire</h1>

        <hr>

        <table class="text-white font-bold font-xl m-auto border-collapse border border-sky-500 mb-5">
            <tr>
                <th class="border border-sky-500 py-2">Nom</th>
                <td class="border border-sky-500 py-2">{{ $tenant->nom }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 py-2">Prénom</th>
                <td class="border border-sky-500 py-2">{{ $tenant->prenom }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 py-2">Email</th>
                <td class="border border-sky-500 py-2">{{ $tenant->email }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 py-2">Téléphone</th>
                <td class="border border-sky-500 py-2">{{ $tenant->telephone }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 py-2">Profession</th>
                <td class="border border-sky-500 py-2">{{ $tenant->profession }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 py-2">Adresse</th>
                <td class="border border-sky-500 py-2">{{ $tenant->adresse }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 py-2">Ville</th>
                <td class="border border-sky-500 py-2">{{ $tenant->ville }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 py-2">Pays</th>
                <td class="border border-sky-500 py-2">{{ $tenant->pays }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 py-2">Date de naissance</th>
                <td class="border border-sky-500 py-2">{{ $tenant->date_de_naissance }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 py-2">Lieu de naissance</th>
                <td class="border border-sky-500 py-2">{{ $tenant->lieu_de_naissance }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 py-2">Compte bancaire</th>
                <td class="border border-sky-500 py-2">{{ $tenant->compte_bancaire }}</td>
            </tr>
        </table>
    </div>
    </body>
</x-app-layout>
</html>

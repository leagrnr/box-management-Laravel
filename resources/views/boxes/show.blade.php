<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Box Details</title>
</head>
<x-app-layout>
<body>
    <x-slot name="header">
        <h2 class="text-white font-bold font-xl">
            {{ __('Box Details') }}
        </h2>
    </x-slot>

    <div class="flex flex-col items-center">
        <h1 class="text-white font-bold font-xl mb-5">Information box</h1>
        <table class="text-white font-bold font-xl m-auto border-collapse border border-sky-500 mb-5">
            <tr>
                <th class="border border-sky-500 px-2 text-blue-600">ID</th>
                <td class="border border-sky-500 px-2">{{ $box->id }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 px-2">Nom</th>
                <td class="border border-sky-500 px-2">{{ $box->nom }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 px-2">Adresse</th>
                <td class="border border-sky-500 px-2">{{ $box->adresse }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 px-2">Ville</th>
                <td class="border border-sky-500 px-2">{{ $box->ville }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 px-2">Pays</th>
                <td class="border border-sky-500 px-2">{{ $box->pays }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 px-2">Téléphone</th>
                <td class="border border-sky-500 px-2">{{ $box->telephone }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 px-2">Email</th>
                <td class="border border-sky-500 px-2">{{ $box->email }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 px-2">m²</th>
                <td class="border border-sky-500 px-2">{{ $box->m² }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 px-2">Prix par mois</th>
                <td class="border border-sky-500 px-2">{{ $box->prix_par_mois }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 px-2">Description</th>
                <td class="border border-sky-500 px-2">{{ $box->description }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 px-2">Disponible</th>
                <td class="border border-sky-500 px-2">{{ $box->disponible ? 'Oui' : 'Non' }}</td>
            </tr>
        </table>
    </div>
</body>
</x-app-layout>
</html>

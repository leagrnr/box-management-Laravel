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
            {{ __('Information modèle de contrat') }}
        </h2>
    </x-slot>

    <div class="flex flex-col items-center">
        <h1 class="text-white font-bold font-xl mb-5">Information modèle de contrat</h1>
        <table class="text-white font-bold font-xl m-auto border-collapse border border-sky-500 mb-5">
            <tr>
                <th class="border border-sky-500 px-2 text-blue-600">Nom :</th>
                <td class="border border-sky-500 px-2">{{ $contract_model->name }}</td>
            </tr>
            <tr>
                <th class="border border-sky-500 px-2">Contenu :</th>
                <td class="border border-sky-500 px-2">{!! $text !!}</td>
            </tr>
        </table>
    </div>
    </body>
</x-app-layout>
</html>

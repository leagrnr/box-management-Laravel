<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-bold font-xl">
            {{ __('Modifier Box') }}
        </h2>
    </x-slot>

<body>
<div class="flex flex-col items-center">
    <h1 class="text-white font-bold font-xl mb-5">Modifier un box</h1>

    <hr>

    <form action="{{ route('boxes.update', $box->id) }}" method="POST">
    @csrf
    @Method('PUT')
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name"> Nom : </label>
            </div>
            <div class="md:w-2/3">
                <input type="text" name="name" id="name" value="{{$box->name}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" >
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-address">Adresse : </label>
            </div>
            <div class="md:w-2/3">
                <input type="text" name="address" id="address" value="{{$box->address}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-city">Ville : </label>
            </div>
            <div class="md:w-2/3">
                <input type="text" name="city" id="city" value="{{$box->city}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-m²">m² : </label>
            </div>
            <div class="md:w-2/3">
                <input type="number" name="m²" id="m²" value="{{$box->m²}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-price_per_month">Prix par mois : </label>
            </div>
            <div class="md:w-2/3">
                <input type="number" name="price_per_month" id="price_per_month" value="{{$box->price_per_month}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-description">Description : </label>
            </div>
            <div class="md:w-2/3">
                <textarea name="description" id="description" rows="5" cols="5" value="{{$box->description}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">{{$box->description}}</textarea>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-available">Disponible : </label>
            </div>
            <div class="md:w-2/3 flex items-center">
                <input type="checkbox" name="available" id="available" class="form-checkbox h-5 w-5 text-blue-600" value="1" {{ $box->available ? 'checked' : '' }}>
            </div>
        </div>
        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    Modifier
                </button>
            </div>
        </div>
    </form>
</div>
</body>
</x-app-layout>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Contract</title>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-bold font-xl">
            {{ __('Modification de contract') }}
        </h2>
    </x-slot>
    <body>
    <div class="flex flex-col items-center">
        <h1 class="text-white font-bold font-xl mb-5">Modification de contract</h1>

        <hr>

        <form action="{{ route('contracts.update', $contract->id) }}" method="POST" class="w-full max-w-sm">
            @csrf
            @method('PUT')
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="box_id">Box:</label>
                </div>
                <div class="md:w-2/3">
                    <select name="box_id" id="box_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" required>
                        @foreach($boxes as $box)
                            <option value="{{ $box->id }}" {{ $contract->box_id == $box->id ? 'selected' : '' }}>{{ $box->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="tenant_id">Tenant:</label>
                </div>
                <div class="md:w-2/3">
                    <select name="tenant_id" id="tenant_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" required>
                        @foreach($tenants as $tenant)
                            <option value="{{ $tenant->id }}" {{ $contract->tenant_id == $tenant->id ? 'selected' : '' }}>{{ $tenant->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="date_start">Start Date:</label>
                </div>
                <div class="md:w-2/3">
                    <input type="date" name="date_start" id="date_start" value="{{ $contract->date_start }}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" required>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="date_end">End Date:</label>
                </div>
                <div class="md:w-2/3">
                    <input type="date" name="date_end" id="date_end" value="{{ $contract->date_end }}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" required>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="monthly_price">Monthly Price:</label>
                </div>
                <div class="md:w-2/3">
                    <input type="number" name="monthly_price" id="monthly_price" value="{{ $contract->monthly_price }}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" required>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="contract_model_id">Contract Model:</label>
                </div>
                <div class="md:w-2/3">
                    <select name="contract_model_id" id="contract_model_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" required>
                        @foreach($contract_models as $model)
                            <option value="{{ $model->id }}" {{ $contract->contract_model_id == $model->id ? 'selected' : '' }}>{{ $model->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Update Contract
                    </button>
                </div>
            </div>
        </form>
    </div>
    </body>
</x-app-layout>
</html>

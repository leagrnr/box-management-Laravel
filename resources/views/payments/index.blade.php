<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paiement</title>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-bold font-xl">
            {{ __('Paiement') }}
        </h2>
    </x-slot>

    <body>
    <div class="flex flex-col items-center">
        <table class="text-white font-bold text-lg m-auto border-collapse border border-sky-500 mb-5">
            <thead>
            <tr>
                <th class="border border-sky-500 px-2 py-1">Période</th>
                <th class="border border-sky-500 px-2 py-1">Montant</th>
                <th class="border border-sky-500 px-2 py-1">Payé ?</th>
                <th class="border border-sky-500 px-2 py-1">Date de paiement</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bills as $bill)
                <tr>
                    <td class="border border-sky-500 px-2 py-1">{{ $bill->period_number }}</td>
                    <td class="border border-sky-500 px-2 py-1">{{ $bill->payment_montant }}</td>
                    <td class="border border-sky-500 px-2 py-1">
                        <form action="{{ route('payments.update', $bill->id) }}" method="POST" onsubmit="updateCheckboxValue({{ $bill->id }})">
                            @csrf
                            @method('PUT')
                            <input type="checkbox" name="paid" id="paid-{{ $bill->id }}" {{ $bill->paid ? 'checked' : '' }} onchange="toggleDateInput({{ $bill->id }})" value="1">
                            <td class="border border-sky-500 px-2 py-1">
                                <input type="date" name="payment_date" id="payment-date-{{ $bill->id }}" value="{{ old('payment_date', $bill->payment_date ? $bill->payment_date->format('Y-m-d') : '') }}" {{ $bill->paid ? '' : 'disabled' }} class="form-control px-4 py-2 bg-gray-700 text-black rounded w-full">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded mt-2">Sauvegarder</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function toggleDateInput(billId) {
            const checkbox = document.getElementById(`paid-${billId}`);
            const dateInput = document.getElementById(`payment-date-${billId}`);
            dateInput.disabled = !checkbox.checked;
            if (checkbox.checked) {
                dateInput.focus();
            }
        }

        function updateCheckboxValue(billId) {
            const checkbox = document.getElementById(`paid-${billId}`);
            checkbox.value = checkbox.checked ? 1 : 0;
        }
    </script>
    </body>
</x-app-layout>
</html>

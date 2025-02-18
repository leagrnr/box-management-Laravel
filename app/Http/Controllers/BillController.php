<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Contract;
use App\Models\Box;
use App\Models\Tenant;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::all();
        $contracts = Contract::all();
        return view('bills.index', compact('bills', 'contracts'));
    }

    public function create()
    {
        $bill = new Bill();
        $contracts = Contract::all();
        $boxes = Box::all();
        $tenants = Tenant::all();
        return view('bills.create', compact('bill', 'contracts', 'boxes', 'tenants'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'contract_id' => 'required|integer',
            'payment_montant' => 'required|numeric',
            'period_number' => 'required|integer',
        ]);

        Bill::create($validatedData);
        return redirect()->route('bills.index');
    }

    public function edit($id)
    {
        $bill = Bill::findOrFail($id);
        $contracts = Contract::all();
        $boxes = Box::all();
        $tenants = Tenant::all();
        return view('bills.edit', compact('bill', 'contracts', 'boxes', 'tenants'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'contract_id' => 'integer',
            'payment_montant' => 'numeric',
            'period_number' => 'integer',
        ]);

        $bill = Bill::findOrFail($id);
        $bill->update($validatedData);
        return redirect()->route('bills.index');
    }

    public function destroy($id)
    {
        $bill = Bill::findOrFail($id);
        $bill->delete();
        return redirect()->route('bills.index');
    }
}

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
        $bills = Bill::with('contract')->get();
        $contracts = Contract::all();
        return view('bills.index', compact('bills', 'contracts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'contract_id' => 'required|integer',
            'payment_montant' => 'required|numeric',
            'period_number' => 'required|integer',
        ]);

        Bill::create([
            'contract_id' => $validatedData['contract_id'],
            'payment_montant' => $validatedData['payment_montant'],
            'period_number' => $validatedData['period_number'],
        ]);

        return redirect()->route('bills.index');
    }
}

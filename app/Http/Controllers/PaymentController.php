<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;

class PaymentController extends Controller
{
    public function index()
    {
        $bills = Bill::with('contract')->get();
        return view('payments.index', compact('bills'));
    }

    public function update(Request $request, $billId)
    {
        $validatedData = $request->validate([
            'payment_date' => 'nullable|date',
            'paid' => 'required|boolean',
        ]);

        $bill = Bill::findOrFail($billId);
        $bill->payment_date = $validatedData['payment_date'];
        $bill->save();

        return redirect()->route('payments.index')->with('success', 'The payment date has been updated.');
    }
}

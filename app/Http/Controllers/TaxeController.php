<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;

class TaxeController extends Controller
{
    public function index()
    {
        $totalRevenus = Bill::sum('payment_montant'); // Sum the payment_montant field without considering the paid status

        if ($totalRevenus <= 15000) {
            $taxData = $this->calculateMicroFoncier($totalRevenus);
        } else {
            $taxData = $this->calculateRegimeReel($totalRevenus);
        }

        return view('taxes.index', compact('taxData'));
    }

    private function calculateMicroFoncier($revenus)
    {
        $montantImposable = $revenus * 0.70;
        return [
            'montant_total' => $revenus,
            'montant_imposable' => $montantImposable,
            'case' => '4 BE',
            'declaration' => '2042'
        ];
    }

    private function calculateRegimeReel($revenus)
    {
        $montantImposable = $revenus;
        return [
            'montant_total' => $revenus,
            'montant_imposable' => $montantImposable,
            'case' => '4 BA',
            'declaration' => '2044'
        ];
    }
}

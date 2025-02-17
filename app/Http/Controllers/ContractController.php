<?php

// app/Http/Controllers/ContractController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\ContractModel;
use App\Models\Tenant;
use App\Models\Box;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = auth()->user()->contracts()->latest()->get();
        return view('contracts.index', compact('contracts'));
    }

    public function create()
    {
        $contract_models = ContractModel::where('user_id', auth()->id())->get();
        $tenants = Tenant::where('user_id', auth()->id())->get();
        $boxes = Box::where('user_id', auth()->id())->get();


        return view('contracts.create', compact('contract_models', 'tenants', 'boxes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'box_id' => 'required|integer',
            'tenant_id' => 'required|integer',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'monthly_price' => 'required|numeric',
            'contract_model_id' => 'required|integer',
        ]);

        $contract_model = ContractModel::findOrFail($validated['contract_model_id']);

        $contract_content = json_decode($contract_model->content, true);

        if (!isset($contract_content['blocks']) || !is_array($contract_content['blocks'])) {
            return back()->withErrors(['error' => 'Le modèle de contrat est invalide.']);
        }

        $texts = array_map(fn($block) => $block['data']['text'] ?? '', $contract_content['blocks']);
        $content = implode("\n\n", $texts);
        $box = Box::findOrFail($validated['box_id']);
        $tenant = Tenant::findOrFail($validated['tenant_id']);

        $variables = [
            'user_name' => auth()->user()->name,
            'box_name' => $box->name,
            'box_address' => $box->address,
            'tenant_name' => $tenant->name,
            'date_start' => \Carbon\Carbon::parse($validated['date_start'])->format('Y-m-d'),
            'date_end' => \Carbon\Carbon::parse($validated['date_end'])->format('Y-m-d'),
            'monthly_price' => number_format($validated['monthly_price'], 2)
        ];

        foreach ($variables as $key => $value) {
            $content = str_replace("{{ $key }}", $value, $content);
        }

        Contract::create([
            ...$validated,
            'user_id' => auth()->id(),
            'content' => $content
        ]);

        return redirect()->route('contracts.index')
            ->with('success', 'Contract created successfully.');
    }


    public function show($id)
    {
        $contract = Contract::where('user_id', auth()->id())->findOrFail($id);
        $contract_models = ContractModel::where('user_id', auth()->id())->get();
        return view('contracts.show', compact('contract', 'contract_models'));
    }

    public function edit($id)
    {
        $contract = Contract::where('user_id', auth()->id())->findOrFail($id);
        $boxes = Box::where('user_id', auth()->id())->get();
        $tenants = Tenant::where('user_id', auth()->id())->get();
        $contract_models = ContractModel::where('user_id', auth()->id())->get();
        return view('contracts.edit', compact('contract', 'boxes', 'tenants', 'contract_models'));
    }

    public function update(Request $request, $id)
    {
        $contract = Contract::where('user_id', auth()->id())->findOrFail($id);
        $validated = $request->validate([
            'box_id' => 'required|integer',
            'tenant_id' => 'required|integer',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'monthly_price' => 'required|numeric',
        ]);

        $contract->update($validated);

        return redirect()->route('contracts.index')
            ->with('success', 'Contract updated successfully.');
    }

    public function destroy($id)
    {
        $contract = Contract::where('user_id', auth()->id())->findOrFail($id);
        $contract->delete();

        return redirect()->route('contracts.index')
            ->with('success', 'Contract deleted successfully.');
    }
}

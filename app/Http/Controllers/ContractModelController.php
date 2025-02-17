<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContractModel;
use Illuminate\Support\Facades\Auth;

class ContractModelController extends Controller
{

    public function index()
    {
        $contracts_model = auth()->user()->contractsModel()->latest()->get();
        return view('contracts_model', compact('contracts_model'));
    }

    public function create()
    {
        $contract_model = new ContractModel();
        return view('contracts_model.create', compact('contract_model'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|json',
        ]);

        ContractModel::create([
            ...$validated,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('contracts_model.index')
            ->with('success', 'Contract created successfully.');
    }

    public function show($id)
    {
        $contract_model = ContractModel::where('user_id', Auth::id())->findOrFail($id);
        $content = json_decode($contract_model->content, true);
        $text = '';

        if (isset($content['blocks']) && is_array($content['blocks'])) {
            foreach ($content['blocks'] as $block) {
                if (isset($block['data']['text'])) {
                    $text .= $block['data']['text'] . "\n";
                }
            }
        }

        $text = nl2br(e($text));

        return view('contracts_model.show', compact('contract_model', 'text'));
    }

    public function edit($id)
    {
        $contract_model = ContractModel::where('user_id', Auth::id())->findOrFail($id);
        $content = json_decode($contract_model->content, true);
        $text = '';

        if (isset($content['blocks']) && is_array($content['blocks'])) {
            foreach ($content['blocks'] as $block) {
                if (isset($block['data']['text'])) {
                    $text .= $block['data']['text'] . "\n";
                }
            }
        }

        return view('contracts_model.edit', compact('contract_model', 'text'));
    }

    public function update(Request $request, $id)
    {
        $contract_model = ContractModel::where('user_id', Auth::id())->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|json',
        ]);

        $contract_model ->update($validated);

        return redirect()->route('contracts_model.index')
            ->with('success', 'Contract updated successfully.');
    }

    public function destroy($id)
    {
        $contract_model  = ContractModel::where('user_id', Auth::id())->findOrFail($id);
        $contract_model ->delete();

        return redirect()->route('contracts_model.index')
            ->with('success', 'Contract deleted successfully.');
    }

}

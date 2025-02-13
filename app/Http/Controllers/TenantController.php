<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::latest()->get();
        return view('tenant', compact('tenants'));
    }

    public function create()
    {
        $tenant = new Tenant();
        return view('tenants.create', compact('tenant'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required|string',
            'profession' => 'required|string',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'pays' => 'required|string',
            'date_de_naissance' => 'required|string',
            'lieu_de_naissance' => 'required|string',
            'compte_bancaire' => 'required|string',
        ]);

        Tenant::create($validated);

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant ajouté avec succès');
    }

    public function show($id)
    {
        $tenant = Tenant::findOrFail($id);
        return view('tenants.show', compact('tenant'));
    }

    public function edit($id)
    {
        $tenant = Tenant::findOrFail($id);
        return view('tenants.edit', compact('tenant'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required|string',
            'profession' => 'required|string',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'pays' => 'required|string',
            'date_de_naissance' => 'required|string',
            'lieu_de_naissance' => 'required|string',
            'compte_bancaire' => 'required|string',
        ]);

        $tenant = Tenant::findOrFail($id);
        $tenant->update($validated);

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant modifié avec succès');
    }

    public function destroy($id)
    {
        $tenant = Tenant::findOrFail($id);
        $tenant->delete();

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant supprimé avec succès');
    }
}

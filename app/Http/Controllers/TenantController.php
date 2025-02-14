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
            'last_name' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'profession' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'date_of_birth' => 'required|string',
            'place_of_birth' => 'required|string',
            'bank_account' => 'required|string',
        ]);

        Tenant::create($validated);

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant created success');
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
            'last_name' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'profession' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'date_of_birth' => 'required|string',
            'place_of_birth' => 'required|string',
            'bank_account' => 'required|string',
        ]);

        $tenant = Tenant::findOrFail($id);
        $tenant->update($validated);

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant modify with success');
    }

    public function destroy($id)
    {
        $tenant = Tenant::findOrFail($id);
        $tenant->delete();

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant deleted with success');
    }
}

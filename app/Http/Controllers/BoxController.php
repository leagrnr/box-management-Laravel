<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Box;
use Illuminate\Support\Facades\Auth;

class BoxController extends Controller
{
    public function index()
    {
        $boxes = auth()->user()->boxes()->latest()->get();
        return view('box', compact('boxes'));
    }

    public function create()
    {
        $box = new Box();
        return view('boxes.create', compact('box'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'pays' => 'required|string',
            'telephone' => 'required|string',
            'email' => 'required|email',
            'm²' => 'required|string',
            'prix_par_mois' => 'required|string',
            'description' => 'required|string',
            'disponible' => 'boolean'
        ]);

        Box::create([
            ...$validated,
            'user_id' => auth()->id(),
            'disponible' => $request->has('disponible')
        ]);

        return redirect()->route('boxes.index')
            ->with('success', 'Box ajouté avec succès');
    }

    public function show($id)
    {
        $box = Box::where('user_id', Auth::id())->findOrFail($id);
        return view('boxes.show', compact('box'));
    }

    public function edit($id)
    {
        $box = Box::where('user_id', Auth::id())->findOrFail($id);
        return view('boxes.edit', compact('box'));
    }

    public function update(Request $request, $id)
    {
        $box = Box::where('user_id', Auth::id())->findOrFail($id);
        $validated = $request->validate([
            'nom' => 'required|string',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'pays' => 'required|string',
            'telephone' => 'required|string',
            'email' => 'required|email',
            'm²' => 'required|string',
            'prix_par_mois' => 'required|string',
            'description' => 'required|string',
            'disponible' => 'boolean'
        ]);

        $box->update([
            ...$validated,
            'disponible' => $request->has('disponible')
        ]);

        return redirect()->route('boxes.index');
    }

    public function destroy($id)
    {
        $box = Box::where('user_id', Auth::id())->findOrFail($id);
        $box->delete();

        return redirect()->route('boxes.index');
    }
}

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
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'm²' => 'required|numeric',
            'price_per_month' => 'required|numeric',
            'description' => 'required|string',
            'available' => 'boolean'
        ]);

        Box::create([
            ...$validated,
            'user_id' => auth()->id(),
            'available' => $request->has('available')
        ]);

        return redirect()->route('boxes.index')
            ->with('success', 'Box created successfully.');
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
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'm²' => 'required|numeric',
            'price_per_month' => 'required|numeric',
            'description' => 'required|string',
            'available' => 'boolean'
        ]);

        $box->update([
            ...$validated,
            'available' => $request->has('available')
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('Sales.Data.suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('Sales.Data.suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:suppliers',
            'name' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'bank' => 'required|string',
            'bank_number' => 'required|string',
        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
    }

    public function edit(Supplier $supplier)
    {
        return view('Sales.Data.suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'bank' => 'required|string|max:255',
            'bank_number' => 'required|string|max:255',
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
    }
}

<?php

// app/Http/Controllers/ItemController.php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Supplier;
use App\Models\DeletedId;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('supplier')->get(); // Eager load supplier relationship
        return view('Admin.Data.items.index', compact('items'));
    }


    public function create()
    {
        $suppliers = Supplier::all();
        return view('Admin.Data.items.create', compact('suppliers'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'item_qty' => 'required|integer',
    //         'supp_id' => 'required|exists:suppliers,id',
    //         'buy_price' => 'required|numeric|between:0,999999999.99',
    //         'sale_price' => 'required|numeric|between:0,999999999.99',
    //     ]);
    //     // Generate custom ID with prefix "ITM" and padded number
    //     $lastItem = Item::latest('id')->first();
    //     $nextId = $lastItem ? sprintf('ITM%04d', intval(substr($lastItem->id, 3)) + 1) : 'ITM0001';
    //     Item::create(array_merge($request->all(), ['id' => $nextId]));
    //     return redirect()->route('items.index')->with('success', 'Item created successfully.');
    // }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'item_qty' => 'required|integer',
            'supp_id' => 'required|exists:suppliers,id',
            'buy_price' => 'required|numeric|between:0,999999999.99',
            'sale_price' => 'required|numeric|between:0,999999999.99',
        ]);

        // Find the lowest available ID or generate a new one
        $availableId = DeletedId::orderBy('id')->first();
        if ($availableId) {
            $nextId = $availableId->id;
            // Remove the ID from the deleted IDs table
            $availableId->delete();
        } else {
            // Generate a new ID
            $lastItem = Item::latest('id')->first();
            $nextId = $lastItem ? sprintf('ITM%04d', intval(substr($lastItem->id, 3)) + 1) : 'ITM0001';
        }

        Item::create(array_merge($request->all(), ['id' => $nextId]));

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }


    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $suppliers = Supplier::all();
        return view('Admin.Data.items.edit', compact('item', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'item_qty' => 'required|integer',
            'supp_id' => 'required|exists:suppliers,id',
            'buy_price' => 'required|numeric|between:0,999999999.99',
            'sale_price' => 'required|numeric|between:0,999999999.99',
        ]);

        $item = Item::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        // Add the ID to the deleted IDs table
        DeletedId::create(['id' => $id]);

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}

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
        $items = Item::with('supplier')->paginate(10); // Eager load supplier relationship
        return view('Admin.Data.items.index', compact('items'));
    }


    public function create()
    {
        $suppliers = Supplier::all();
        return view('Admin.Data.items.create', compact('suppliers'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'item_qty' => 'required|integer',
            'supp_id' => 'required|exists:suppliers,id',
            'buy_price' => 'required|numeric|between:0,999999999.99',
            'sale_price' => 'required|numeric|between:0,999999999.99',
            'item_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1048',
        ]);

        $input = $request->all();
        if ($request->hasFile('item_photo')) {
            $imageName = time() . '.' . $request->item_photo->extension();
            $request->item_photo->move(public_path('assets/img/item'), $imageName);
            $input['item_photo'] = 'assets/img/item/' . $imageName;
        }

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
        Item::create(array_merge($request->all(), ['id' => $nextId, 'item_photo' => $input['item_photo'] ?? null]));

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
            'item_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $item = Item::findOrFail($id);
        $input = $request->all();

        if ($request->hasFile('item_photo')) {
            // Delete the old photo if it exists
            if ($item->item_photo && file_exists(public_path($item->item_photo))) {
                unlink(public_path($item->item_photo));
            }
            // Save the new photo
            $imageName = time() . '.' . $request->item_photo->extension();
            $request->item_photo->move(public_path('assets/img/item'), $imageName);
            $input['item_photo'] = 'assets/img/item/' . $imageName;
        } else {
            // If no new photo is uploaded, keep the old photo
            $input['item_photo'] = $item->item_photo;
        }

        $item->update($input);

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }


    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        if ($item->item_photo && file_exists(public_path($item->item_photo))) {
            unlink(public_path($item->item_photo));
        }
        $item->delete();
        // Add the ID to the deleted IDs table
        DeletedId::create(['id' => $id]);

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }

    public function getItemQuantity($id)
{
        $item = Item::find($id);
        if ($item) {
            return response()->json(['item_qty' => $item->item_qty]);
        }
        return response()->json(['item_qty' => 0], 404);
    }
}

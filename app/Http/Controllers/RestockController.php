<?php

namespace App\Http\Controllers;

use App\Models\Restock;
use App\Models\Supplier;
use App\Models\Item;
use Illuminate\Http\Request;

class RestockController extends Controller
{
    public function index()
    {
        $restocks = Restock::all();
        return view('Admin.Restocks.index', compact('restocks'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $items = Item::all();
        return view('Admin.Restocks.create', compact('suppliers', 'items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supp_id' => 'required|exists:suppliers,id',
            'item_id' => 'required|exists:items,id',
            'buy_qty' => 'required|integer|min:1',
        ]);

        $item = Item::find($request->item_id);
        $buyPrice = $item->buy_price;
        $buyTotal = $buyPrice * $request->buy_qty;

        Restock::create([
            'id' => $this->generateCustomId(),
            'supp_id' => $request->supp_id,
            'supp_name' => Supplier::find($request->supp_id)->name,
            'item_id' => $request->item_id,
            'name_item' => $item->name,
            'buy_price' => $buyPrice,
            'buy_qty' => $request->buy_qty,
            'buy_total' => $buyTotal,
        ]);

        // Update the item quantity
        $item->item_qty += $request->buy_qty;
        $item->save();

        return redirect()->route('restocks.index')->with('success', 'Restock created successfully.');
    }

    private function generateCustomId()
    {
        $lastRestock = Restock::orderBy('id', 'desc')->first();
        $newIdNumber = $lastRestock ? intval(substr($lastRestock->id, 3)) + 1 : 1;
        return 'RST' . str_pad($newIdNumber, 5, '0', STR_PAD_LEFT);
    }

    public function edit($id)
    {
        $restock = Restock::findOrFail($id);
        $suppliers = Supplier::all();
        $items = Item::all();
        return view('Admin.Restocks.edit', compact('restock', 'suppliers', 'items'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supp_id' => 'required',
            'item_id' => 'required',
            'buy_qty' => 'required|integer',
        ]);

        $restock = Restock::findOrFail($id);
        $supplier = Supplier::find($request->supp_id);
        $item = Item::find($request->item_id);

        // Revert the previous item quantity
        $item = Item::find($restock->item_id);
        $item->item_qty -= $restock->buy_qty;
        $item->save();

        $restock->supp_id = $supplier->id;
        $restock->supp_name = $supplier->name;
        $restock->item_id = $item->id;
        $restock->name_item = $item->name;
        $restock->buy_price = $item->buy_price;
        $restock->buy_qty = $request->buy_qty;
        $restock->buy_total = $item->buy_price * $request->buy_qty;
        $restock->save();

        // Update the item quantity
        $item->item_qty += $request->buy_qty;
        $item->save();

        return redirect()->route('restocks.index');
    }

    public function destroy($id)
    {
        $restock = Restock::findOrFail($id);

        // Revert the item quantity
        $item = Item::find($restock->item_id);
        $item->item_qty -= $restock->buy_qty;
        $item->save();

        $restock->delete();

        return redirect()->route('restocks.index');
    }
}

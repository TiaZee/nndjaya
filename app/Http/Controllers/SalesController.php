<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Item;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::all();
        return view('admin.sales.index', compact('sales'));
    }

    public function create()
    {
        $items = Item::all();
        return view('admin.sales.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buyer_name' => 'required|string',
            'buyer_address' => 'required|string',
            'item_id' => 'required|exists:items,id',
            'sale_qty' => 'required|integer|min:1',
        ]);

        $item = Item::find($request->item_id);

        if ($item->item_qty < $request->sale_qty) {
            return redirect()->back()->withErrors(['sale_qty' => 'Not enough stock available.']);
        }

        $salePrice = $item->sale_price;
        $saleTotal = $salePrice * $request->sale_qty;

        Sales::create([
            'id' => $this->generateCustomId(),
            'buyer_name' => $request->buyer_name,
            'buyer_address' => $request->buyer_address,
            'item_id' => $item->id,
            'name_item' => $item->name,
            'sale_price' => $salePrice,
            'sale_qty' => $request->sale_qty,
            'sale_total' => $saleTotal,
        ]);

        // Update the item quantity
        $item->item_qty -= $request->sale_qty;
        $item->save();

        return redirect()->route('sales.index')->with('success', 'Sales Created successfully.');
    }

    private function generateCustomId()
    {
        $lastSale = Sales::orderBy('id', 'desc')->first();
        $newIdNumber = $lastSale ? intval(substr($lastSale->id, 3)) + 1 : 1;
        return 'SLS' . str_pad($newIdNumber, 5, '0', STR_PAD_LEFT);
    }

    public function edit($id)
    {
        $sale = Sales::findOrFail($id);
        $items = Item::all();
        return view('admin.sales.edit', compact('sales', 'items'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'buyer_name' => 'required|string',
            'buyer_address' => 'required|string',
            'item_id' => 'required|exists:items,id',
            'sale_qty' => 'required|integer|min:1',
        ]);

        $sale = Sales::findOrFail($id);
        $item = Item::find($request->item_id);

        // Revert the previous item quantity
        $previousItem = Item::find($sale->item_id);
        $previousItem->item_qty += $sale->sale_qty;
        $previousItem->save();

        // Update sale
        $sale->buyer_name = $request->buyer_name;
        $sale->buyer_address = $request->buyer_address;
        $sale->item_id = $item->id;
        $sale->name_item = $item->name;
        $sale->sale_price = $item->sale_price;
        $sale->sale_qty = $request->sale_qty;
        $sale->sale_total = $item->sale_price * $request->sale_qty;
        $sale->save();

        // Update the item quantity
        $item->item_qty -= $request->sale_qty;
        $item->save();

        return redirect()->route('sales.index')->with('success', 'Sales Updated Successfully.');
    }

    public function destroy($id)
    {
        $sale = Sales::findOrFail($id);

        // Revert the item quantity
        $item = Item::find($sale->item_id);
        $item->item_qty += $sale->sale_qty;
        $item->save();

        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Sales Deleted Successfully.');
    }
}

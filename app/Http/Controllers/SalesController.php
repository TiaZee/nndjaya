<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Item;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::paginate(10);
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
        $sales = Sales::findOrFail($id);
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

        $sales = Sales::findOrFail($id);
        $item = Item::find($request->item_id);

        // Revert the item quantity
        $item = Item::find($sales->item_id);
        $item->item_qty += $sales->sale_qty;
        $item->save();

        // Update sale
        $sales->buyer_name = $request->buyer_name;
        $sales->buyer_address = $request->buyer_address;
        $sales->item_id = $item->id;
        $sales->name_item = $item->name;
        $sales->sale_price = $item->sale_price;
        $sales->sale_qty = $request->sale_qty;
        $sales->sale_total = $item->sale_price * $request->sale_qty;
        $sales->save();

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

    public function showReceipt($id)
    {
        $sale = Sales::findOrFail($id);
        $data = [
            'title' => 'Nota Penjualan',
            'subtitle' => 'NN Djaya Snack',
            'restock_id' => $sale->id,
            'buyer_name' => $sale->buyer_name,
            'address' => $sale->buyer_address,
            'billed' => $sale->updated_at->format('d-m-Y'),
            'item_name' => $sale->name_item,
            'item_quantity' => number_format($sale->sale_qty, 0, ',', '.'),
            'price' => number_format($sale->sale_price, 2, ',', '.'),
            'total' => number_format($sale->sale_total, 2, ',', '.'),
        ];

        return view('admin.sales.receipt-preview', $data);
    }

    public function printReceipt($id)
    {
        $sale = Sales::findOrFail($id);
        $data = [
            'title' => 'Receipt',
            'subtitle' => 'NN Djaya Snack',
            'restock_id' => $sale->id,
            'buyer_name' => $sale->buyer_name,
            'address' => $sale->buyer_address,
            'billed' => $sale->updated_at->format('d-m-Y'),
            'item_name' => $sale->name_item,
            'item_quantity' => number_format($sale->sale_qty, 0, ',', '.'),
            'price' => number_format($sale->sale_price, 2, ',', '.'),
            'total' => number_format($sale->sale_total, 2, ',', '.'),
        ];
        $pdf = PDF::loadView('admin.sales.receipt', $data);
        return $pdf->download('receipt_' . $sale->id . '.pdf');
    }
}

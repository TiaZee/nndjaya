<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Sales;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all items
        $itemsCount = Item::count();

        // Fetch the top-selling item
        $topItemData = Sales::select('item_id', DB::raw('SUM(sale_qty) as total_sales'))
            ->groupBy('item_id')
            ->orderBy('total_sales', 'desc')
            ->first();

        if ($topItemData) {
            $item = Item::find($topItemData->item_id);
            $topItem = $item ? $item->name : 'Unknown Item';
            $totalSales = number_format($topItemData->total_sales, 0, ',', '.');
        } else {
            $topItem = 'No Data';
            $totalSales = '0';
        }

        // Fetch total monthly sales
        $monthlySales = Sales::whereMonth('created_at', now()->month)
            ->sum(DB::raw('sale_qty * sale_price'));

        $monthlySalesFormatted = number_format($monthlySales, 2, ',', '.');

        // Pass data to the view
        return view('dashboard', compact('topItem', 'totalSales', 'itemsCount', 'monthlySalesFormatted'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Restock;
use App\Models\Sales;
use App\Models\Item;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $dateA = $request->input('date_a');
        $dateB = $request->input('date_b');

        if ($dateA && $dateB) {
            // Convert dates to Carbon instances for easier comparison
            $dateA = Carbon::parse($dateA);
            $dateB = Carbon::parse($dateB);

            // Get all items
            $items = Item::all();

            $reportData = $items->map(function ($item) use ($dateA, $dateB) {
                // Calculate restock and sales data for each item
                $restockQuantity = Restock::where('item_id', $item->id)
                    ->whereBetween('created_at', [$dateA, $dateB])
                    ->sum('buy_qty');
                $moneySpent = Restock::where('item_id', $item->id)
                    ->whereBetween('created_at', [$dateA, $dateB])
                    ->sum('buy_total');

                $saleQuantity = Sales::where('item_id', $item->id)
                    ->whereBetween('created_at', [$dateA, $dateB])
                    ->sum('sale_qty');
                $moneyEarned = Sales::where('item_id', $item->id)
                    ->whereBetween('created_at', [$dateA, $dateB])
                    ->sum('sale_total');

                // Calculate current stock value and profit
                $currentStockValue = $item->item_qty * $item->sale_price;
                $soldoutprofit = ($moneyEarned - $moneySpent)+$currentStockValue;
                $profit = $moneyEarned - $moneySpent;

                return [
                    'item_name' => $item->name,
                    'restock_quantity' => $restockQuantity,
                    'money_spent' => $moneySpent,
                    'sale_quantity' => $saleQuantity,
                    'money_earned' => $moneyEarned,
                    'item_quantity' => $item->item_qty,
                    'current_stock_value' => $currentStockValue,
                    'sold_out_profit' => $soldoutprofit,
                    'profit' => $profit,
                ];
            });

            return view('admin.report.index', compact('reportData'));
        }

        return view('admin.report.index');
    }

    public function exportPdf(Request $request)
    {
        $dateA = $request->query('date_a');
        $dateB = $request->query('date_b');

        if ($dateA && $dateB) {
            // Convert dates to Carbon instances for easier comparison
            $dateA = Carbon::parse($dateA);
            $dateB = Carbon::parse($dateB);

            // Get all items
            $items = Item::all();
            $reportData = $items->map(function ($item) use ($dateA, $dateB) {
                // Calculate restock and sales data for each item
                $restockQuantity = Restock::where('item_id', $item->id)
                    ->whereBetween('created_at', [$dateA, $dateB])
                    ->sum('buy_qty');
                $moneySpent = Restock::where('item_id', $item->id)
                    ->whereBetween('created_at', [$dateA, $dateB])
                    ->sum('buy_total');

                $saleQuantity = Sales::where('item_id', $item->id)
                    ->whereBetween('created_at', [$dateA, $dateB])
                    ->sum('sale_qty');
                $moneyEarned = Sales::where('item_id', $item->id)
                    ->whereBetween('created_at', [$dateA, $dateB])
                    ->sum('sale_total');

                // Calculate current stock value and profit
                $currentStockValue = $item->item_qty * $item->sale_price;
                $soldoutprofit = ($moneyEarned - $moneySpent) + $currentStockValue;
                $profit = $moneyEarned - $moneySpent;

                return [
                    'item_name' => $item->name,
                    'restock_quantity' => $restockQuantity,
                    'money_spent' => $moneySpent,
                    'sale_quantity' => $saleQuantity,
                    'money_earned' => $moneyEarned,
                    'item_quantity' => $item->item_qty,
                    'current_stock_value' => $currentStockValue,
                    'sold_out_profit' => $soldoutprofit,
                    'profit' => $profit,
                ];
            });

            $pdf = PDF::loadView('Admin.Report.pdf', [
                'reportData' => $reportData,
                'dateA' => $dateA,
                'dateB' => $dateB,
            ]);

            return $pdf->download('report.pdf');
        }

        return redirect()->route('report.index')->withErrors('Date range not specified.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcurementController extends Controller
{
    public function index()
    {
        return view('Sales.Procurement.index');
    }
}

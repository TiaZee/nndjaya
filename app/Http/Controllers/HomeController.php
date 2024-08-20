<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $Items = Item::all();
        return view('Landing.index', compact('Items'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemAnalisisController extends Controller
{
    public function index()
    {
        return view('Accountant.ItemAnalisis.index');
    }
}

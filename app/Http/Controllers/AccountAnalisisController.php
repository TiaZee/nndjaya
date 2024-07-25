<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountAnalisisController extends Controller
{
    public function index()
    {
        return view('Accountant.AccountAnalisis.index');
    }
}

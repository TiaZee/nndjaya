<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CreateUserController extends Controller
{
    public function index()
    {
        return view('Owner.create-profile', [
            'roles' => Role::where('name', '!=', 'Owner')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        if ($request->role === "Owner") {
            $user->assignRole('Owner');
        } else if ($request->role === "Admin") {
            $user->assignRole('Admin');
        } else if ($request->role === "Accountant") {
            $user->assignRole('Accountant');
        }

        return redirect()->back()->with('success', 'User successfully Added');
    }
}

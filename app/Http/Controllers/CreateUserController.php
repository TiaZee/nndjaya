<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CreateUserController extends Controller
{
    public function index()
    {
        return view('Owner.index', [
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view('Owner.create', [
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

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::where('name', '!=', 'Owner')->get();

        return view('owner.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        // Update role
        $user->syncRoles($request->role);

        $user->save();

        return redirect()->route('create-user')->with('success', 'User successfully updated');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('create-user')->with('success', 'User successfully deleted');
    }
}

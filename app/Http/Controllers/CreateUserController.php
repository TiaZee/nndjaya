<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class CreateUserController extends Controller
{
    public function index()
    {
        return view('Owner.user.index', [
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view('Owner.user.create', [
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

        return redirect()->route('users.index')->with('success', 'User successfully Added');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::where('name', '!=', 'Owner')->get();

        return view('owner.user.edit', [
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

        return redirect()->route('users.index')->with('success', 'User successfully updated');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        // Mendapatkan ID tertinggi setelah penghapusan
        $maxId = User::max('id');

        // Jika tabel tidak kosong, reset auto-increment ke ID tertinggi
        if ($maxId) {
            DB::statement('ALTER TABLE users AUTO_INCREMENT = '.($maxId + 1));
        } else {
            DB::statement('ALTER TABLE users AUTO_INCREMENT = 1');
        }

        return redirect()->route('users.index')->with('success', 'User successfully deleted');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function adminIndex()
    {
        $admins = User::where('role', 'admin')->orderBy('id', 'desc')->get();
        return view('admin.users_admin', compact('admins'));
    }

    public function operatorIndex()
    {
        $operators = User::where('role', 'operator')->orderBy('id', 'desc')->get();
        return view('admin.users_operator', compact('operators'));
    }

    public function create()
    {
        return view('admin.users_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,operator'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make('temporary'),
        ]);

        $plainPassword = substr($request->email, 0, 4) . $user->id;

        $user->update([
            'password' => Hash::make($plainPassword),
            'plain_password' => $plainPassword,
        ]);

        $target = $user->role === 'admin' ? '/admin/users/admin' : '/admin/users/operator';

        return redirect($target)->with('success', "Akun Berhasil Dibuat. Password: $plainPassword");
    }

    public function edit(User $user)
    {
        return view('admin.users_edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:4'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
            $data['plain_password'] = null;
        }

        $user->update($data);

        $target = $user->role === 'admin' ? '/admin/users/admin' : '/admin/users/operator';

        return redirect($target)->with('success', 'Akun Berhasil Diperbarui');
    }

    public function destroy(User $user)
    {
        $role = $user->role;
        $user->delete();

        $target = $role === 'admin' ? '/admin/users/admin' : '/admin/users/operator';
        return redirect($target)->with('success', 'Akun Berhasil Dihapus');
    }

    public function resetPassword(User $user)
    {
        $plainPassword = substr($user->email, 0, 4) . $user->id;

        $user->update([
            'password' => Hash::make($plainPassword),
            'plain_password' => $plainPassword,
        ]);

        return back()->with('success', "Password Berhasil Direset. Password: $plainPassword");
    }

    public function exportAdmin()
    {
        return Excel::download(new UsersExport('admin'), 'admin-accounts.xlsx');
    }

    public function exportOperator()
    {
        return Excel::download(new UsersExport('operator'), 'operator-accounts.xlsx');
    }
}

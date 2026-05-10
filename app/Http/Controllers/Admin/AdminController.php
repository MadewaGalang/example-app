<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin as ModelsAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Tampilkan daftar admin
    public function index()
    {
        $admins = ModelsAdmin::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.admins.index', [
            'title' => 'Kelola Admin',
            'admins' => $admins
        ]);
    }

    // Tampilkan form tambah admin
    public function create()
    {
        return view('admin.admins.create', [
            'title' => 'Tambah Admin'
        ]);
    }

    // Simpan admin baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        ModelsAdmin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.admins.index')->with('success', 'Admin berhasil ditambahkan!');
    }

    // Tampilkan form edit admin
    public function edit(ModelsAdmin $admin)
    {
        return view('admin.admins.edit', [
            'title' => 'Edit Admin',
            'admin' => $admin
        ]);
    }

    // Update admin
    public function update(Request $request, ModelsAdmin $admin)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Update password jika diisi
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:8|confirmed',
            ]);
            $data['password'] = Hash::make($request->password);
        }

        $admin->update($data);

        return redirect()->route('admin.admins.index')->with('success', 'Admin berhasil diperbarui!');
    }

    // Hapus admin
    public function destroy(ModelsAdmin $admin)
    {
        // Prevent deleting own account
        if ($admin->id === auth()->guard('admin')->id()) {
            return redirect()->route('admin.admins.index')->with('error', 'Anda tidak dapat menghapus akun sendiri!');
        }

        $admin->delete();

        return redirect()->route('admin.admins.index')->with('success', 'Admin berhasil dihapus!');
    }
}
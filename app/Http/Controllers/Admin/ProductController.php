<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        return view('admin.products.create');
    }

    // Menyimpan produk ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga_produk' => 'required|numeric',
            'rating' => 'nullable|numeric|min:0|max:5',
            'link_produk' => 'nullable|url',
            'gambar_produk' => 'nullable|image|max:2048',
            'is_featured' => 'nullable|boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar_produk')) {
            $data['gambar_produk'] = $request->file('gambar_produk')->store('products', 'public');
        }

        // Perbaikan: Cek apakah checkbox dicentang
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan form edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // Mengupdate produk di database
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga_produk' => 'required|numeric',
            'rating' => 'nullable|numeric|min:0|max:5',
            'link_produk' => 'nullable|url',
            'gambar_produk' => 'nullable|image|max:2048',
            'is_featured' => 'nullable|boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar_produk')) {
            // Hapus gambar lama jika ada
            if ($product->gambar_produk && Storage::exists('public/' . $product->gambar_produk)) {
                Storage::delete('public/' . $product->gambar_produk);
            }

            $data['gambar_produk'] = $request->file('gambar_produk')->store('products', 'public');
        }

        // Perbaikan: Cek apakah checkbox dicentang
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // Menghapus produk dari database
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus gambar jika ada
        if ($product->gambar_produk && Storage::exists('public/' . $product->gambar_produk)) {
            Storage::delete('public/' . $product->gambar_produk);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    // Mengupdate status produk untuk tampil di home
    public function updateFeatured(Product $product)
    {
        // Toggle the is_featured status
        $product->is_featured = !$product->is_featured;
        $product->save();
    
        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.products.index')->with('success', 'Status produk berhasil diperbarui.');
    }
}
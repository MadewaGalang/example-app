<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\IndustryGallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Method untuk halaman home
    public function index()
    {
        $products = Product::where('is_featured', 1)->get();
        $galleries = IndustryGallery::where('is_featured', 1)->get();
        // Mengembalikan tampilan home dengan produk-produk yang difilter
        return view('home', compact('products','galleries'));
    }

    // Method untuk halaman items dengan pencarian
    public function items(Request $request)
    {
        // Cek jika ada parameter pencarian 'search'
        $search = $request->get('search');
        
        // Jika ada query pencarian, cari produk berdasarkan nama_produk
        if ($search) {
            $products = Product::where('nama_produk', 'like', '%' . $search . '%')->get();
        } else {
            // Jika tidak ada pencarian, ambil semua produk
            $products = Product::all();
        }

        // Kirim produk ke view 'items'
        return view('items', compact('products'));
    }

    public function industry(Request $request)
    {
        $galleries = IndustryGallery::all(); // Ambil semua galeri
        return view('industry', compact('galleries')); // Mengarahkan ke view industri.blade.php
    }
}

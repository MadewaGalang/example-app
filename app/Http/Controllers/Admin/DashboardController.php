<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\IndustryGallery;
use App\Models\Admin;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalGalleries = IndustryGallery::count();
        $totalAdmins = Admin::count();

        return view('admin.dashboard', compact('totalProducts', 'totalGalleries', 'totalAdmins'));
    }
}

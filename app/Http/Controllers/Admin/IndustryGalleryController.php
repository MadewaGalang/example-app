<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndustryGallery;
use Illuminate\Http\Request;

class IndustryGalleryController extends Controller
{

    public function index()
    {
        $galleries = IndustryGallery::all(); // Ambil semua galeri
        return view('admin.industry_gallery.index', compact('galleries')); // Mengarahkan ke view industri.blade.php
    }
    public function create()
    {
        return view('admin.industry_gallery.create');
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,mp4,avi|max:10240', // Gambar/video bisa diperbarui
            'media_type' => 'required|in:image,video',
            'is_featured' => 'boolean',
        ]);
    
        $gallery = IndustryGallery::findOrFail($id);
    
        // Jika ada file media yang diupload, simpan file baru
        if ($request->hasFile('media')) {
            // Hapus file lama
            $oldFilePath = storage_path('app/public/' . $gallery->media_path);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
    
            // Simpan file baru
            $mediaPath = $request->file('media')->store('industry', 'public');
            $gallery->media_path = $mediaPath;
            $gallery->media_type = $validated['media_type'];
        }
    
        // Perbarui informasi lainnya
        $gallery->title = $validated['title'];
        $gallery->is_featured = $validated['is_featured'] ?? false;
        $gallery->save();
    
        return redirect()->route('admin.industry_gallery.index')->with('success', 'Galeri berhasil diperbarui.');
    }
    
    public function edit($id)
{
    $gallery = IndustryGallery::findOrFail($id);
    return view('admin.industry_gallery.edit', compact('gallery'));
}

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'media' => 'required|file|mimes:jpg,jpeg,png,mp4,avi|max:10240', // Validasi file gambar/video
            'media_type' => 'required|in:image,video',
            'is_featured' => 'boolean',
        ]);

        $mediaPath = $request->file('media')->store('industry', 'public');

        IndustryGallery::create([
            'title' => $validated['title'],
            'media_path' => $mediaPath,
            'media_type' => $validated['media_type'],
            'is_featured' => $validated['is_featured'] ?? false,
        ]);

        return redirect()->route('admin.industry_gallery.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $gallery = IndustryGallery::findOrFail($id);
        $filePath = storage_path('app/public/' . $gallery->media_path);

        if (file_exists($filePath)) {
            unlink($filePath); // Hapus file dari storage
        }

        $gallery->delete();

        return redirect()->route('admin.industry_gallery.index')->with('success', 'Galeri berhasil dihapus.');
    }
    public function updateFeatured($id)
{
    $gallery = IndustryGallery::findOrFail($id);

    // Toggle nilai is_featured
    $gallery->is_featured = !$gallery->is_featured;
    $gallery->save();

    return redirect()->route('admin.industry_gallery.index')->with(
        'success', 
        'Status galeri berhasil diperbarui.'
    );
}
}



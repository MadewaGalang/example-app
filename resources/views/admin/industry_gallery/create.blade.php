<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Tambah Galeri' }} - VENDREDI SAINT</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex">

        <!-- Sidebar -->
        <aside class="w-64 bg-[rgba(128,113,79,1)] text-white">
            <div class="p-6">
                <h1 class="text-xl font-bold">VENDREDI SAINT</h1>
                <p class="text-sm opacity-75">Admin Panel</p>
            </div>

            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}"
                    class="block px-6 py-3 hover:bg-white/10 {{ request()->routeIs('admin.dashboard') ? 'bg-white/20' : '' }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.products.index') }}"
                    class="block px-6 py-3 hover:bg-white/10 {{ request()->routeIs('admin.products.*') ? 'bg-white/20' : '' }}">
                    Products
                </a>

                <a href="{{ route('admin.industry_gallery.index') }}"
                    class="block px-6 py-3 hover:bg-white/10 {{ request()->routeIs('admin.industry_gallery.*') ? 'bg-white/20' : '' }}">
                    Industry Gallery
                </a>

                <a href="{{ route('admin.admins.index') }}"
                    class="block px-6 py-3 hover:bg-white/10 {{ request()->routeIs('admin.admins.*') ? 'bg-white/20' : '' }}">
                    Admin
                </a>
            </nav>

            <div class="absolute bottom-0 w-64 p-6">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full bg-white/20 py-2 px-4 rounded hover:bg-white/30">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 bg-gray-100">
            <div class="p-8">

                <!-- Header -->
                <div class="mb-6">
                    <a href="{{ route('admin.industry_gallery.index') }}"
                        class="text-sm text-gray-500 hover:text-gray-700">
                        ← Kembali
                    </a>

                    <h1 class="text-2xl font-bold text-gray-800 mt-2">
                        Tambah Galeri
                    </h1>

                    <p class="text-sm text-gray-500">
                        Tambahkan media baru ke galeri
                    </p>
                </div>

                <!-- Error -->
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Card -->
                <div class="bg-white rounded-2xl shadow-sm p-8 w-full">

                    <form id="galleryForm"
                        action="{{ route('admin.industry_gallery.store') }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Judul -->
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Judul
                            </label>
                            <input type="text" name="title"
                                value="{{ old('title') }}"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[rgba(128,113,79,0.4)]"
                                placeholder="Masukkan judul..." required>
                        </div>

                        <!-- Media -->
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Media (Gambar / Video)
                            </label>
                            <input type="file" name="media"
                                class="w-full border border-gray-300 rounded-xl px-3 py-2 bg-gray-50"
                                accept="image/*,video/*" required>

                            <p class="text-xs text-gray-500 mt-2">
                                Format: jpg, png, mp4 (max 10MB)
                            </p>
                        </div>

                        <!-- Jenis Media -->
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Jenis Media
                            </label>
                            <select name="media_type"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[rgba(128,113,79,0.4)]">
                                <option value="image">Gambar</option>
                                <option value="video">Video</option>
                            </select>
                        </div>

                        <!-- Checkbox -->
                        <div class="mb-6 flex items-center gap-2">
                            <input type="checkbox" name="is_featured" value="1"
                                class="w-4 h-4 accent-[rgba(128,113,79,1)]"
                                {{ old('is_featured') ? 'checked' : '' }}>
                            <span class="text-sm text-gray-700">
                                Tampilkan di Homepage
                            </span>
                        </div>

                        <!-- Button -->
                        <div class="flex justify-end gap-3">
                            <button type="button" onclick="resetForm()"
                                class="px-4 py-2 text-gray-600 hover:text-gray-800">
                                Batal
                            </button>

                            <button type="submit"
                                class="px-6 py-2 bg-[rgba(128,113,79,1)] text-white rounded-xl hover:bg-[rgba(108,93,59,1)] transition">
                                Simpan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </main>

    </div>

<!-- SCRIPT RESET -->
<script>
function resetForm() {
    const form = document.getElementById('galleryForm');
    form.reset();

    // reset file input
    const fileInput = form.querySelector('input[type="file"]');
    if (fileInput) {
        fileInput.value = '';
    }
}
</script>

</body>
</html>
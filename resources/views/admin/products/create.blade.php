<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Tambah Produk' }} - VENDREDI SAINT</title>
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
                    <a href="{{ route('admin.products.index') }}"
                        class="text-sm text-gray-500 hover:text-gray-700">
                        ← Kembali
                    </a>

                    <h1 class="text-2xl font-bold text-gray-800 mt-2">
                        Tambah Produk
                    </h1>

                    <p class="text-sm text-gray-500">
                        Isi form berikut untuk menambahkan produk baru
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

                    <form id="productForm"
                        action="{{ route('admin.products.store') }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Nama -->
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Produk
                            </label>
                            <input type="text" name="nama_produk"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[rgba(128,113,79,0.4)]"
                                placeholder="Masukkan nama produk..." required>
                        </div>

                        <!-- Harga -->
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Harga Produk
                            </label>
                            <input type="number" name="harga_produk"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[rgba(128,113,79,0.4)]"
                                placeholder="Contoh: 150000" required>
                        </div>

                        <!-- Link -->
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Link Produk
                            </label>
                            <input type="url" name="link_produk"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[rgba(128,113,79,0.4)]"
                                placeholder="https://...">
                        </div>

                        <!-- Rating -->
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Rating (0-5)
                            </label>
                            <input type="number" name="rating"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[rgba(128,113,79,0.4)]"
                                step="0.1" min="0" max="5">
                        </div>

                        <!-- Gambar -->
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Gambar Produk
                            </label>
                            <input type="file" name="gambar_produk"
                                class="w-full border border-gray-300 rounded-xl px-3 py-2 bg-gray-50">
                        </div>

                        <!-- Checkbox -->
                        <div class="mb-6 flex items-center gap-2">
                            <input type="checkbox" name="is_featured" value="1"
                                class="w-4 h-4 accent-[rgba(128,113,79,1)]">
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
    const form = document.getElementById('productForm');
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
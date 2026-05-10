<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin' }} - VENDREDI SAINT</title>
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
            {{-- Tombol logout: trigger modal, bukan submit langsung --}}
            <button
                type="button"
                onclick="document.getElementById('logoutModal').classList.remove('hidden')"
                class="w-full bg-white/20 py-2 px-4 rounded hover:bg-white/30">
                Logout
            </button>
        </div>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-8">
        {{ $slot }}
    </main>

</div>

{{-- Modal Konfirmasi Logout --}}
<div id="logoutModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-sm mx-4 p-6">
        <div class="flex flex-col items-center text-center">
            <div class="w-14 h-14 rounded-full bg-amber-100 flex items-center justify-center mb-4">
                <svg class="w-7 h-7 text-amber-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </div>

            <h2 class="text-lg font-semibold text-gray-800 mb-1">Konfirmasi Logout</h2>
            <p class="text-sm text-gray-500 mb-6">Apakah Anda yakin ingin keluar dari sesi admin?</p>

            <div class="flex gap-3 w-full">
                <button
                    type="button"
                    onclick="document.getElementById('logoutModal').classList.add('hidden')"
                    class="flex-1 py-2 px-4 rounded-lg border border-gray-300 text-gray-600 text-sm font-medium hover:bg-gray-50 transition">
                    Batal
                </button>

                <form method="POST" action="{{ route('admin.logout') }}" class="flex-1">
                    @csrf
                    <button type="submit"
                        class="w-full py-2 px-4 rounded-lg bg-[rgba(128,113,79,1)] text-white text-sm font-medium hover:bg-[rgba(108,93,59,1)] transition">
                        Ya, Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Tutup modal saat klik di luar kotak
    document.getElementById('logoutModal').addEventListener('click', function (e) {
        if (e.target === this) {
            this.classList.add('hidden');
        }
    });
</script>

</body>
</html>
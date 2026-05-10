<x-layout>
    <div class="p-3 bg-gray-100 min-h-screen">
        <h1 class="text-2xl font-extrabold text-gray-800 mb-6">Daftar Produk</h1>

        {{-- Tombol Tambah Produk --}}
        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.products.create') }}"
                class="bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-600 transition">
                Tambah Produk
            </a>
        </div>

        {{-- Pesan Sukses --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabel Daftar Produk --}}
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Nama Produk</th>
                        <th class="py-3 px-6 text-left">Harga</th>
                        <th class="py-3 px-6 text-left">Gambar</th>
                        <th class="py-3 px-6 text-left">Link Produk</th>
                        <th class="py-3 px-6 text-left">Rating</th>
                        <th class="py-3 px-6 text-center">Tampilkan</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    @foreach ($products as $no => $product)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $no + 1 }}</td>
                            <td class="py-3 px-6 text-left">{{ $product->nama_produk }}</td>
                            <td class="py-3 px-6 text-left">Rp{{ number_format($product->harga_produk, 0, ',', '.') }}</td>
                            <td class="py-3 px-6 text-left">
                                @if ($product->gambar_produk)
                                    <img src="{{ asset('storage/' . $product->gambar_produk) }}"
                                        alt="{{ $product->nama_produk }}" class="w-12 h-12 object-cover rounded">
                                @else
                                    <span class="text-gray-500">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td class="py-3 px-6 text-left">
                                <a href="{{ $product->link_produk }}" target="_blank"
                                    class="text-blue-500 hover:underline">
                                    Lihat Produk
                                </a>
                            </td>
                            <td class="py-3 px-6 text-left">{{ $product->rating }}/5</td>

                            {{-- Kolom untuk mengatur status "is_featured" --}}
                            <td class="py-3 px-6 text-center">
                                <form action="{{ route('admin.products.updateFeatured', $product->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-white px-2 py-1 rounded transition">
                                        @if ($product->is_featured)
                                            <span class="bg-red-700 px-2 py-1 rounded hover:bg-red-400 inline-block">Nonaktifkan di Home</span>
                                        @else
                                            <span class="bg-green-700 px-2 py-1 rounded hover:bg-green-400 inline-block">Tampilkan di Home</span>
                                        @endif
                                    </button>
                                </form>
                            </td>

                            <td class="py-3 flex mt-[15px] px-6 text-center gap-1">
                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                    class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition">
                                    Edit
                                </a>

                                {{-- Form hapus: dipisah dari tombol --}}
                                <form id="delete-form-{{ $product->id }}"
                                    action="{{ route('admin.products.destroy', $product->id) }}"
                                    method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                {{-- Tombol hapus: buka modal --}}
                                <button
                                    type="button"
                                    onclick="openDeleteModal('{{ $product->id }}', '{{ addslashes($product->nama_produk) }}')"
                                    class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Konfirmasi Hapus --}}
    <div id="deleteModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-sm mx-4 p-6">
            <div class="flex flex-col items-center text-center">
                {{-- Ikon peringatan --}}
                <div class="w-14 h-14 rounded-full bg-red-100 flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                    </svg>
                </div>

                <h2 class="text-lg font-semibold text-gray-800 mb-1">Hapus Produk</h2>
                <p class="text-sm text-gray-500 mb-1">Anda akan menghapus produk:</p>
                <p id="deleteProductName" class="text-sm font-semibold text-gray-800 mb-4">-</p>
                <p class="text-xs text-red-500 mb-6">Tindakan ini tidak dapat dibatalkan.</p>

                <div class="flex gap-3 w-full">
                    {{-- Tombol Batal --}}
                    <button
                        type="button"
                        onclick="closeDeleteModal()"
                        class="flex-1 py-2 px-4 rounded-lg border border-gray-300 text-gray-600 text-sm font-medium hover:bg-gray-50 transition">
                        Batal
                    </button>

                    {{-- Tombol Konfirmasi Hapus --}}
                    <button
                        type="button"
                        onclick="submitDelete()"
                        class="flex-1 py-2 px-4 rounded-lg bg-red-500 text-white text-sm font-medium hover:bg-red-600 transition">
                        Ya, Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let targetFormId = null;

        function openDeleteModal(productId, productName) {
            targetFormId = 'delete-form-' + productId;
            document.getElementById('deleteProductName').textContent = productName;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            targetFormId = null;
            document.getElementById('deleteModal').classList.add('hidden');
        }

        function submitDelete() {
            if (targetFormId) {
                document.getElementById(targetFormId).submit();
            }
        }

        // Tutup modal saat klik di luar kotak
        document.getElementById('deleteModal').addEventListener('click', function (e) {
            if (e.target === this) closeDeleteModal();
        });
    </script>
</x-layout>
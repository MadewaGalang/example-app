<x-layout>
    <div class="p-3 bg-gray-100 min-h-screen">
        <h1 class="text-2xl font-extrabold text-gray-800 mb-6">Daftar Galeri</h1>

        {{-- Tombol Tambah Galeri --}}
        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.industry_gallery.create') }}"
                class="bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-600 transition">
                Tambah Galeri
            </a>
        </div>

        {{-- Pesan Sukses --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabel Daftar Galeri --}}
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Judul</th>
                        <th class="py-3 px-6 text-left">Media</th>
                        <th class="py-3 px-6 text-center">Tampilkan</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    @foreach ($galleries as $no => $gallery)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $no + 1 }}</td>
                            <td class="py-3 px-6 text-left">{{ $gallery->title }}</td>
                            <td class="py-3 px-6 text-left">
                                @if ($gallery->media_type == 'image')
                                    <img src="{{ asset('storage/' . $gallery->media_path) }}"
                                        alt="{{ $gallery->title }}" class="w-12 h-12 object-cover rounded">
                                @else
                                    <video width="100" controls class="rounded shadow">
                                        <source src="{{ asset('storage/' . $gallery->media_path) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
                            </td>
                            <td class="py-3 px-6 text-center">
                                <form action="{{ route('admin.industry_gallery.updateFeatured', $gallery->id) }}"
                                    method="POST" class="inline-block">
                                    @csrf
                                    @method('POST')
                                    @if ($gallery->is_featured)
                                        <button type="submit"
                                            class="bg-red-700 text-white px-2 py-1 rounded hover:bg-red-500 transition">
                                            Nonaktifkan di Home
                                        </button>
                                    @else
                                        <button type="submit"
                                            class="bg-green-700 text-white px-2 py-1 rounded hover:bg-green-500 transition">
                                            Tampilkan di Home
                                        </button>
                                    @endif
                                </form>
                            </td>
                            <td class="py-3 px-6 text-center">
                                {{-- Tombol Edit --}}
                                <a href="{{ route('admin.industry_gallery.edit', $gallery->id) }}"
                                    class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition">
                                    Edit
                                </a>

                                {{-- Form hapus: dipisah dari tombol --}}
                                <form id="delete-form-{{ $gallery->id }}"
                                    action="{{ route('admin.industry_gallery.destroy', $gallery->id) }}"
                                    method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                {{-- Tombol hapus: buka modal --}}
                                <button
                                    type="button"
                                    onclick="openDeleteModal('{{ $gallery->id }}', '{{ addslashes($gallery->title) }}')"
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

                <h2 class="text-lg font-semibold text-gray-800 mb-1">Hapus Galeri</h2>
                <p class="text-sm text-gray-500 mb-1">Anda akan menghapus galeri:</p>
                <p id="deleteGalleryTitle" class="text-sm font-semibold text-gray-800 mb-4">-</p>
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

        function openDeleteModal(galleryId, galleryTitle) {
            targetFormId = 'delete-form-' + galleryId;
            document.getElementById('deleteGalleryTitle').textContent = galleryTitle;
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
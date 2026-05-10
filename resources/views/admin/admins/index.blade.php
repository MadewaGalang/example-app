<x-layout>
    <div class="p-3 bg-gray-100 min-h-screen">
        <h1 class="text-2xl font-extrabold text-gray-800 mb-6">Daftar Admin</h1>

        {{-- Tombol Tambah Admin --}}
        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.admins.create') }}"
                class="bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-600 transition">
                Tambah Admin
            </a>
        </div>

        {{-- Pesan --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{-- Tabel Admin --}}
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Nama</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">Dibuat</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    @forelse ($admins as $no => $admin)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6">{{ $no + 1 }}</td>
                            <td class="py-3 px-6">{{ $admin->name }}</td>
                            <td class="py-3 px-6">{{ $admin->email }}</td>
                            <td class="py-3 px-6">
                                {{ $admin->created_at->format('d M Y') }}
                            </td>
                            <td class="py-3 px-6 text-center">
                                <a href="{{ route('admin.admins.edit', $admin->id) }}"
                                    class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition">
                                    Edit
                                </a>

                                {{-- Form hapus: id unik per admin --}}
                                <form id="delete-form-{{ $admin->id }}"
                                    action="{{ route('admin.admins.destroy', $admin->id) }}"
                                    method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                {{-- Tombol hapus: buka modal dengan data admin --}}
                                <button
                                    type="button"
                                    onclick="openDeleteModal('{{ $admin->id }}', '{{ addslashes($admin->name) }}')"
                                    class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">
                                Belum ada admin.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $admins->links() }}
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

                <h2 class="text-lg font-semibold text-gray-800 mb-1">Hapus Admin</h2>
                <p class="text-sm text-gray-500 mb-1">Anda akan menghapus admin:</p>
                <p id="deleteAdminName" class="text-sm font-semibold text-gray-800 mb-4">-</p>
                <p class="text-xs text-red-500 mb-6">Tindakan ini tidak dapat dibatalkan.</p>

                <div class="flex gap-3 w-full">
                    {{-- Tombol Batal --}}
                    <button
                        type="button"
                        onclick="closeDeleteModal()"
                        class="flex-1 py-2 px-4 rounded-lg border border-gray-300 text-gray-600 text-sm font-medium hover:bg-gray-50 transition">
                        Batal
                    </button>

                    {{-- Tombol Hapus --}}
                    <button
                        type="button"
                        id="confirmDeleteBtn"
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

        function openDeleteModal(adminId, adminName) {
            targetFormId = 'delete-form-' + adminId;
            document.getElementById('deleteAdminName').textContent = adminName;
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
<div class="w-full h-full">
    <livewire:navbar />

    <main class="w-full h-screen pl-64 bg-zinc-100">
        <section class="flex flex-col w-full gap-10 p-10">
            <header class="flex items-center justify-between w-full">
                <p class="text-3xl font-bold">
                    Dashboard Admin
                </p>
                <livewire:profile />
            </header>

            <livewire:admin-cards />

            <livewire:chart />

            <div class="w-full overflow-hidden bg-white rounded-lg shadow-md">
                <div class="p-6">
                    <h3 class="mb-4 text-lg font-semibold text-gray-800">Daftar Peminjaman Terbaru</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-3 text-sm font-semibold text-left text-gray-700">Peminjam</th>
                                    <th class="p-3 text-sm font-semibold text-left text-gray-700">Tanggal Pinjam</th>
                                    <th class="p-3 text-sm font-semibold text-left text-gray-700">Lama Pinjam</th>
                                    <th class="p-3 text-sm font-semibold text-left text-gray-700">Total Barang</th>
                                    <th class="p-3 text-sm font-semibold text-left text-gray-700">Barang Yang Dipinjam</th>
                                    <th class="p-3 text-sm font-semibold text-left text-gray-700">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($peminjaman as $item)
                                    <tr class="border-t hover:bg-gray-50">
                                        <td class="p-3 text-sm text-gray-800">{{ $item->person->name }}</td>
                                        <td class="p-3 text-sm text-gray-800">{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}</td>
                                        <td class="p-3 text-sm text-gray-800">{{ \Carbon\Carbon::parse($item->lama_pinjam)->format('d M Y') }}</td>
                                        <td class="p-3 text-sm text-gray-800">{{ $item->total_barang }}</td>
                                        <td class="p-3 text-sm text-gray-800">
                                            <div class="flex flex-wrap gap-1">
                                                @foreach ($item->items as $peminjamanItem)
                                                    <span class="px-2 py-1 text-xs text-white bg-blue-500 rounded-full">
                                                        {{ $peminjamanItem->barang->nama }} ({{ $peminjamanItem->jumlah_barang }})
                                                    </span>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="p-3 text-sm text-gray-800">
                                            <span
                                                class="px-2 py-1 text-xs text-white 
                                                {{ $item->status == 'sedang dipinjam'
                                                    ? 'bg-blue-500'
                                                    : ($item->status == 'belum dikembalikan'
                                                        ? 'bg-red-500'
                                                        : 'bg-green-500') }} 
                                                rounded-full">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="p-10 text-lg text-center text-gray-600">
                                            Data Peminjaman Tidak Ditemukan
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            
                <div class="px-6 py-3 border-t">
                    {{ $peminjaman->links('pagination::tailwind') }}
                </div>
            </div>
        </section>
    </main>

    <livewire:edit-password-modal />
</div>
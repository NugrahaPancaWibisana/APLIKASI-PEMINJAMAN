<div class="flex flex-wrap gap-4">
    <!-- Card 1 -->
    <div class="flex-1 min-w-[200px] bg-white p-4 rounded-lg shadow-md">
        <div class="flex flex-col">
            <span class="mb-1 text-sm font-medium text-gray-500">Barang dipinjam</span>
            <span class="text-2xl font-semibold text-indigo-600">{{ $totalBarang }}</span>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="flex-1 min-w-[200px] bg-white p-4 rounded-lg shadow-md">
        <div class="flex flex-col">
            <span class="mb-1 text-sm font-medium text-gray-500">Barang belum dikembalikan</span>
            <span class="text-2xl font-semibold text-indigo-600">{{ $barangBelumDikembalikan }}</span>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="flex-1 min-w-[200px] bg-white p-4 rounded-lg shadow-md">
        <div class="flex flex-col">
            <span class="mb-1 text-sm font-medium text-gray-500">Total guru peminjam</span>
            <span class="text-2xl font-semibold text-indigo-600">{{ $totalGuruPeminjam }}</span>
        </div>
    </div>
</div>

<div class="flex flex-wrap gap-4">
    <!-- Card 1 -->
    <div class="flex-1 min-w-[200px] bg-white p-4 rounded-lg shadow-md">
        <div class="flex flex-col">
            <span class="mb-1 text-sm font-medium text-gray-500">Barang dipinjam</span>
            <span class="text-2xl font-semibold text-indigo-600">{{ number_format($totalBarang) }}</span>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="flex-1 min-w-[200px] bg-white p-4 rounded-lg shadow-md">
        <div class="flex flex-col">
            <span class="mb-1 text-sm font-medium text-gray-500">Barang belum dikembalikan</span>
            <span class="text-2xl font-semibold text-indigo-600">{{ number_format($barangBelumDikembalikan) }}</span>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="flex-1 min-w-[200px] bg-white p-4 rounded-lg shadow-md">
        <div class="flex flex-col">
            <span class="mb-1 text-sm font-medium text-gray-500">Barang dipinjam hari ini</span>
            <span class="text-2xl font-semibold text-indigo-600">{{ number_format($barangDipinjamHariIni) }}</span>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="flex-1 min-w-[200px] bg-white p-4 rounded-lg shadow-md">
        <div class="flex flex-col">
            <span class="mb-1 text-sm font-medium text-gray-500">Total guru peminjam</span>
            <span class="text-2xl font-semibold text-indigo-600">{{ number_format($totalGuruPeminjam) }}</span>
        </div>
    </div>
</div>

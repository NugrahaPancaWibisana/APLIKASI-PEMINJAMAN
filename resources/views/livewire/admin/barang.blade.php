<div class="w-full h-full">
    <livewire:navbar />

    <main class="w-full h-screen pl-64 bg-zinc-100">
        <section class="flex flex-col w-full gap-10 p-10">
            <header class="flex items-center justify-between w-full">
                <p class="text-3xl font-bold">
                    Barang
                </p>
                <livewire:profile />
            </header>

            <div>
                <div class="p-6 mb-6 bg-white rounded-lg shadow-md">
                    <h3 class="mb-4 text-lg font-semibold text-gray-800 form-title-barang">
                        {{ $isEditing ? 'Edit Barang' : 'Tambah Barang' }}
                    </h3>
                    <form wire:submit="create" class="flex flex-col gap-4">
                        @csrf
                        <div class="flex flex-col gap-4 md:flex-row">
                            <div class="flex-1">
                                <label class="text-sm font-medium text-gray-600">Nama Barang</label>
                                <input type="text" wire:model="nama"
                                    class="w-full p-2 border rounded-lg focus:ring focus:ring-indigo-300" required>
                                @error('nama')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex-1">
                                <label class="text-sm font-medium text-gray-600">Stok</label>
                                <input type="number" wire:model="stok"
                                    class="w-full p-2 border rounded-lg focus:ring focus:ring-indigo-300" required>
                                @error('stok')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex-1">
                                <label class="text-sm font-medium text-gray-600">Tipe</label>
                                <input type="text" wire:model="tipe"
                                    class="w-full p-2 border rounded-lg focus:ring focus:ring-indigo-300">
                                @error('tipe')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-600">Gambar</label>
                            <input type="file" wire:model="image" class="w-full p-2 border rounded-lg">
                            @error('image')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror

                            <div wire:loading wire:target="image" class="mt-2 text-sm text-gray-500">
                                Mengunggah...
                            </div>

                            @if ($image)
                                <div class="mt-2">
                                    <img src="{{ $image->temporaryUrl() }}" class="object-cover w-auto h-24 rounded">
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center justify-end gap-4 mt-2">
                            @if ($isEditing)
                                <button type="button" wire:click="cancelEdit"
                                    class="px-4 py-2 text-sm text-white transition bg-gray-500 rounded-lg hover:bg-gray-600">
                                    Batalkan Edit
                                </button>
                                <button type="submit"
                                    class="px-6 py-2 text-sm text-white transition bg-indigo-500 rounded-lg hover:bg-indigo-600">
                                    Update Barang
                                </button>
                            @else
                                <button type="submit"
                                    class="px-6 py-2 text-sm text-white transition bg-indigo-500 rounded-lg hover:bg-indigo-600">
                                    Tambah Barang
                                </button>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Daftar Barang dengan Flex -->
                <div class="flex flex-wrap gap-6">
                    @forelse ($barangs as $barang)
                        <div
                            class="flex-1 min-w-[300px] max-w-sm bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                            @if ($barang->image)
                                <img src="{{ asset('storage/' . $barang->image) }}"
                                    class="object-cover w-full h-48 rounded-t-lg">
                            @else
                                <div
                                    class="flex items-center justify-center w-full h-48 text-gray-500 bg-gray-200 rounded-t-lg">
                                    No Image
                                </div>
                            @endif
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-800">{{ $barang->nama }}</h2>
                                <p class="mt-1 text-sm text-gray-600">Stok: <strong>{{ $barang->stok }}</strong></p>
                                <p class="mt-2 text-gray-700">Tipe: {{ $barang->tipe }}</p>
                                <div class="flex justify-between mt-4">
                                    <button wire:click="edit({{ $barang->id }})"
                                        class="px-4 py-2 text-sm text-white transition bg-indigo-500 rounded-lg hover:bg-indigo-600">
                                        Edit
                                    </button>
                                    <button wire:click="delete({{ $barang->id }})" wire:confirm="Hapus barang ini?"
                                        class="px-4 py-2 text-sm text-white transition bg-red-500 rounded-lg hover:bg-red-600">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="w-full p-10 text-lg text-center text-gray-600 bg-white rounded-lg shadow-md">
                            Data Barang Tidak Ditemukan
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="mt-10">
                    {{ $barangs->links('pagination::tailwind') }}
                </div>
            </div>
        </section>
    </main>

    <livewire:edit-password-modal />
</div>

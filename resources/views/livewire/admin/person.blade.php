<div class="w-full h-full">
    <livewire:navbar />

    <main class="w-full h-screen pl-64 bg-zinc-100">
        <section class="flex flex-col w-full gap-10 p-10">
            <header class="flex items-center justify-between w-full">
                <p class="text-3xl font-bold">
                    Guru
                </p>
                <livewire:profile />
            </header>

            <div>
                <div class="p-6 mb-6 bg-white rounded-lg shadow-md">
                    <h3 class="mb-4 text-lg font-semibold text-gray-800 form-title-guru">
                        {{ $isEditing ? 'Edit Guru' : 'Tambah Guru' }}
                    </h3>
                    <form wire:submit="create" class="flex flex-col gap-4">
                        @csrf
                        <div class="flex flex-col gap-4 md:flex-row">
                            <div class="flex-1">
                                <label class="text-sm font-medium text-gray-600">Nama Guru</label>
                                <input type="text" wire:model="name"
                                    class="w-full p-2 border rounded-lg focus:ring focus:ring-indigo-300" required>
                                @error('name')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex-1">
                                <label class="text-sm font-medium text-gray-600">RFID</label>
                                <input type="text" wire:model="rfid" inputmode="numeric" pattern="[0-9]*"
                                    class="w-full p-2 border rounded-lg focus:ring focus:ring-indigo-300" required
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                @error('rfid')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col gap-4 md:flex-row">
                            <div class="flex-1">
                                <label class="text-sm font-medium text-gray-600">NIP</label>
                                <input type="text" wire:model="nip" inputmode="numeric" pattern="[0-9]*"
                                    class="w-full p-2 border rounded-lg focus:ring focus:ring-indigo-300" required
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                @error('nip')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex-1">
                                <label class="text-sm font-medium text-gray-600">Nomor WhatsApp</label>
                                <input type="text" wire:model="no_wa" inputmode="numeric" pattern="[0-9]*"
                                    class="w-full p-2 border rounded-lg focus:ring focus:ring-indigo-300" required
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                @error('no_wa')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex-1">
                                <label class="text-sm font-medium text-gray-600">Jabatan <span
                                        class="text-xs text-gray-500">(default: guru)</span></label>
                                <input type="text" wire:model="jabatan" placeholder="Masukkan jabatan"
                                    class="w-full p-2 border rounded-lg focus:ring focus:ring-indigo-300" required>
                                @error('jabatan')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-4 mt-2">
                            @if ($isEditing)
                                <button type="button" wire:click="cancelEdit"
                                    class="px-4 py-2 text-sm text-white transition bg-gray-500 rounded-lg hover:bg-gray-600">
                                    Batalkan Edit
                                </button>
                                <button type="submit"
                                    class="px-6 py-2 text-sm text-white transition bg-indigo-500 rounded-lg hover:bg-indigo-600">
                                    Update Guru
                                </button>
                            @else
                                <button type="submit"
                                    class="px-6 py-2 text-sm text-white transition bg-indigo-500 rounded-lg hover:bg-indigo-600">
                                    Tambah Guru
                                </button>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Daftar Guru dengan Table -->
                <div class="w-full overflow-hidden bg-white rounded-lg shadow-md">
                    <div class="p-6">
                        <h3 class="mb-4 text-lg font-semibold text-gray-800">Daftar Guru</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="p-3 text-sm font-semibold text-left text-gray-700">Nama</th>
                                        <th class="p-3 text-sm font-semibold text-left text-gray-700">RFID</th>
                                        <th class="p-3 text-sm font-semibold text-left text-gray-700">NIP</th>
                                        <th class="p-3 text-sm font-semibold text-left text-gray-700">No. WhatsApp</th>
                                        <th class="p-3 text-sm font-semibold text-left text-gray-700">Jabatan</th>
                                        <th class="p-3 text-sm font-semibold text-left text-gray-700">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($people as $person)
                                        <tr class="border-t hover:bg-gray-50">
                                            <td class="p-3 text-sm text-gray-800">{{ $person->name }}</td>
                                            <td class="p-3 text-sm text-gray-800">{{ $person->rfid }}</td>
                                            <td class="p-3 text-sm text-gray-800">{{ $person->nip }}</td>
                                            <td class="p-3 text-sm text-gray-800">{{ $person->no_wa }}</td>
                                            <td class="p-3 text-sm text-gray-800">
                                                <span
                                                    class="px-2 py-1 text-xs text-white 
                                                    {{ $person->jabatan == 'guru'
                                                        ? 'bg-blue-500'
                                                        : ($person->jabatan == 'kepala sekolah'
                                                            ? 'bg-purple-500'
                                                            : ($person->jabatan == 'wakil kepala sekolah'
                                                                ? 'bg-green-500'
                                                                : ($person->jabatan == 'staff'
                                                                    ? 'bg-gray-500'
                                                                    : 'bg-orange-500'))) }} 
                                                    rounded-full">
                                                    {{ ucfirst($person->jabatan) }}
                                                </span>
                                            </td>
                                            <td class="p-3 text-sm">
                                                <div class="flex space-x-2">
                                                    <button wire:click="edit({{ $person->id }})"
                                                        class="px-3 py-1 text-xs text-white transition bg-indigo-500 rounded hover:bg-indigo-600">
                                                        Edit
                                                    </button>
                                                    <button wire:click="delete({{ $person->id }})"
                                                        wire:confirm="Hapus data guru ini?"
                                                        class="px-3 py-1 text-xs text-white transition bg-red-500 rounded hover:bg-red-600">
                                                        Hapus
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="p-10 text-lg text-center text-gray-600">
                                                Data Guru Tidak Ditemukan
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="px-6 py-3 border-t">
                        {{ $people->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </section>
    </main>

    <livewire:edit-password-modal />
</div>

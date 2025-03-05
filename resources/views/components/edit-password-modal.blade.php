<div>
        <div x-show="$wire.isOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" x-cloak>
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <!-- Background overlay -->
                <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75 backdrop-blur-sm" aria-hidden="true"
                    wire:click="$set('isOpen', false)"></div>

            <!-- Modal Panel -->
            <div
                class="relative inline-block overflow-hidden text-left align-bottom transition-all transform bg-white shadow-xl rounded-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form wire:submit="updatePassword" class="px-6 pt-5 pb-4 bg-white sm:p-6">
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold text-gray-900" id="modal-title">
                            Ubah Password
                        </h3>
                        <p class="mt-2 text-sm text-gray-600">
                            Masukkan password baru anda dan konfirmasinya secara sama.
                        </p>
                    </div>

                    <div class="space-y-6">
                        <!-- New Password -->
                        <div class="relative">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">
                                Password baru
                            </label>
                            <div class="relative rounded-md shadow-sm">
                                <input type="password" wire:model="password" id="password"
                                    class="block w-full px-4 py-3 text-sm transition-all duration-200 border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="Masukan password baru anda">
                            </div>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="relative">
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">
                                Konfirmasi password baru
                            </label>
                            <div class="relative rounded-md shadow-sm">
                                <input type="password" wire:model="password_confirmation" id="password_confirmation"
                                    class="block w-full px-4 py-3 text-sm transition-all duration-200 border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="Konfirmasi password baru anda">
                            </div>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="gap-3 pt-5 mt-8 border-t border-gray-100 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                            class="inline-flex w-full justify-center items-center px-4 py-2.5 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-lg shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 sm:w-auto">
                            Ubah Password
                        </button>
                        <button type="button" wire:click="$set('isOpen', false)"
                            class="mt-3 inline-flex w-full justify-center items-center px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 sm:mt-0 sm:w-auto">
                            Batalkan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

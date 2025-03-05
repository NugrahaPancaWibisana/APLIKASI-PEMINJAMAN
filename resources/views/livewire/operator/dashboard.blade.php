<div class="w-full h-full">
    <main class="w-full h-screen bg-zinc-100">
        <section class="flex flex-col w-full gap-10 p-10">
            <header class="flex items-center justify-between w-full">
                <img class="w-28" src="{{ asset('images/mrc.png') }}" alt="mrc">
                <livewire:profile />
            </header>

            <!-- Transaction Cards -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- Borrowing Card -->
                <a href="{{route('operator.peminjaman')}}"
                    class="transition-all duration-300 bg-white shadow-md rounded-xl hover:shadow-lg hover:scale-105">
                    <div class="flex p-6">
                        <div class="flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <div class="ml-6">
                            <h3 class="text-xl font-semibold text-gray-800">Peminjaman</h3>
                            <p class="mt-2 text-gray-600">Buat transaksi peminjaman baru</p>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-blue-50 rounded-b-xl">
                        <div class="flex items-center text-blue-600">
                            <span>Mulai Proses</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Return Card -->
                <a href="{{route('operator.pengembalian')}}"
                    class="transition-all duration-300 bg-white shadow-md rounded-xl hover:shadow-lg hover:scale-105">
                    <div class="flex p-6">
                        <div class="flex items-center justify-center w-16 h-16 bg-green-100 rounded-full">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z">
                                </path>
                            </svg>
                        </div>
                        <div class="ml-6">
                            <h3 class="text-xl font-semibold text-gray-800">Pengembalian</h3>
                            <p class="mt-2 text-gray-600">Proses pengembalian item</p>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-green-50 rounded-b-xl">
                        <div class="flex items-center text-green-600">
                            <span>Mulai Proses</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>

        </section>
    </main>

    <livewire:edit-password-modal />
</div>

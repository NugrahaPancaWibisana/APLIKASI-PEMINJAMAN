<div class="w-full h-full">
    <main class="flex items-center justify-center w-full h-full bg-gray-100">
        @if ($currentStep == 1)
            <div class="flex items-center justify-center w-full min-h-screen px-4 py-8">
                <div class="relative w-full h-auto max-w-lg p-4 bg-white rounded-lg shadow-md md:p-8">
                    <div class="flex flex-col items-center w-full gap-2 mb-6 sm:flex-row sm:justify-between">
                        <h2 class="text-xl font-bold text-center text-gray-800 sm:text-2xl sm:text-left">
                            {{ $steps[$currentStep] }}</h2>
                        <a href="{{ route('operator.dashboard') }}" class="font-medium text-blue-600 hover:text-blue-800">
                            @if ($currentStep == 1)
                                Kembali
                            @else
                                Batalkan
                            @endif
                        </a>
                    </div>

                    <input type="text" id="rfid-input" class="absolute w-0 h-0 opacity-0"
                        wire:model.live.debounce.500ms="rfid" autocomplete="off" autofocus>

                    <div class="flex flex-col items-center justify-center py-4 space-y-4 md:space-y-6">
                        <div
                            class="relative flex flex-col overflow-hidden bg-gray-200 rounded-lg shadow-lg w-44 h-44 sm:w-52 sm:h-52 md:w-64 md:h-64">
                            <div class="flex flex-col items-center justify-center p-3 bg-blue-100 h-3/4 md:p-4">
                                @if ($status === 'success')
                                    <div class="text-center">
                                        <div
                                            class="flex items-center justify-center mx-auto mb-2 bg-green-500 rounded-full w-14 h-14 sm:w-16 sm:h-16 md:w-20 md:h-20">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-8 h-8 text-white sm:w-10 sm:h-10 md:w-12 md:h-12"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <h4 class="text-sm font-semibold text-gray-800 sm:text-base md:text-lg">
                                            {{ $person->name }}
                                        </h4>
                                    </div>
                                @elseif ($status === 'error')
                                    <div class="text-center">
                                        <div
                                            class="flex items-center justify-center mx-auto mb-2 bg-red-500 rounded-full w-14 h-14 sm:w-16 sm:h-16 md:w-20 md:h-20">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-8 h-8 text-white sm:w-10 sm:h-10 md:w-12 md:h-12"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </div>
                                        <p class="text-xs text-red-600 md:text-sm">{{ $message }}</p>
                                    </div>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-16 h-16 text-blue-500 sm:w-20 sm:h-20 md:w-24 md:h-24" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @endif
                            </div>

                            <!-- Scan Area -->
                            <div class="flex items-center justify-center bg-gray-700 h-1/4">
                                <div class="flex items-center space-x-1 md:space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-3 h-3 text-white sm:w-4 sm:h-4 animate-pulse md:w-5 md:h-5"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                                    </svg>
                                    <span class="text-xs font-medium text-white md:text-sm">Scan RFID</span>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            @if ($status === 'scanning')
                                <p class="mb-1 text-xs text-blue-600 sm:text-sm md:text-base">Memproses RFID...</p>
                            @elseif ($status === 'success')
                                <p class="mb-1 text-xs text-green-600 sm:text-sm md:text-base">{{ $message }}</p>
                            @elseif ($status === 'error')
                                <p class="mb-1 text-xs text-red-600 sm:text-sm md:text-base">{{ $message }}</p>
                            @else
                                <p class="mb-1 text-xs text-gray-600 sm:text-sm md:text-base">Silahkan scan kartu RFID
                                    anda</p>
                                <p class="text-xs text-gray-500 md:text-sm">Scanner akan otomatis mendeteksi kartu</p>
                            @endif
                        </div>

                        <div class="{{ $status === 'scanning' ? 'block' : 'hidden' }}">
                            <div class="flex items-center space-x-2">
                                <svg class="w-3 h-3 text-blue-600 sm:w-4 sm:h-4 animate-spin md:w-5 md:h-5"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <span class="text-xs font-medium text-blue-600 md:text-sm">Memproses...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif ($currentStep == 2)
            <div class="flex items-center justify-center w-full h-full p-4 sm:p-6 md:p-10">
                <div class="w-full max-w-5xl p-4 mx-auto bg-white rounded-lg shadow-sm sm:p-6">
                    <!-- Header Section -->
                    <div
                        class="flex flex-col justify-between w-full gap-3 pb-4 mb-6 border-b sm:flex-row sm:items-center sm:mb-8">
                        <h2 class="text-xl font-bold text-gray-800 sm:text-2xl">{{ $steps[$currentStep] }}</h2>
                        <a href="{{ route('operator.dashboard') }}"
                            class="px-4 py-2 font-medium text-blue-600 transition-colors duration-200 hover:text-blue-800">
                            @if ($currentStep == 1)
                                <span class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Kembali
                                </span>
                            @else
                                <span class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Batalkan
                                </span>
                            @endif
                        </a>
                    </div>

                    <!-- Peminjam Information -->
                    <div class="p-3 mb-4 border border-gray-200 rounded-lg sm:p-4 sm:mb-6 bg-gray-50">
                        <h3 class="text-base font-medium text-gray-800 sm:text-lg">
                            <span class="inline-block mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="inline w-4 h-4 text-gray-600 sm:w-5 sm:h-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            Nama Peminjam: <span class="font-bold">{{ $person->name }}</span>
                        </h3>
                    </div>

                    <!-- Search Box -->
                    <div class="mt-4 mb-4 sm:mt-6 sm:mb-6">
                        <div class="relative">
                            <input type="text" wire:model.live.debounce.300ms="search"
                                placeholder="Cari Barang..."
                                class="w-full p-2 pl-10 text-sm transition-all duration-200 border border-gray-300 rounded-lg shadow-sm sm:p-3 sm:text-base focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                        </div>
                    </div>

                    <!-- Inventory List -->
                    <div class="mb-6 sm:mb-8">
                        <h3 class="mb-3 text-base font-semibold text-gray-800 sm:mb-4 sm:text-lg">Daftar Barang
                            Tersedia</h3>
                        <div
                            class="p-2 overflow-x-auto border border-gray-100 rounded-lg scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200">
                            <div class="flex gap-3 py-2 pb-4 overflow-x-auto sm:gap-4">
                                @forelse($this->filteredBarangs as $barang)
                                    <div
                                        class="flex flex-col items-center min-w-[160px] sm:min-w-[180px] md:min-w-[220px] p-3 sm:p-4 bg-white rounded-lg shadow-sm border border-gray-200 transition-all duration-200 hover:shadow-md">
                                        <!-- Image Container - Consistent Size -->
                                        @if ($barang->image)
                                            <img src="{{ asset('storage/' . $barang->image) }}"
                                                alt="{{ $barang->nama }}"
                                                class="object-cover w-24 h-24 border border-gray-200 rounded-md sm:w-28 sm:h-28 md:w-32 md:h-32">
                                        @else
                                            <div
                                                class="flex items-center justify-center w-24 h-24 bg-gray-100 border border-gray-200 rounded-md sm:w-28 sm:h-28 md:w-32 md:h-32">
                                                <svg class="w-8 h-8 text-gray-400 sm:w-10 sm:h-10 md:w-12 md:h-12"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif

                                        <!-- Item Name - Consistent Height with line clamp -->
                                        <p
                                            class="mt-3 text-sm font-semibold text-center text-gray-800 sm:text-base line-clamp-2 min-h-[2.5rem] sm:min-h-[3rem]">
                                            {{ $barang->nama }}@if ($barang->tipe)
                                                - {{ $barang->tipe }}
                                            @endif
                                        </p>

                                        <!-- Availability Info - Consistent Style -->
                                        <div
                                            class="flex items-center justify-center w-full mt-1 text-xs text-gray-600 sm:text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1 sm:w-4 sm:h-4"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                                            </svg>
                                            Tersedia: <span
                                                class="ml-1 font-medium">{{ $barang->stok - ($selectedItems[$barang->id]['quantity'] ?? 0) }}</span>
                                        </div>

                                        <!-- Action Buttons - Consistent Height and Styling -->
                                        <div class="w-full mt-3 sm:mt-4 min-h-[32px] sm:min-h-[40px]">
                                            @if (isset($selectedItems[$barang->id]))
                                                <div class="flex items-center justify-center gap-2 sm:gap-3">
                                                    <button wire:click="decrementItem({{ $barang->id }})"
                                                        class="px-2 py-1 text-white transition-colors duration-200 bg-gray-500 rounded-md sm:px-3 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 20 20"
                                                            fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                    <span
                                                        class="w-5 text-base font-medium text-center sm:w-6 sm:text-lg">{{ $selectedItems[$barang->id]['quantity'] }}</span>
                                                    <button wire:click="incrementItem({{ $barang->id }})"
                                                        class="px-2 py-1 text-white transition-colors duration-200 bg-blue-500 rounded-md sm:px-3 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                                        @disabled($selectedItems[$barang->id]['quantity'] >= $barang->stok)>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 20 20"
                                                            fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            @else
                                                <button wire:click="addItem({{ $barang->id }})"
                                                    class="flex items-center justify-center w-full gap-1 px-2 py-1 text-xs text-white transition-colors duration-200 bg-blue-500 rounded-md sm:gap-2 sm:px-4 sm:py-2 sm:text-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 disabled:opacity-50 disabled:cursor-not-allowed"
                                                    @disabled($barang->stok <= 0)>
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Pinjam
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                @empty
                                    <div class="w-full p-4 text-center text-gray-500 rounded-lg sm:p-8 bg-gray-50">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-8 h-8 mx-auto mb-2 text-gray-400 sm:w-12 sm:h-12 sm:mb-3"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <p class="text-base sm:text-lg">Tidak ada barang ditemukan.</p>
                                        <p class="mt-1 text-xs text-gray-400 sm:text-sm">Coba gunakan kata kunci
                                            pencarian yang berbeda.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Selected Items -->
                    <div class="p-4 mt-6 border border-gray-200 rounded-lg sm:p-6 sm:mt-8 bg-gray-50">
                        <h3 class="flex items-center mb-3 text-base font-semibold text-gray-800 sm:mb-4 sm:text-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-gray-600 sm:w-5 sm:h-5"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                            </svg>
                            Barang Dipilih
                            @if (count($selectedItems) > 0)
                                <span
                                    class="ml-2 px-2 py-0.5 bg-gray-200 text-gray-800 text-xs font-medium rounded-full">{{ count($selectedItems) }}</span>
                            @endif
                        </h3>
                        @if (count($selectedItems) > 0)
                            <div class="mt-3 space-y-2 sm:mt-4 sm:space-y-3">
                                @foreach ($selectedItems as $item)
                                    <div
                                        class="flex flex-col gap-2 p-3 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex-row sm:items-center sm:justify-between sm:p-4">
                                        <span
                                            class="text-sm font-medium text-gray-800 sm:text-base">{{ $item['nama'] }}
                                            <span
                                                class="ml-1 sm:ml-2 px-1.5 sm:px-2.5 py-0.5 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">x{{ $item['quantity'] }}</span>
                                        </span>
                                        <div class="flex gap-2 mt-2 sm:mt-0">
                                            <button wire:click="decrementItem({{ $item['id'] }})"
                                                class="flex items-center px-2 py-1 text-xs text-white transition-colors duration-200 bg-gray-500 rounded-md sm:px-3 sm:text-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 sm:w-4 sm:h-4"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                            <button wire:click="incrementItem({{ $item['id'] }})"
                                                class="flex items-center px-2 py-1 text-xs text-white transition-colors duration-200 bg-blue-500 rounded-md sm:px-3 sm:text-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                                @disabled($item['quantity'] >= $item['max_stok'])>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 sm:w-4 sm:h-4"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-4 text-right sm:mt-6">
                                <button wire:click="nextStep"
                                    class="px-4 py-2 text-sm font-medium text-white transition-colors duration-200 bg-blue-600 rounded-md shadow-md sm:px-6 sm:py-3 sm:text-base hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                                    Lanjutkan Peminjaman
                                </button>
                            </div>
                        @else
                            <div
                                class="p-4 text-center text-gray-500 bg-white border border-gray-100 rounded-lg sm:p-8">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-8 h-8 mx-auto mb-2 text-gray-400 sm:w-12 sm:h-12 sm:mb-3" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                                <p class="text-base sm:text-lg">Belum ada barang dipilih.</p>
                                <p class="mt-1 text-xs text-gray-400 sm:text-sm">Silakan pilih barang dari daftar di
                                    atas.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @elseif ($currentStep == 3)
            <div class="flex items-center justify-center w-full h-full p-4 sm:p-6 md:p-10">
                <div class="w-full max-w-5xl p-4 mx-auto bg-white rounded-lg shadow-sm sm:p-6">
                    <!-- Header Section -->
                    <div
                        class="flex flex-col justify-between w-full gap-3 pb-4 mb-6 border-b sm:flex-row sm:items-center sm:mb-8">
                        <h2 class="text-xl font-bold text-gray-800 sm:text-2xl">{{ $steps[$currentStep] }}</h2>
                        <a href="{{ route('operator.dashboard') }}"
                            class="px-4 py-2 font-medium text-blue-600 transition-colors duration-200 hover:text-blue-800">
                            @if ($currentStep == 1)
                                <span class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Kembali
                                </span>
                            @else
                                <span class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Batalkan
                                </span>
                            @endif
                        </a>
                    </div>

                    <!-- Peminjam Information -->
                    <div class="p-3 mb-4 border border-gray-200 rounded-lg sm:p-4 sm:mb-6 bg-gray-50">
                        <h3 class="text-base font-medium text-gray-800 sm:text-lg">
                            <span class="inline-block mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="inline w-4 h-4 text-gray-600 sm:w-5 sm:h-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            Nama Peminjam: <span class="font-bold">{{ $person->name }}</span>
                        </h3>
                    </div>

                    <!-- Barang yang Dipinjam -->
                    <div class="flex items-start gap-2 overflow-x-auto rounded-lg">
                        <p class="py-1 font-medium text-gray-700 whitespace-nowrap">Barang yang dipinjam:</p>
                        <div class="flex flex-wrap gap-2">
                            @forelse ($selectedItems as $item)
                                <div
                                    class="flex items-center px-3 py-1 bg-white border border-gray-300 rounded-full shadow-sm whitespace-nowrap">
                                    <span class="font-medium">{{ $item['nama'] }}@if ($item['tipe'])
                                            - {{ $item['tipe'] }}
                                        @endif
                                    </span>
                                    <span class="ml-1 text-gray-600">× {{ $item['quantity'] }}</span>
                                </div>
                            @empty
                                <div
                                    class="flex items-center px-3 py-1 bg-white border border-gray-300 rounded-full shadow-sm whitespace-nowrap">
                                    <p class="italic text-gray-500">Belum ada barang yang dipilih</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Form Keperluan dan Lama Pinjam -->
                    <form wire:submit='savePeminjaman'>
                        <div class="flex flex-col gap-4 mt-6">
                            <!-- Keperluan Field -->
                            <div class="flex-1 rounded-lg">
                                <label for="keperluan"
                                    class="block mb-2 text-sm font-medium text-gray-700">Keperluan:</label>
                                <textarea id="keperluan" wire:model="keperluan" rows="3"
                                    class="w-full px-3 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Masukkan keperluan peminjaman..." required></textarea>
                                @error('keperluan')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Lama Pinjam Field -->
                            <div class="flex-1 rounded-lg">
                                <label for="lama_pinjam" class="block mb-2 text-sm font-medium text-gray-700">Berapa
                                    lama
                                    dipinjam: </label>
                                <input type="date" id="lama_pinjam" wire:model="lama_pinjam"
                                    class="w-full px-3 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    min="{{ date('Y-m-d') }}" required>
                                @error('lama_pinjam')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-between mt-6">
                            <button wire:click="previousStep"
                                class="px-4 py-2 text-sm font-medium text-white transition-colors duration-200 bg-gray-600 rounded-md shadow-md sm:px-6 sm:py-3 sm:text-base hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                                Kembali
                            </button>
                            <button type="submit" id="submitForm"
                                class="px-4 py-2 text-white transition-colors duration-200 bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed"
                                wire:target="savePeminjaman">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @elseif ($currentStep == 4)
            <div class="flex items-center justify-center w-full h-full p-4 sm:p-6 md:p-10">
                <div class="relative w-full h-auto max-w-lg p-4 bg-white rounded-lg shadow-md md:p-8">
                    <div class="flex flex-col items-center justify-center py-4 space-y-4 md:space-y-6">
                        <div
                            class="relative flex flex-col overflow-hidden bg-gray-200 rounded-lg shadow-lg w-44 h-44 sm:w-52 sm:h-52 md:w-64 md:h-64">
                            <div class="flex flex-col items-center justify-center p-3 bg-blue-100 h-3/4 md:p-4">
                                @if ($status === 'success')
                                    <div class="text-center">
                                        <div
                                            class="flex items-center justify-center mx-auto mb-2 bg-green-500 rounded-full w-14 h-14 sm:w-16 sm:h-16 md:w-20 md:h-20">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-8 h-8 text-white sm:w-10 sm:h-10 md:w-12 md:h-12"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <h4 class="text-sm font-semibold text-gray-800 sm:text-base md:text-lg">
                                            {{ $person->name }}
                                        </h4>
                                    </div>
                                @elseif ($status === 'error')
                                    <div class="text-center">
                                        <div
                                            class="flex items-center justify-center mx-auto mb-2 bg-red-500 rounded-full w-14 h-14 sm:w-16 sm:h-16 md:w-20 md:h-20">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-8 h-8 text-white sm:w-10 sm:h-10 md:w-12 md:h-12"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </div>
                                        <p class="text-xs text-red-600 md:text-sm">{{ $message }}</p>
                                    </div>
                                @else
                                    <div class="flex items-center justify-center w-full h-full">
                                        <svg class="w-12 h-12 text-blue-600 animate-spin"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <!-- Scan Area -->
                            <div class="flex items-center justify-center bg-gray-700 h-1/4">
                                <div class="flex items-center space-x-1 md:space-x-2">
                                    <span class="text-xs font-medium text-white md:text-sm">
                                        @if ($status === 'success')
                                            Pengembalian Berhasil
                                        @elseif ($status === 'error')
                                            Gagal Memproses
                                        @else
                                            Memproses Pengembalian...
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            @if ($status === 'success')
                                <p class="mb-1 text-xs text-green-600 sm:text-sm md:text-base">{{ $message }}</p>
                            @elseif ($status === 'error')
                                <p class="mb-1 text-xs text-red-600 sm:text-sm md:text-base">{{ $message }}</p>
                            @else
                                <p class="mb-1 text-xs text-blue-600 sm:text-sm md:text-base">Sedang memproses
                                    pengembalian...</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rfidInput = document.getElementById('rfid-input');
            if (rfidInput) {
                rfidInput.focus();

                document.addEventListener('click', function() {
                    rfidInput.focus();
                });

                document.addEventListener('visibilitychange', function() {
                    if (!document.hidden) {
                        rfidInput.focus();
                    }
                });

                rfidInput.addEventListener('input', function() {
                    if (rfidInput.value.length >= 8) {
                        setTimeout(() => {
                            @this.call('processRfid');
                        }, 200);
                    }
                });
            }
        });

        document.addEventListener('livewire:initialized', () => {
            @this.on('resetAfterDelay', () => {
                setTimeout(() => {
                    @this.resetFormRFID();
                    const rfidInput = document.getElementById('rfid-input');
                    if (rfidInput) rfidInput.focus();
                }, 3000);
            });
        });

        document.addEventListener('livewire:initialized', () => {
            Livewire.on('peminjaman-saved', () => {
                setTimeout(() => {
                    @this.currentStep = 1;
                    @this.person = null;
                    @this.selectedItems = [];
                    window.location.href = "{{ route('operator.dashboard') }}";
                }, 3000);
            });
        });
    </script>
</div>

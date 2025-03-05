<nav class="fixed top-0 left-0 flex flex-col w-64 h-full bg-white border-r">
    <div class="flex items-center justify-center h-32 p-10 border-b">
        <img class="p-5" src="{{ asset('images/mrc.png') }}" alt="mrc">
    </div>
    <div class="flex-grow overflow-x-hidden overflow-y-auto">
        <ul class="flex flex-col py-4 space-y-1">
            <li class="px-5">
                <div class="flex flex-row items-center h-8">
                    <div class="text-sm font-light tracking-wide text-gray-500">Menu</div>
                </div>
            </li>
            <li>
                <a href="{{ route('admin.dashboard') }}" wire:current="bg-indigo-50 text-gray-800"
                    class="relative flex flex-row items-center pr-6 text-gray-600 border-l-4 border-transparent h-11 focus:outline-none hover:bg-indigo-50 hover:text-gray-800">
                    <span class="inline-flex items-center justify-center ml-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                </a>
            </li>
            <li class="px-5">
                <div class="flex flex-row items-center h-8">
                    <div class="text-sm font-light tracking-wide text-gray-500">Kelola Data</div>
                </div>
            </li>
            <li>
                <a href="{{ route('admin.barang') }}" wire:current="bg-indigo-50 text-gray-800"
                    class="relative flex flex-row items-center pr-6 text-gray-600 border-l-4 border-transparent h-11 focus:outline-none hover:bg-indigo-50 hover:text-gray-800">
                    <span class="inline-flex items-center justify-center ml-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                            </path>
                        </svg>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Barang</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.guru') }}" wire:current="bg-indigo-50 text-gray-800"
                    class="relative flex flex-row items-center pr-6 text-gray-600 border-l-4 border-transparent h-11 focus:outline-none hover:bg-indigo-50 hover:text-gray-800">
                    <span class="inline-flex items-center justify-center ml-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Guru</span>
                </a>
            </li>
            <li class="px-5">
                <div class="flex flex-row items-center h-8">
                    <div class="text-sm font-light tracking-wide text-gray-500">Tampilkan Data</div>
                </div>
            </li>
            <li>
                <a href="{{ route('admin.peminjaman') }}" wire:current="bg-indigo-50 text-gray-800"
                    class="relative flex flex-row items-center pr-6 text-gray-600 border-l-4 border-transparent h-11 focus:outline-none hover:bg-indigo-50 hover:text-gray-800">
                    <span class="inline-flex items-center justify-center ml-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Peminjaman</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.history') }}" wire:current="bg-indigo-50 text-gray-800"
                    class="relative flex flex-row items-center pr-6 text-gray-600 border-l-4 border-transparent h-11 focus:outline-none hover:bg-indigo-50 hover:text-gray-800">
                    <span class="inline-flex items-center justify-center ml-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>

                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Riwayat</span>
                </a>
            </li>
            <li class="px-5">
                <div class="flex flex-row items-center h-8">
                    <div class="text-sm font-light tracking-wide text-gray-500">Action</div>
                </div>
            </li>
            <button wire:click="logout"
                class="relative flex flex-row items-center pr-6 text-gray-600 border-l-4 border-transparent h-11 focus:outline-none hover:bg-indigo-50 hover:text-gray-800">
                <span class="inline-flex items-center justify-center ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Logout</span>
            </button>
        </ul>
    </div>
</nav>

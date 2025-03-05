<div class="relative" x-data>
    <button wire:click="toggleDropdown" @click.outside="$wire.isOpen = false"
        class="flex items-center gap-2 px-4 py-2 text-white transition-colors duration-200 bg-indigo-500 rounded-md hover:bg-indigo-600">
        <span>{{ Auth::user()->username }}</span>
        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="$wire.isOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
        class="absolute right-0 z-50 w-48 mt-2 bg-white border rounded-md shadow-lg" style="display: none;">
        <ul class="py-1">
            <li>
                <button wire:click="openPasswordModal"
                    class="block w-full px-4 py-2 text-left text-gray-700 transition-colors duration-200 hover:bg-gray-100">
                    Ubah Password
                </button>
            </li>
            <li>
                <hr class="border-gray-200">
            </li>
            <li>
                <button wire:click="logout"
                    class="w-full px-4 py-2 text-left text-gray-700 transition-colors duration-200 hover:bg-gray-100">
                    Logout
                </button>
            </li>
        </ul>
    </div>
</div>

<div>
    @if ($show)
        <div x-data="{
            show: @entangle('show'),
            init() {
                setTimeout(() => this.show = false, 3000)
            }
        }" x-show="show" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-[-1rem]"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform translate-y-[-1rem]"
            class="fixed z-50 flex items-center gap-3 p-4 border shadow-lg top-4 right-4 rounded-xl backdrop-blur-sm"
            :class="{
                'bg-green-50/90 dark:bg-green-950/90 border-green-200 dark:border-green-800': '{{ $type }}'
                === 'success',
                'bg-red-50/90 dark:bg-red-950/90 border-red-200 dark:border-red-800': '{{ $type }}'
                === 'error'
            }"
            role="alert">
            {{-- Icon container --}}
            <div class="shrink-0"
                :class="{
                    'text-green-600 dark:text-green-400': '{{ $type }}'
                    === 'success',
                    'text-red-600 dark:text-red-400': '{{ $type }}'
                    === 'error'
                }">
                @if ($type === 'success')
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                @else
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                @endif
            </div>

            {{-- Message --}}
            <div class="flex-1 text-sm font-medium"
                :class="{
                    'text-green-800 dark:text-green-200': '{{ $type }}'
                    === 'success',
                    'text-red-800 dark:text-red-200': '{{ $type }}'
                    === 'error'
                }">
                {{ $message }}
            </div>

            {{-- Progress bar --}}
            <div class="absolute bottom-0 left-0 h-1 transition-all duration-3000 rounded-b-xl"
                :class="{
                    'bg-green-500/20 dark:bg-green-400/20': '{{ $type }}'
                    === 'success',
                    'bg-red-500/20 dark:bg-red-400/20': '{{ $type }}'
                    === 'error'
                }"
                style="animation: progress 3s linear forwards; width: 100%;">
            </div>

            {{-- Close button --}}
            <button wire:click="dismiss" class="shrink-0 rounded-lg p-1.5 transition-colors duration-200"
                :class="{
                    'text-green-600 hover:bg-green-200/50 dark:text-green-400 dark:hover:bg-green-800/50': '{{ $type }}'
                    === 'success',
                    'text-red-600 hover:bg-red-200/50 dark:text-red-400 dark:hover:bg-red-800/50': '{{ $type }}'
                    === 'error'
                }">
                <span class="sr-only">Close</span>
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    <style>
        @keyframes progress {
            from {
                width: 100%;
            }

            to {
                width: 0%;
            }
        }
    </style>
</div>

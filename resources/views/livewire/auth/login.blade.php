<main class="flex items-center justify-center w-full h-screen">
    <section
        class="flex flex-col w-[90%] md:w-[50%] lg:w-[30%] p-8 bg-white rounded-xl border border-gray-300 shadow-md">
        <form class="flex flex-col w-full gap-6" wire:submit="login">
            @csrf

            <div class="text-center">
                <p class="text-2xl font-bold">Masukkan Akun Anda</p>
            </div>

            <!-- Username Input -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input wire:model="username" type="text" id="username"
                    class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('username') border-red-500 @enderror">
                @error('username')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input wire:model="password" type="password" id="password"
                    class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- General Error Message -->
            @error('status')
                <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror

            <!-- Submit Button -->
            <button type="submit" class="w-full py-2 text-white bg-indigo-700 rounded-md hover:bg-indigo-600">
                Login
            </button>
        </form>
    </section>
</main>

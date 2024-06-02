<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- logo -->
        <div class="flex justify-center mb-3 mt-3">
            <img src="{{ asset('dist/img/logo.png') }}" alt="logo" width="300">
        </div>

        <!-- text -->
        <div class="mb-3">
            <h3 class="text-center text-2xl font-bold">Selamat Datang Kembali</h3>
        </div>

        <!-- text2 -->
        <div class="mb-3">
            <h4 class="text-center">Pendataan Anak Training SMK Triatma Jaya Dalung</h4>
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <!-- Tambahkan checkbox untuk fitur lihat password -->
            <input type="checkbox" id="show-password" onchange="togglePasswordVisibility()">
            <label for="show-password">Lihat Password</label>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <script>
            function togglePasswordVisibility() {
                var passwordField = document.getElementById("password");
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                } else {
                    passwordField.type = "password";
                }
            }
        </script>


        <!-- Remember Me -->
        {{-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Ingat Saya') }}</span>
            </label>
        </div> --}}

        <div class="flex items-center justify-end mt-4">
            {{-- @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @endif --}}

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

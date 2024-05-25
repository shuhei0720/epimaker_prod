<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="container-fluid">
            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('auth.google') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full flex items-center justify-center transition duration-300 ease-in-out w-full">
                    <img src="{{ asset('img/google.png') }}" alt="Google Logo" class="w-6 h-6 mr-2">
                    {{ __('Googleアカウントでログイン') }}
                </a>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('auth.line') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full flex items-center justify-center transition duration-300 ease-in-out w-full">
                    <img src="{{ asset('img/line.png') }}" alt="LINE Logo" class="w-6 h-6 mr-2">
                    {{ __('LINEアカウントでログイン') }}
                </a>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('auth.twitter') }}" class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded-full flex items-center justify-center transition duration-300 ease-in-out w-full">
                    <img src="{{ asset('img/X.png') }}" alt="X Logo" class="w-6 h-6 mr-2">
                    {{ __('Xアカウントでログイン') }}
                </a>
            </div>
        </div>

        

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        
    </form>
</x-guest-layout>
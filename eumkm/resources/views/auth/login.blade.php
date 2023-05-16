@section('title', 'Login')

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="{{ url('images/logo.svg') }}" alt="E-UMKM">
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <div>
                    <label for="remember_me" class="flex items-center cursor-pointer">
                        <x-checkbox id="remember_me" name="remember" class="cursor-pointer" />
                        <span class="ml-2 text-sm text-orange-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div>
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-orange-500 hover:text-orange-600" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
                </div>
            </div>

            <div class="flex justify-between mt-4">
                <a href="{{ route('register') }}">
                    <x-secondary-button>
                        {{ __('Register') }}
                    </x-secondary-button>
                </a>

                <x-button>
                    Login
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
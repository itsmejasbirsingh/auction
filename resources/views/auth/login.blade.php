<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <div class="sm:max-w-sm mx-auto">
            <h2 class="sign text-center text-base font-semibold mb-4 yvn-head-color">Sign In</h2>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: red; text-align: center; font-weight: 700" class="mt-2 mb-2">{{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (app('request')->input('registration') === 'success')
                <div style="display: flex; flex-direction:column; align-items: center">
                    <p>Account has been created successfully</p>
                    <p>Your account is under review</p>
                    <form method="GET" action="{{ route('login') }}">
                        <x-button class="mt-4">
                            {{ __('Back to Log in') }}
                        </x-button>
                    </form>
                </div>
            @else
                <form method="POST" action="{{ route('login') }}" id="base-login-form">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        {{-- <x-label for="email" :value="__('Email')" /> --}}

                        <x-input id="email" class="block mt-1 w-full yvn-input" placeholder="Email" type="email" name="email" :value="old('email')"
                            required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        {{-- <x-label for="password" :value="__('Password')" /> --}}

                        <x-input id="password" class="block mt-1 w-full yvn-input" placeholder="Password" type="password" name="password" required
                            autocomplete="current-password" />
                    </div>

                    <!-- Remember Me -->
                    {{-- <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div> --}}

                    <div class="flex items-center justify-between mt-4">

                        <div>
                            @if (Route::has('password.request'))
                                <a class="text-sm yvn-blue hover:underline" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                        <div>
                            @if (Route::has('register'))
                                <a class="text-sm yvn-blue hover:underline" href="{{ route('register') }}">
                                    {{ __('Register a new account') }}
                                </a>
                            @endif
                        </div>
                    </div>    

                    <div class="flex items-center justify-center mt-8">
                        <button type="submit" class="button-primary btn btn-primary btn-block btn-large">Login</button>
                        {{-- <x-button class="ml-3 sbmt">
                            {{ __('Log in') }}
                        </x-button> --}}
                    </div>
                </form>
            @endif
        </div>

    </x-auth-card>
</x-guest-layout>
<script>
    $(document).ready(function() {
        $('#base-login-form').validate();
    });
</script>

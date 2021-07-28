@extends("layout")
@section("main")
    <div class="login_register" style="">
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <div >
                    <x-jet-label style="color: white"  for="email" value="{{ __('Email') }}" />
                </div>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div>
                <div>
                    <x-jet-label style="color: white" for="password" value="{{ __('Password') }}" />
                </div>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center" style="padding-left: 10px">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span  style="color: white" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4" style="padding-left: 10px">
                @if (Route::has('password.request'))
                    <a style="color: white" class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4 btn btn-primary" >
                    {{ __('Log in') }}
                </x-jet-button>

            </div>
        </form>
    </div>


@endsection




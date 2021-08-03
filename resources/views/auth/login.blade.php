<x-guest-layout>
    @section('page-title')
        Login
    @endsection

    
    <x-jet-authentication-card>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="employeeId" value="{{ __('Employee ID') }}" />
                <x-jet-input id="employeeId" class="block mt-1 w-full" type="text" name="employeeId" :value="old('employeeId')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
               {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
        {{--<p id="jqry">Developed by <span>J Q R Y</span></p>--}}
        <p style="font-size: 10px; letter-spacing: 1px; text-align: center;">Copyright &copy; 2021</p>
    </x-jet-authentication-card>
    
</x-guest-layout>

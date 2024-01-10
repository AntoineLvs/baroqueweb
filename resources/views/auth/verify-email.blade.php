// resources\views\auth\verify-email.blade.php

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card py-4">
                <div class="card-body">
                    // Inform user after click resend verification email button is successful <--- this
                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success text-center">A new email verification link has been emailed to you!</div>
                    @endif
                    <div class="text-center mb-5">
                        // Instructions for new users <--- this
                        <h3>Verify e-mail address</h3>
                        <p>You must verify your email address to access this page.</p>
                    </div>
                    <form method="POST" action="{{ route('verification.send') }}" class="text-center">
                        @csrf
                        <button type="submit" class="btn btn-primary">Resend verification email</button>
                    </form>
                </div>
                // Optional: Add this link to let user clear browser cache <--- this
                <p class="mt-3 mb-0 text-center"><small>Issues with the verification process or entered the wrong email?
                    <br>Please sign up with <a href="/register-retry">another</a> email address.</small></p>
            </div>
        </div>
    </div>
</div>
@endsection



<!-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout> -->

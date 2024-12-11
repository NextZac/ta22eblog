@extends('partials.layout')
@section('title', 'Profile')
@section('content')
    <div class="container mx-auto space-y-6">
        <div class="card bg-base-300 w-full lg:w-3/4 shadow-xl mx-auto">
            <div class="card-body">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Thanks for Signing Up
                </h2>
                <p class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                </p>
                @if (session('status') == 'verification-link-sent')
                    <p class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        A new verification link has been sent to the email address you provided during registration.
                    </p>
                @endif

                <div class="flex justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Resend Verification Email</button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-ghost">Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

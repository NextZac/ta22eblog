@extends('partials.layout')
@section('title', 'Profile')
@section('content')
    <div class="container mx-auto space-y-6">
        <div class="card bg-base-300 w-full lg:w-3/4 shadow-xl mx-auto">
            <div class="card-body">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Profile Information
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Update your account's profile information and email address.
                </p>
                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>
                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                    <div>
                        <label class="block">
                            <span class="label-text">Name</span>
                            <input id="name" name="name" type="text" class="input input-bordered w-full mt-1" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                        </label>
                        @error('name')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block">
                            <span class="label-text">Email</span>
                            <input id="email" name="email" type="email" class="input input-bordered w-full mt-1" value="{{ old('email', $user->email) }}" required autocomplete="username" />
                        </label>
                        @error('email')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                            <div>
                                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                    Your email address is unverified.
                                    <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                        Click here to re-send the verification email.
                                    </button>
                                </p>
                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                        A new verification link has been sent to your email address.
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                        @if (session('status') === 'profile-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600 dark:text-gray-400"
                            >Saved.</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="card bg-base-300 w-full lg:w-3/4 shadow-xl mx-auto">
            <div class="card-body">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Update Password
                </h2>
                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')

                    <div>
                        <label class="block">
                            <span class="label-text">Current Password</span>
                            <input id="update_password_current_password" name="current_password" type="password" class="input input-bordered w-full mt-1" autocomplete="current-password" required />
                        </label>
                        @error('current_password')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block">
                            <span class="label-text">New Password</span>
                            <input id="update_password_password" name="password" type="password" class="input input-bordered w-full mt-1" autocomplete="new-password" required />
                        </label>
                        @error('password')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block">
                            <span class="label-text">Confirm Password</span>
                            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="input input-bordered w-full mt-1" autocomplete="new-password" required />
                        </label>
                        @error('password_confirmation')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="btn btn-primary">Save</button>

                        @if (session('status') === 'password-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600 dark:text-gray-400"
                            >Saved.</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="card bg-base-300 w-full lg:w-3/4 shadow-xl mx-auto">
            <div class="card-body">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Delete Account
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                    Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
                </p>
                <button class="btn btn-error" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                    Delete Account
                </button>
                <dialog id="confirm-user-deletion" class="modal">
                    <div class="modal-box">
                        <form method="post" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('delete')
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Are you sure you want to delete your account?
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
                            </p>
                            <div class="mt-4">
                                <label class="block">
                                    <span class="label-text">Password</span>
                                    <input id="password" name="password" type="password" class="input input-bordered w-full mt-1" placeholder="Password" required />
                                </label>
                                @error('password')
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="modal-action">
                                <button type="button" class="btn btn-ghost" x-on:click="$dispatch('close')">Cancel</button>
                                <button type="submit" class="btn btn-error">Delete Account</button>
                            </div>
                        </form>
                    </div>
                </dialog>
            </div>
        </div>

        <div class="card bg-base-300 w-full lg:w-3/4 shadow-xl mx-auto">
            <div class="card-body">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Confirm Password
                </h2>
                <p class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    This is a secure area of the application. Please confirm your password before continuing.
                </p>
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <div>
                        <label class="block">
                            <span class="label-text">Password</span>
                            <input id="password" name="password" type="password" class="input input-bordered w-full mt-1" required autocomplete="current-password" />
                        </label>
                        @error('password')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

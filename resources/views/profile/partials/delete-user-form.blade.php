@extends('partials.layout')
@section('title', 'Profile')
@section('content')
    <div class="container mx-auto space-y-6">
        <div class="card bg-base-300 w-full lg:w-3/4 shadow-xl mx-auto">
            <div class="card-body">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Update Profile Information
                </h2>
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="card bg-base-300 w-full lg:w-3/4 shadow-xl mx-auto">
            <div class="card-body">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Update Password
                </h2>
                @include('profile.partials.update-password-form')
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
    </div>
@endsection

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
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection

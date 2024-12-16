@extends('partials.layout')
@section('title', 'Profile')
@section('content')
    <div class="container mx-auto space-y-6">
        @include('profile.partials.update-profile-information-form')
        @include('profile.partials.update-password-form')
        @include('profile.partials.delete-user-form')
    </div>
@endsection

@extends('partials.layout')
@section('title', 'Register')
@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-300 w-1/2 shadow-xl mx-auto">
            <div class="card-body">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Email</span>

                        </div>
                        <input name="email" type="email" placeholder="Email" value="{{old('email')}}" class="input input-bordered @error('email') input-error @enderror w-full" required autofocus autocomplete="email" />
                        <div class="label">
                            @error('email')
                                <span class="label-text-alt text-error">{{$message}}</span>
                            @enderror
                        </div>
                    </label>
                    <div class="flex justify-end items-center gap-2">
                        <input type="submit" class="btn btn-primary" value="Reset Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

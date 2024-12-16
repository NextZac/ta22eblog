
    <div class="card bg-base-300 w-full lg:w-3/4 shadow-xl mx-auto">
        <div class="card-body">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Profile Information
            </h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Update your account's profile information and email address.
            </p>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}" style="display: none;">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')

                <div>
                    <label class="block">
                        <span class="label-text">Name</span>
                        <input id="name" name="name" type="text" class="input input-bordered w-full mt-1" 
                            value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                    </label>
                    @error('name')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block">
                        <span class="label-text">Email</span>
                        <input id="email" name="email" type="email" class="input input-bordered w-full mt-1" 
                            value="{{ old('email', $user->email) }}" required autocomplete="username" />
                    </label>
                    @error('email')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div class="mt-2">
                            <p class="text-sm text-gray-800 dark:text-gray-200">
                                Your email address is unverified.
                                <button form="send-verification" 
                                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
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
                        <p x-data="{ show: true }" 
                           x-show="show" 
                           x-transition 
                           x-init="setTimeout(() => show = false, 2000)" 
                           class="text-sm text-gray-600 dark:text-gray-400">
                           Saved.
                        </p>
                    @endif
                </div>
            </form>
        </div>
    </div>

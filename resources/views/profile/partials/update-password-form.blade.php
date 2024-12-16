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
                        <input id="current_password" 
                               name="current_password" 
                               type="password" 
                               class="input input-bordered w-full mt-1" 
                               autocomplete="current-password" 
                               required />
                    </label>
                    @error('current_password')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </div>
            
                <div>
                    <label class="block">
                        <span class="label-text">New Password</span>
                        <input id="password" 
                               name="password" 
                               type="password" 
                               class="input input-bordered w-full mt-1" 
                               autocomplete="new-password" 
                               required />
                    </label>
                    @error('password')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </div>
            
                <div>
                    <label class="block">
                        <span class="label-text">Confirm Password</span>
                        <input id="password_confirmation" 
                               name="password_confirmation" 
                               type="password" 
                               class="input input-bordered w-full mt-1" 
                               autocomplete="new-password" 
                               required />
                    </label>
                    @error('password_confirmation')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="flex items-center gap-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    @if (session('status') === 'password-updated')
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


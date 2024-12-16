    <div class="card bg-base-300 w-full lg:w-3/4 shadow-xl mx-auto">
        <div class="card-body">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Delete Account
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
            </p>

            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <div class="mt-4">
                    <label class="block">
                        <span class="label-text">Password</span>
                        <input 
                            id="password" 
                            name="password" 
                            type="password" 
                            class="input input-bordered w-full mt-1" 
                            placeholder="Password" 
                            required />
                    </label>
                    @error('password')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="modal-action">
                    <button 
                        type="button" 
                        class="btn btn-ghost" 
                        @click="open = false">
                        Cancel
                    </button>
                    <button 
                        type="submit" 
                        class="btn btn-error">
                        Delete Account
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>

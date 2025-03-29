<x-guest-layout>
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="bg-[#f8f9fc] dark:bg-[#150443] p-12 rounded-md wow animated fadeInUp single-blog-inner style-2">
                <div class="details">
                    <div class="mb-4 text-sm text-gray-600 dark:text-white">
                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                    </div>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-white" />

                            <x-text-input id="password" class="block mt-1 w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 "
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                        </div>

                        <div class="flex justify-end mt-4">
                            <x-primary-button class="text-gray-700 dark:text-white">
                                {{ __('Confirm') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>


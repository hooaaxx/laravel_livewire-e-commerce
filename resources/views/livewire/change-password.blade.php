<div>
    <div class="py-2">
        <div x-data="{ openPass: false }" @keydown.escape="openPass = false">
            <button
                @click="openPass = !openPass"
                class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-sm text-gray-700">Change Password</span>
            </button>

            <!-- start:: Wide Info Modal -->
            <div 
                x-show="openPass" 
                x-transition.opacity
                x-transition:enter.duration.100ms
                x-transition:leave.duration.300ms
                x-cloak
                class="fixed top-0 left-0 z-50 bg-black bg-opacity-70 h-screen w-full flex items-center justify-center"
            >
                <div 
                    @click.away="openPass = false" 
                    class="relative w-5/6 md:w-3/4 lg:w-2/3 xl:w-1/2 bg-white p-10 rounded-lg shadow-xl"
                >
                    <span 
                        @click="openPass = false"
                        class="absolute right-2 top-1 text-xl cursor-pointer hover:text-gray-600"
                        title="Close"
                    >
                        &#x2715
                    </span>
                    <div class="px-2">

                        <!-- start::Header Rounded Top -->
                        
                        <h4 class="text-xl font-semibold">{{ auth()->user()->name }}'s Change Password</h4>

                        <div class="mt-6 grid gap-6">
                            <!-- start::Input Show/Hide Password -->
                            <div class="flex flex-col">
                                <div 
                                    x-data="{ show: false }"
                                    class="relative flex items-center mt-2"
                                >
                                    <input 
                                        :type=" show ? 'text': 'password' "
                                        class="flex-1 py-1 pr-10 border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300" 
                                        placeholder="Current Password"
                                        wire:model="current_password"
                                    >
                                    <button type="button" class="absolute right-2 bg-transparent flex items-center justify-center" @click="show = !show">
                                        <svg x-show="!show"  class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>

                                        <svg x-show="show" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </button>
                                </div>
                            </div>
                            @error('current_password')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                            @enderror
                            <!-- end::Input Show/Hide Password -->
                            @if (Hash::check($current_password, auth()->user()->password))
                                <!-- start::Input Show/Hide Password -->
                                <div class="flex flex-col">
                                    <div 
                                        x-data="{ show: false }"
                                        class="relative flex items-center mt-2"
                                    >
                                        <input 
                                            :type=" show ? 'text': 'password' "
                                            class="flex-1 py-1 pr-10 border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300" 
                                            placeholder="New Password"
                                            wire:model="password"
                                        >
                                        <button type="button" class="absolute right-2 bg-transparent flex items-center justify-center" @click="show = !show">
                                            <svg x-show="!show"  class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>

                                            <svg x-show="show" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        </button>
                                    </div>
                                </div>
                                @error('password')
                                <span class="text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </span>
                                @enderror
                                <!-- end::Input Show/Hide Password -->
                                <!-- start::Input Show/Hide Password -->
                                <div class="flex flex-col">
                                    <div 
                                        x-data="{ show: false }"
                                        class="relative flex items-center mt-2"
                                    >
                                        <input 
                                            :type=" show ? 'text': 'password' "
                                            class="flex-1 py-1 pr-10 border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300" 
                                            placeholder="Confirm Password"
                                            wire:model="password_confirmation"
                                        >
                                        <button type="button" class="absolute right-2 bg-transparent flex items-center justify-center" @click="show = !show">
                                            <svg x-show="!show"  class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>

                                            <svg x-show="show" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        </button>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                <span class="text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </span>
                                @enderror
                                <!-- end::Input Show/Hide Password -->
                            @endif
                            
                        </div>
                        <br>
                        <!-- start::Default Buttons Colors Secondary -->
                        <button
                            wire:click="changepass"
                            x-on:close-modal.window="openPass = false"
                            class="bg-secondary hover:bg-secondary-dark rounded-full px-6 py-1.5 text-gray-100 hover:shadow-xl transition duration-150"
                        >
                            Save
                        </button>
                        <!-- end::Default Buttons Colors Secondary -->
                    </div>
                </div>
            </div>
            <!-- end:: Wide Info Modal -->
        </div>
    </div>
</div>
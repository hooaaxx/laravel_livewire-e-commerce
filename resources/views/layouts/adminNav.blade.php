<!-- start::Topbar -->
<div class="flex flex-col">
    <header class="flex justify-between items-center h-16 py-4 px-6 bg-white">
        <!-- start::Mobile menu button -->
        <div class="flex items-center">
            <button 
                @click="menuOpen = true" 
                class="text-gray-500 hover:text-primary focus:outline-none lg:hidden transition duration-200"
            >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
            </button>
        </div>
        <!-- end::Mobile menu button -->

        <!-- start::Right side top menu -->
        <div class="flex items-center">
            <!-- start::Notifications -->
            <div 
            x-data="{ linkActive: false }"
                class="relative mx-6"
            >
                <!-- start::Main link -->
                <div 
                    @click="linkActive = !linkActive"
                    class="cursor-pointer flex"
                >
                    <svg class="w-6 h-6 cursor-pointer hover:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    {{-- <sub>
                        <span class="bg-red-600 text-gray-100 px-1.5 py-0.5 rounded-full -ml-1 animate-pulse">
                            4
                        </span>
                    </sub> --}}
                </div>
                <!-- end::Main link -->
                
                <!-- start::Submenu -->
                <div 
                    x-show="linkActive"
                    @click.away="linkActive = false"
                    x-cloak
                    class="absolute right-0 w-96 top-11 border border-gray-300 z-10"
                >
                    <!-- start::Submenu content -->
                    <div class="bg-white rounded max-h-96 overflow-y-scroll custom-scrollbar">
                        <!-- start::Submenu header -->
                        <div class="flex items-center justify-between px-4 py-2">
                            <span class="font-bold">Notifications</span>
                            {{-- <span class="text-xs px-1.5 py-0.5 bg-red-600 text-gray-100 rounded">
                                4 new
                            </span> --}}
                        </div>
                        <hr>
                        <!-- end::Submenu header -->
                        <!-- start::Submenu link -->
                        <a 
                            x-data="{ linkHover: false }"
                            href="#"
                            class="flex items-center justify-between py-4 px-3 hover:bg-gray-100 bg-opacity-20"
                            @mouseover="linkHover = true"
                            @mouseleave="linkHover = false"
                        >
                            <div class="flex items-center">
                                <svg class="w-8 h-8 bg-primary bg-opacity-20 text-primary px-1.5 py-0.5 rounded-full" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                <div class="text-sm ml-3">
                                    <p 
                                        class="text-gray-600 font-bold capitalize"
                                        :class=" linkHover ? 'text-primary' : ''"
                                    >Order Completed</p>
                                    <p class="text-xs">Your order is completed</p>
                                </div>
                            </div>
                            <span class="text-xs font-bold">
                                5 min ago
                            </span>
                        </a>
                        <!-- end::Submenu link -->
                    </div>
                    <!-- end::Submenu content -->
                </div>
                <!-- end::Submenu -->
            </div>
            <!-- end::Notifications -->

            <!-- start::Profile -->
            <div 
                x-data="{ linkActive: false }"
                class="relative"                      
            >
                <!-- start::Main link -->
                <div 
                    @click="linkActive = !linkActive"
                    class="cursor-pointer"
                >
                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                </div>
                <!-- end::Main link -->
                
                <!-- start::Submenu -->
                <div 
                    x-show="linkActive"
                    @click.away="linkActive = false"
                    x-cloak
                    class="absolute right-0 w-40 top-11 border border-gray-300 z-20"
                >
                    <!-- start::Submenu content -->
                    <div class="bg-white rounded">
                        <!-- start::Submenu link -->
                        <a 
                            x-data="{ linkHover: false }"
                            href="{{ route('home') }}"
                            class="flex items-center justify-between py-2 px-3 hover:bg-gray-100 bg-opacity-20"
                            @mouseover="linkHover = true"
                            @mouseleave="linkHover = false"
                        >
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition duration-200 text-primary" :class="linkHover ? 'text-gray-100' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <div class="text-sm ml-3">
                                    <p 
                                        class="text-gray-600 font-bold capitalize"
                                        :class=" linkHover ? 'text-primary' : ''"
                                    >Home</p>
                                </div>
                            </div>
                        </a>
                        <!-- end::Submenu link -->
                        <!-- start::Submenu link -->
                        <a 
                            x-data="{ linkHover: false }"
                            href="{{ route('profile') }}"
                            class="flex items-center justify-between py-2 px-3 hover:bg-gray-100 bg-opacity-20"
                            @mouseover="linkHover = true"
                            @mouseleave="linkHover = false"
                        >
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <div class="text-sm ml-3">
                                    <p 
                                        class="text-gray-600 font-bold capitalize"
                                        :class=" linkHover ? 'text-primary' : ''"
                                    >Profile</p>
                                </div>
                            </div>
                        </a>
                        <!-- end::Submenu link -->
                        
                        <hr>

                        <!-- start::Submenu link -->
                        <form
                            method="POST"
                            action="{{ route('logout') }}"
                            x-data="{ linkHover: false }"
                            class="flex items-center justify-between py-2 px-3 hover:bg-gray-100 bg-opacity-20"
                            @mouseover="linkHover = true"
                            @mouseleave="linkHover = false"
                        >
                        @csrf
                            <div class="flex items-center">
                                <svg
                                    class="w-5 h-5 text-red-600"
                                    fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path 
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                    >
                                    </path>
                                </svg>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    
                                    <x-dropdown-link 
                                        class="text-sm ml-3 text-gray-600 font-bold capitalize"
                                        
                                        :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </form>
                        <!-- end::Submenu link -->
                    </div>
                    <!-- end::Submenu content -->
                </div>
                <!-- end::Submenu -->
            </div>
            <!-- end::Profile -->
        </div>
        <!-- end::Right side top menu -->
    </header>
</div>
<!-- end::Topbar -->
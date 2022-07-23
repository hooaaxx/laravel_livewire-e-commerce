<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'testing') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.4.2/dist/cdn.min.js"></script>

    <style>[x-cloak] { display: none !important; }</style>
    @livewireStyles
  </head>
  <body class="font-sans antialiased">
    <div 
        x-data="{ menuOpen: false }" 
        class="flex min-h-screen custom-scrollbar"
    >
      <!-- start::Black overlay -->
      <div 
        :class="menuOpen ? 'block' : 'hidden'" @click="menuOpen = false" 
        class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"
      ></div>
      <!-- end::Black overlay -->

      @include('layouts.adminSidebar')

      {{ $sidebar }}

      <div class="lg:pl-64 w-full flex flex-col">
        @include('layouts.adminNav')

        <!-- start::Topbar -->
        <div class="flex flex-col">
            {{ $header }}
        </div>

        <!-- start:Page content -->
        <div class="h-full bg-gray-200 p-8">
            {{ $slot }}
        </div>
        <!-- end:Page content -->
      </div>
    </div>
    
    @livewireScripts
  </body>
</html>

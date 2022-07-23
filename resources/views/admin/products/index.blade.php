<x-admin-layout>
    <x-slot name="sidebar">
    </x-slot>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('products')
        </div>
    </div>
</x-admin-layout>

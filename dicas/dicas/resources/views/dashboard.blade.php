<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Auto Dicas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-darker overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-600 border-b border-gray-200">
                    <livewire:clues-table/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

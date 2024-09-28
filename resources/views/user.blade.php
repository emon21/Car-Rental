<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex gap-2 mt-2">
        <div class="">
            <x-sidebar>
            </x-sidebar>
        </div>

        <div class="w-3/4 ">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in! User") }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

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
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
       </div>

    {{-- 
    <div class=" py-12 bg-green-900">
        <div class="w-1/4 bg-slate-800">
            <x-sidebar>
            </x-sidebar>
        </div>
        <div class="w-3/4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>

    </div> --}}
</x-app-layout>

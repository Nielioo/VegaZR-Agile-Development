@section('title', 'Dashboard')

<x-app-layout>
    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        @auth
        <div>
            <h1>Halo, {{ Auth::user()->name }}</h1>
        </div>
        @endauth


    </div>
</x-app-layout>
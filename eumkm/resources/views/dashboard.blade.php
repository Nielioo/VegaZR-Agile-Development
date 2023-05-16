@section('title', 'Dashboard')

<x-app-layout>
    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        @if (Auth::user())
        <div>
            <h1>Halo, {{ Auth::user()->name }}</h1>
        </div>
        
        @else
        <div>
            <h1>Welcome to E-UMKM </h1>
        </div>
        @endif

        
    </div>
</x-app-layout>
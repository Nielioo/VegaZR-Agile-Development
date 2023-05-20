@section('title', 'Add UMKM')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add UMKM
        </h2>
    </x-slot>

    <x-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('umkm.store') }}">
        @csrf


        <div  class="mt-4 w-full">
            <x-label for="name" value="{{ __('UMKM Name') }}" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>
        <div class="mt-4 w-full">
            <x-label for="manager" value="{{ __('UMKM Manager') }}" />
            <x-input id="manager" class="block mt-1 w-full" type="text" name="manager" :value="old('manager')" required autofocus autocomplete="manager" />
        </div>
        <div  class="mt-4 w-full">
            <x-label for="phone" value="{{ __('Phone') }}" />
            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
        </div>

        <div class="mt-4">
            <x-button>
                {{ __('Create UMKM') }}
            </x-button>
        </div>
    </form>
</x-app-layout>
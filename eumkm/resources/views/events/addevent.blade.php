@section('title', 'Add Events')

<x-app-layout>
    <x-slot name="logo">
        <img src="{{ url('images/logo.svg') }}" alt="E-UMKM">
    </x-slot>

    <x-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('event.create') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
        </div>

        <div class="mt-4">
            <x-label for="start_date" value="{{ __('Start Date') }}" />
            <x-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date')"
                required />
        </div>

        <div class="mt-4">
            <x-label for="end_date" value="{{ __('End Date') }}" />
            <x-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" :value="old('end_date')"
                required />
        </div>

        <div class="mt-4">
            <x-label for="start_time" value="{{ __('Start Time') }}" />
            <x-input id="start_time" class="block mt-1 w-full" type="time" name="start_time" :value="old('start_time')"
                required />
        </div>

        <div class="mt-4">
            <x-label for="end_time" value="{{ __('End Time') }}" />
            <x-input id="end_time" class="block mt-1 w-full" type="time" name="end_time" :value="old('end_time')"
                required />
        </div>

        <div class="mt-4">
            <x-label for="poster" value="{{ __('Poster') }}" />
            <x-input id="poster" class="block mt-1 w-full" type="file" name="poster" required />
        </div>

        <div class="mt-4">
            <x-label for="map_tenant" value="{{ __('Map') }}" />
            <x-input id="map_tenant" class="block mt-1 w-full" type="file" name="map_tenant" required />
        </div>

        <div class="mt-4">
            <x-label for="location_address" value="{{ __('Location Address') }}" />
            <x-input id="location_address" class="block mt-1 w-full" type="text" name="location_address" :value="old('location_address')" required />
        </div>


        <div class="mt-4">
            <x-button>
                {{ __('Create Event') }}
            </x-button>
        </div>
    </form>
</x-app-layout>

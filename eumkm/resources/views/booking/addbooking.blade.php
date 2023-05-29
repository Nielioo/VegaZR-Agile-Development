@section('title', 'Booking Events')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Booking Event
        </h2>
    </x-slot>

    <x-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('booking.store', ['id'=>$data->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="mt-4">
            <x-label for="umkm_name" value="{{ __('UMKM Name') }}" />
            <x-input id="umkm_name" class="block mt-1 w-full" type="text" name="umkm_name" :value="old('umkm_name')" required autofocus autocomplete="umkm_name" />
        </div>
        <div class="mt-4">
            <x-label for="umkm_manager" value="{{ __('UMKM Manager') }}" />
            <x-input id="umkm_manager" class="block mt-1 w-full" type="text" name="umkm_manager" :value="old('umkm_manager')" required autofocus autocomplete="umkm_manager" />
        </div>
        <div class="mt-4">
            <x-label for="umkm_phone" value="{{ __('UMKM Phone') }}" />
            <x-input id="umkm_phone" class="block mt-1 w-full" type="text" name="umkm_phone" :value="old('umkm_phone')" required autofocus autocomplete="umkm_phone" />
        </div>

        <div class="flex justify-between gap-4">
            <div class="mt-4 w-full">
                <x-label for="start_date" value="{{ __('Start Date') }}" />
                <x-input id="start_date" class="block mt-1 w-full cursor-pointer" type="date" name="start_date" :value="old('start_date')" required />
            </div>

            <div class="mt-4 w-full">
                <x-label for="end_date" value="{{ __('End Date') }}" />
                <x-input id="end_date" class="block mt-1 w-full cursor-pointer" type="date" name="end_date" :value="old('end_date')" required />
            </div>
        </div>

        <div class="flex justify-between gap-4">
            <div class="mt-4 w-full">
                <x-label for="start_time" value="{{ __('Start Time') }}" />
                <x-input id="start_time" class="block mt-1 w-full cursor-pointer" type="time" name="start_time" :value="old('start_time')" required />
            </div>

            <div class="mt-4 w-full">
                <x-label for="end_time" value="{{ __('End Time') }}" />
                <x-input id="end_time" class="block mt-1 w-full cursor-pointer" type="time" name="end_time" :value="old('end_time')" required />
            </div>
        </div>

        <div class="mt-4">
            <x-label for="map_number" value="{{ __('Map Number') }}" />
            <select  name="map_number" id="map_number" class="border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm' block mt-1 w-full" type="text" required>
                <option value="">--Select Nomor Peta--</option>
                @for ($i = 0; $i < $data->sum_tenant; $i++)
                    <option value="{{ $i+1 }}">{{ $i+1 }}</option>
                @endfor 
            </select>
        </div>
        <div class="mt-4">
            <x-label for="type" value="{{ __('Type') }}" />
            <x-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required autofocus autocomplete="type" />
        </div>

        <div class="mt-4">
            <x-label for="proof_payment" value="{{ __('Bukti Pembayaran') }}" />
            <x-input id="proof_payment" class="block mt-1 w-full cursor-pointer" type="file" name="proof_payment" required />
        </div>

        <div class="mt-4">
            <x-button>
                {{ __('Add Booking') }}
            </x-button>
        </div>
    </form>
</x-app-layout>

@section('title', 'Booking Events')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Booking Event
        </h2>
    </x-slot>

    <x-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('booking.create') }}" enctype="multipart/form-data">
        @csrf


        <div class="flex justify-between gap-4">
            <div class="mt-4 w-full">
                <x-label for="umkm" value="{{ __('UMKM') }}" />

                <select  name="umkm" id="umkm" class="border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm' block mt-1 w-full" type="text" required>
                    <option >--Select Umkm--</option>
                    @forelse ($data['umkm'] as $umkm)
                    <option value="{{ $umkm->id }}">{{ $umkm->name }}</option>
                    @empty
                    @endforelse
                </select>
                
                
            </div>

            <div class="mt-4 w-full">
                <x-label for="add_umkm" value="{{ __('Add UMKM') }}" />
                <div class="mt-3 w-full">
                    <a href="{{ route('umkm.addumkm') }}" class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-orange-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            <title>Create UMKM</title>
                        </svg>
                    </a>
                </div>
            </div>
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
            <x-label for="tipe" value="{{ __('Tipe') }}" />
            <select  name="tipe" id="tipe" class="border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm' block mt-1 w-full" type="text" required>
                <option >--Select Tipe--</option>
                
                <option value="Makanan & Minuman">Makanan & Minuman</option>
                
            </select>
        </div>

        <div class="mt-4">
            <x-label for="nomor_peta" value="{{ __('Nomor Peta') }}" />
            <select  name="nomor_peta" id="nomor_peta" class="border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm' block mt-1 w-full" type="text" required>
                <option >--Select Nomor Peta--</option>
                
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                
            </select>
        </div>

        <div class="mt-4">
            <x-label for="bukti_pembayaran" value="{{ __('Bukti_pembayaran') }}" />
            <x-input id="bukti_pembayaran" class="block mt-1 w-full cursor-pointer" type="file" name="bukti_pembayaran" />
        </div>

        <div class="mt-4">
            <x-button>
                {{ __('Create Booking') }}
            </x-button>
        </div>
    </form>
</x-app-layout>
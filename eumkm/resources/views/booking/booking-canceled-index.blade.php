@section('title', 'Booking Canceled')

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Booking Canceled
                </h2>
            </div>
        </div>
    </x-slot>

    <a href="{{ route('booking.index', $data->id) }}" class="font-bold text-orange-500">
        <div class='mt-4'>
            <span class="hidden lg:flex gap-2 items-center px-4 py-2 rounded-lg font-bold">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                    <title>Jumlah UMKM yang telah melakukan registrasi</title>
                </svg>
                {{ 'Back' }}
            </span>
        </div>
    </a>

    <div class="space-y-8 mt-4">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
        @endif

        <div class="overflow-x-auto shadow rounded">
            <table class="min-w-full">
                <thead class="bg-gray-500 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            UMKM Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            UMKM Manager
                        </th>
                        <th scope="col" class="px-6 py-3">
                            UMKM Phone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Map Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Time
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Proof Payment
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_canceled as $booking)
                    <tr class="odd:bg-white even:bg-gray-200">
                        <td class="px-6 py-4">
                            {{ $booking->umkm_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->type }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->umkm_manager }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->umkm_phone }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $booking->map_number }}
                        </th>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($booking->start_date)->format('d/m/Y') }} -
                            {{ \Carbon\Carbon::parse($booking->end_date)->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $booking->start_time)->format('h:i') }}
                            -
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $booking->end_time)->format('h:i') }}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ url('/storage/' . $booking->proof_payment) }}" alt="Bukti Pembayaran" class="rounded">
                        </td>
                        <td class="px-6 py-4">
                            <div class="mt-4">
                                <a href="{{ route('booking.update', $booking->id) }}" class="font-medium">
                                    <button class="w-full inline-flex justify-center items-center space-x-2 rounded focus:outline-none px-3 py-2 leading-6 bg-yellow-500 hover:bg-yellow-600 focus:ring focus:ring-yellow-500 focus:ring-opacity-50 active:bg-yellow-500 active:border-yellow-500">
                                        <p class="font-semibold text-white">Registered</p>
                                    </button>
                                </a>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('booking.destroy', $booking->id) }}" class="font-medium">
                                    <button class="w-full inline-flex justify-center items-center space-x-2 rounded focus:outline-none px-3 py-2 leading-6 bg-red-500 hover:bg-red-600 focus:ring focus:ring-red-500 focus:ring-opacity-50 active:bg-red-500 active:border-red-500">
                                        <p class="font-semibold text-white">Delete</p>
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                <tbody class="bg-white">
                    <tr>
                        <td colspan="9" class="px-3 py-4">
                            <div class="grid gap-2 p-2 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" />
                                </svg>
                                <p>Data Booking tidak tersedia</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
@section('title', 'Bookings')

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Bookings
                </h2>
            </div>
            <div>
                <a href="{{ route('event_addBooking', ['id' => $data->id]) }}" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-orange-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        <title>Add Booking</title>
                    </svg>
                </a>
            </div>
            <div>
                <a href="{{ route('event_addBooking', ['id' => $data->id]) }}" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                <title>Edit Booking</title>
            </svg>
                </a>
            </div>
            <div>
                <a href="{{ route('event_addBooking', ['id' => $data->id]) }}" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                 <title>Delete Booking</title>
</svg>

                </a>
            </div>
        </div>
    </x-slot>

    <a href="{{ route('booking_canceled', $data->id) }}" class="font-medium">
        <div class='mt-4'>
            <span class="hidden lg:flex gap-2 items-center px-2 py-1 rounded-lg border-2 border-black font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
                    <title>Jumlah UMKM yang membatalkan registrasi</title>
                </svg>
                {{ count($data_cancel) . ' UMKM Has Canceled Registration' }}
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
                    @forelse ($data_bookings as $booking)
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
                                <img src="{{ url('/storage/' . $booking->proof_payment) }}" alt="Bukti Pembayaran"
                                    class="rounded">
                            </td>
                            <td class="px-6 py-4">
                                <div class="mt-4">
                                    <a href="{{ route('booking.update', $booking->id) }}" class="font-medium">
                                        <button
                                            class="w-full inline-flex justify-center items-center space-x-2 rounded focus:outline-none px-3 py-2 leading-6 bg-yellow-500 hover:bg-yellow-600 focus:ring focus:ring-yellow-500 focus:ring-opacity-50 active:bg-yellow-500 active:border-yellow-500">
                                            <p class="font-semibold text-white">Canceled</p>
                                        </button>
                                    </a>
                                </div>
                                <div class="mt-4">
                                        <button 
                                            class="w-full inline-flex justify-center items-center space-x-2 rounded focus:outline-none px-3 py-2 leading-6 bg-blue-500 hover:bg-blue-600 focus:ring focus:ring-blue-500 focus:ring-opacity-50 active:bg-blue-500 active:border-blue-500">
                                             <p class="font-semibold text-white">Edit</p>
                                        </button>
                                 </div>
                                <div class="mt-4">
                                    <a href="{{ route('booking.destroy', $booking->id) }}" class="font-medium">
                                        <button
                                            class="w-full inline-flex justify-center items-center space-x-2 rounded focus:outline-none px-3 py-2 leading-6 bg-red-500 hover:bg-red-600 focus:ring focus:ring-red-500 focus:ring-opacity-50 active:bg-red-500 active:border-red-500">
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" />
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

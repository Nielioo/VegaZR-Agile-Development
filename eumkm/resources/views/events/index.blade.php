@section('title', 'Events')

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Events
                </h2>
            </div>
            <div>
                <a href="{{ route('event.addevent') }}" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-orange-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        <title>Create Event</title>
                    </svg>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="space-y-8">
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
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Time
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Map
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Poster
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Location Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $event)
                    <tr class="odd:bg-white even:bg-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $event->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($event->start_date)->format('d/m/Y') }} -
                            {{ \Carbon\Carbon::parse($event->end_date)->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $event->start_time)->format('h:i') }}
                            -
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $event->end_time)->format('h:i') }}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ url('/storage/' . $event->map_tenant) }}" alt="Denah Lokasi" class="rounded">
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ url('/storage/' . $event->poster) }}" alt="Poster" class="rounded">
                        </td>
                        <td class="px-6 py-4">
                            {{ $event->location_address }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('booking.index', $event->id) }}" class="font-medium text-orange-500">Registered UMKM</a>
                        </td>
                    </tr>
                    @empty
                <tbody class="bg-white">
                    <tr>
                        <td colspan="7" class="px-3 py-4">
                            <div class="grid gap-2 p-2 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" />
                                </svg>
                                <p>Data Event tidak tersedia</p>
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
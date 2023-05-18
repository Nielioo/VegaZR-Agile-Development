@section('title', 'Events')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Event
        </h2>
    </x-slot>

    <x-button class="ml-4">
        <a href="{{ route('event.addevent') }}">{{ __('Create Event') }}</a>
    </x-button>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-gray-700 uppercase">
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
                            <tr class="odd:bg-white even:bg-gray">
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
                                    <img src="{{ url('/storage/' . $event->map_tenant) }}" alt="">
                                </td>
                                <td class="px-6 py-4">
                                    <img src="{{ url('/storage/' . $event->poster) }}" alt="">
                                </td>
                                <td class="px-6 py-4">
                                    {{ $event->location_address }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('booking.index', $event->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Registered UMKM</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center text-mute" colspan="4">Data Event tidak tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

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

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($data as $event)
            <a href="{{ route('booking.index', $event->id) }}">
                <div class="group relative bg-white rounded-2xl shadow flex flex-col overflow-hidden">
                    <div class="aspect-w-3 aspect-h-4 group-hover:opacity-75 sm:aspect-none sm:h-96">
                        <img src="{{ url('/storage/' . $event->poster) }}" alt="Poster" class="w-full h-full object-center object-cover sm:w-full sm:h-full">
                    </div>
                    <div class="flex-1 p-4 space-y-2 flex flex-col">
                        <p class="truncate w-full text-2xl leading-8 font-semibold text-gray-900 group-hover:text-orange-500">
                            {{ $event->name }}
                        </p>
                        <div>
                            <div class="flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-700">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    <title>Start Date - End Date</title>
                                </svg>
                                <p class="text-lg leading-8 text-gray-700">{{ \Carbon\Carbon::parse($event->start_date)->format('d/m/Y') }} -
                                    {{ \Carbon\Carbon::parse($event->end_date)->format('d/m/Y') }}
                                </p>
                            </div>
                            <div class="flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-700">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    <title>Start Time - End Time</title>
                                </svg>
                                <p class="text-lg leading-8 text-gray-700">{{ \Carbon\Carbon::createFromFormat('H:i:s', $event->start_time)->format('h:i') }}
                                    -
                                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $event->end_time)->format('h:i') }} WIB
                                </p>
                            </div>
                            <div class="flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-700">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    <title>Location Address</title>
                                </svg>
                                <p class="truncate w-full text-lg leading-8 text-gray-700">{{ $event->location_address }}</p>
                            </div>
                            <div class="mt-2">
                                <button type="button" class="w-full inline-flex justify-center items-center space-x-2 rounded focus:outline-none px-3 py-2 leading-6 bg-orange-500 hover:bg-orange-600 focus:ring focus:ring-orange-500 focus:ring-opacity-50 active:bg-orange-500 active:border-orange-500">
                                    <p class="font-semibold text-white">{{ __('Selengkapnya') }}</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
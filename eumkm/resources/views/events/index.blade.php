@section('title', 'Events')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Event
        </h2>
    </x-slot>

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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="m-3">

                    <table class="table table-striped-columns">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th score="col">Map</th>
                                <th scope="col">Address</th>
                                <th scope="col">Poster</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $event)
                                <tr>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->start_date}} - {{$event->end_date}} </td>
                                    <td>{{ $event->start_time}} - {{$event->end_time}} </td>
                                    <td><img src="{{ assets('$event->map_tenant')}}" alt=""></td>
                                    <td><img src="{{ assets('$event->poster')}}" alt=""></td>
                                    <td>{{ $event->location_address }}</td>
                                    <td class="">
                                        @if ($event->proof_payment)
                                            <a href="" class="btn btn-sm btn-secondary">Lunas</a>
                                        @else
                                            <a href="{{ route('booking.index', $event->id) }}"
                                                class="btn btn-sm btn-primary">Bayar</a>
                                        @endif


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
    </div>
</x-app-layout>

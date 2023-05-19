<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            UMKM
        </h2>
    </x-slot>

    <div class="space-y-8">

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
                    <a href="{{ route('umkm.show') }}" class="btn btn-sm btn-primary">Lihat yang Sudah Bayar</a>
                </div>
                <div class="m-3">

                    <table class="table table-striped-columns">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Manager</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data['umkm'] as $u)
                                <tr>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->manager }}</td>
                                    <td>{{ $u->phone }}</td>

                                    <td class="">
                                        @if ($u->proof_payment)
                                            <a href="" class="btn btn-sm btn-secondary">Lunas</a>
                                        @else
                                            <a href="{{ route('booking.index', $u->id) }}"
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

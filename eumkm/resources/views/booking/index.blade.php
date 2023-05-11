<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Booking
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

                    <table>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $umkm->name }}</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <form action="{{ route('booking.store') }}" method="POST">
                                    @csrf
                                    <input type="text" class="form-control" value={{ $umkm->id }} name="umkm_id"
                                        id="umkm_id" hidden>

                                    <div class="form-group mb-3 mt-3">
                                        <label for="proof_payment">proof_payment</label>
                                        <select class="form-select  @error('proof_payment') is-invalid @enderror"
                                            aria-label="Default select example" name="proof_payment">
                                            <option selected>Open this select menu</option>
                                            <option value="Paid">Paid</option>

                                        </select>


                                        <!-- error message untuk proof_payment -->
                                        @error('proof_payment')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>



                                    <button type="submit" class="btn btn-md btn-primary">Save</button>
                                    <a href="{{ route('umkm') }}" class="btn btn-md btn-secondary">back</a>

                                </form>

                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

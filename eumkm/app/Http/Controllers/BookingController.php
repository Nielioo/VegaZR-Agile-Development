<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\UMKM;
// use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data['umkm'] = UMKM::latest()->get();
        return view('booking.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'proof_payment' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        $proof_payment_image_path = $request->file('proof_payment')->store('Image', 'public');

        $booking = Booking::create([
            'umkm_id' => $request->umkm_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'tipe' => $request->tipe,
            'nomor_peta' => $request->nomor_peta,
            'proof_payment' => $request->proof_payment,

        ]);

        if ($booking) {
            return redirect()
                ->route('umkm')
                ->with([
                    'success' => 'Pembayaran sukses'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
    // public function store($id)
    // {
    //     //
    //     $booking = Booking::create([
    //         'umkm_id' => $id,
    //         'proof_payment' => 'Paid',

    //     ]);

    //     if ($booking) {
    //         return redirect()
    //             ->route('umkm')
    //             ->with([
    //                 'success' => 'Successfully payment'
    //             ]);
    //     } else {
    //         return redirect()
    //             ->back()
    //             ->withInput()
    //             ->with([
    //                 'error' => 'Some problem occurred, please try again'
    //             ]);
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}

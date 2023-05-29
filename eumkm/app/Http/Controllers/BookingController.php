<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\UMKM;
use App\Models\Event;
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
        $data_bookings = Event::findOrFail($id)->bookings;

        if(count($data_bookings)>0){
            $data_bookings = Booking::where('event_id', $id)->where('status', '1')->get();
        }

        $data_cancel = Event::findOrFail($id)->bookings;

        if(count($data_cancel)>0){
            $data_cancel = Booking::where('event_id', $id)->where('status', '0')->get();
        }

        return view('booking.index', [
            'data' => Event::findOrFail($id),
            'data_bookings' => $data_bookings,
            'data_cancel' => $data_cancel,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('booking.addbooking', [
            'data' => Event::findOrFail($id),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store($id, Request $request)
    {
        //
        $this->validate($request, [
            'proof_payment' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'umkm_phone' => 'required|numeric'
        ]);

        $proof_payment_image_path = $request->file('proof_payment')->store('Image', 'public');

        $booking = Booking::create([
            'event_id' => $id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'type' => $request->type,
            'map_number' => $request->map_number,
            'proof_payment' => $proof_payment_image_path,
            'umkm_name' => $request->umkm_name,
            'umkm_manager' => $request->umkm_manager,
            'umkm_phone' => $request->umkm_phone,
            'status' => '1',

        ]);

        if ($booking) {
            return redirect()
                ->route('booking.index', $id)
                ->with([
                    'success' => 'Booking berhasil ditambahkan'
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
    public function update($id)
    {
        $event_id = Booking::findOrFail($id)->event->id;

        if(Booking::findOrFail($id)->status=='1'){
            Booking::findOrFail($id)->update([
                'status' => '0',
            ]);
            return redirect()->route('booking.index', $event_id);
        } elseif(Booking::findOrFail($id)->status=='0'){
            Booking::findOrFail($id)->update([
                'status' => '1',
            ]);
            return redirect()->route('booking_canceled', $event_id);
        }
        
    }

    public function BookingCanceledIndex($id)
    {
        $data_canceled = Event::findOrFail($id)->bookings;

        if(count($data_canceled)>0){
            $data_canceled = Booking::where('event_id', $id)->where('status', '0')->get();
        }

        return view('booking.booking-canceled-index', [
            'data' => Event::findOrFail($id),
            'data_canceled' => $data_canceled,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event_id = Booking::findOrFail($id)->event->id;
        $status = Booking::findOrFail($id)->status;

        Booking::findOrFail($id)->delete();

        if($status=='1'){
            return redirect()->route('booking.index', $event_id);
        } elseif($status=='0'){
            return redirect()->route('booking_canceled', $event_id);
        }
    }
}

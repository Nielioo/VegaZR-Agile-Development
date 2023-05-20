<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use App\Http\Requests\StoreUMKMRequest;
use App\Http\Requests\UpdateUMKMRequest;
use Illuminate\Http\Request;

use DB;


class UMKMController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //


        // $umkms = UMKM::latest()->get();

        $data['umkm'] = DB::table('u_m_k_m_s')
            ->leftJoin('bookings', 'u_m_k_m_s.id', '=', 'bookings.umkm_id')
            ->select('u_m_k_m_s.*', 'bookings.proof_payment')
            ->get();

        // var_dump($data['umkm']);
        // die();

        return view('umkm.index', compact('data'));
        // return view('umkm.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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

            'name' => 'required',
            'manager'=>'required',
            'phone'=>'required'
        ]);

        $umkm = UMKM::create([
            'name' => $request->name,
            'manager' => $request->manager,
            'phone' => $request->phone

        ]);

        if ($umkm) {
            return redirect()
                ->route('umkm')
                ->with([
                    'success' => 'UMKM berhasil ditambahkan'
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

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $data['umkm'] = DB::table('u_m_k_m_s')
            ->leftJoin('bookings', 'u_m_k_m_s.id', '=', 'bookings.umkm_id')
            ->select('u_m_k_m_s.*', 'bookings.proof_payment')
            ->where('bookings.proof_payment', 'IS Not', null)
            ->get();

        return view('umkm.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(UMKM $uMKM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUMKMRequest $request, UMKM $uMKM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UMKM $uMKM)
    {
        //
    }
}

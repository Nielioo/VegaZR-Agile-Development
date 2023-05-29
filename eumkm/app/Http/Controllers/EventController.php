<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventUser;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Event::whereIn('id', EventUser::where('user_id', auth()->user()->id)->pluck('event_id'))->get();

        return view('events.index', compact('data'));
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
    public function store(StoreEventRequest $request)
    {
        $this->validate($request, [
            'poster' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'map_tenant' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'sum_tenant' => 'required|integer|min:1'
        ]);

        $map_image_path = $request->file('map_tenant')->store('Image', 'public');
        $poster_image_path = $request->file('poster')->store('Image', 'public');

        $data = Event::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'map_tenant' => $map_image_path,
            'poster' => $poster_image_path,
            'location_address' => $request->location_address,
            'sum_tenant' => $request->sum_tenant,
        ]);

        EventUser::create([
            'event_id' => $data->id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('event');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return redirect()->route('event');
    }
}

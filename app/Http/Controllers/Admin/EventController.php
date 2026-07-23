<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $events = Event::withCount('reservations')->latest('date')->paginate(10);
        return view("admin.events.index",compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validated=$request->validate([
           'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        Event::create($validated);
         return redirect()
        ->route('admin.events.index')
        ->with('success', 'Event created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        // $event=Event::findOrFail($event);
        return view('admin.events.edit',compact('event'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated=$request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'date'        => ['required', 'date'],
            'time'        => ['required'],
            'location'    => ['required', 'string', 'max:255'],
            'price'       => ['required', 'numeric', 'min:0'],
            'capacity'    => ['required', 'integer', 'min:1'],
            'image'       => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ]);
        $event->update($validated);
        return redirect()->route('admin.events.index')->with('success',"event updated with successfull");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event=Event::findOrFail($id);
        $event->delete();
        return redirect()->route('admin.events.index')->with('success',"the event deleted with successfull");
    }
}

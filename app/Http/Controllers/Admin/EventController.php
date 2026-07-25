<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
   
    public function index()
    {
         $events = Event::withCount('reservations')->latest('date')->paginate(10);
        return view("admin.events.index",compact('events'));
    }

    
    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'date'        => 'required|date',
            'time'        => 'required',
            'price'       => 'required|numeric|min:0',
            'location'    => 'required|string|max:255',
            'capacity'    => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

       if ($request->hasFile('image')) {
            $path = $request->file('image')->store('events', 'public');
        } else {
            $path = null;
        }

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }


    public function show(Event $event)
    {
        return view('admin.events.show',compact('event'));
    }

    
    public function edit(Event $event)
    {
        return view('admin.events.edit',compact('event'));
        
    }

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

    public function destroy(string $id)
    {
        $event=Event::findOrFail($id);
        $event->delete();
        return redirect()->route('admin.events.index')->with('success',"the event deleted with successfull");
    }
}

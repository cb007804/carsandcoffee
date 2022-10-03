<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEvents(Event $event)
    {
        $event = Event::all();

        return $event;
    }

    public function index()
    {
        $events = Event::all();
        return view('Event.view', compact('events','events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Event.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_name'=>'required',
            'description'=> 'required',
            'image' => 'required | max:2024'
        ]);

        //save file in aws
        $imageName = time().'.'.$request->image->extension();  
        $path = Storage::disk('s3')->put('events', $request->image);
        $path = Storage::disk('s3')->url($path);

        //save data in mongo db
        $event = new Event([
            'event_name' => $request->get('event_name'),
            'description'=> $request->get('description'),
            'image_url'=> $path
        ]);
 
        $event->save();
        return redirect('/event')->with('success', 'Event has been created');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        Storage::disk('s3')->delete($event->image_url);
        return redirect('/event')->with('success', 'Event deleted successfully');
    }
}

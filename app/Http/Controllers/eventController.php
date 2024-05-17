<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class eventController extends Controller
{
    public function index()
    {
        return view('index', [
            'events' => Events::orderBy('eventDate', 'desc')->simplePaginate(5)
        ]);
    }
    public function manageComments()
    {
        return view('manageComment', [
            'events' => Events::orderBy('eventDate', 'desc')->simplePaginate(5)
        ]);
    }

    public function search(Request $request)
    {
        return view('search', [
            'events' => Events::latest()->filter(['search' => $request->input('search')])->get()
        ]);
    }

    public function create(Request $request)
    {
        return view('create');
    }
    public function destroy(Events $event)
    {
        // Your logic to delete the event goes here
        $event->delete();

        // Redirect or return a response as needed
        
        return redirect('/profile')->with('success', 'Event deleted successfully!');
    }

    public function show(Events $event)
    {
        return view('event', [
            'event' => $event
        ]);
    }

    public function edit(Events $event)
    {
        return view('edit', [
            'event' => $event
        ]);
    }

    public function manage()
    {
        return view('ProfilePage', [
            'events' => Events::orderBy('eventDate', 'desc')->simplePaginate(5)
        ]);
    }


    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'eventName' => 'required|string',
            'category' => 'required|string',
            'eventDateTime' => 'required|date',
            'description' => 'required|string',
            'tags' => 'required|string',
            'eventBanner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'eventLocation' => 'required|string',
            'bookingLink' => 'required|string',
            'colorCode' => 'required|string',
        ]);

        // Handle file upload (eventBanner)
        $eventBannerPath = $request->file('eventBanner')->store('event_banners', 'public');

        // Create a new Event instance
        $event = new Events([
            'EventName' => $request->get('eventName'),
            'Categorie' => $request->get('category'),
            'EventOwner' => auth()->user()->id,
            'eventDate' => $request->get('eventDateTime'),
            'Description' => $request->get('description'),
            'Tags' => $request->get('tags'),
            'EventBanner' => $eventBannerPath,
            'EventLocation' => $request->get('eventLocation'),
            'BookingLink' => $request->get('bookingLink'),
            'colorCode' => $request->get('colorCode'),
        ]);

        // Save the event to the database
        $event->save();

        // Redirect or do something else after successful submission
        return redirect('/')->with('success', 'Event created successfully!');
    }
    public function update(Request $request, Events $event)
    {
        // Validate the form data
        $request->validate([
            'eventName' => 'required|string',
            'category' => 'required|string',
            'eventOwner' => 'required|string',
            'eventDateTime' => 'required|date',
            'description' => 'required|string',
            'tags' => 'required|string',
            'eventLocation' => 'required|string',
            'bookingLink' => 'required|string',
            'colorCode' => 'required|string',
        ]);

        // Handle file upload (eventBanner) only if a new file is uploaded
        if ($request->hasFile('eventBanner')) {
            // Validate file
            $request->validate([
                'eventBanner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Store the new eventBanner
            $eventBannerPath = $request->file('eventBanner')->store('event_banners', 'public');

            // Delete the old eventBanner
            Storage::disk('public')->delete($event->EventBanner);

            // Update the eventBanner path in the model
            $event->EventBanner = $eventBannerPath;
        }

        // Update the existing event with new data
        $event->update([
            'EventName' => $request->get('eventName'),
            'Categorie' => $request->get('category'),
            'EventOwner' => $request->get('eventOwner'),
            'eventDate' => $request->get('eventDateTime'),
            'Description' => $request->get('description'),
            'Tags' => $request->get('tags'),
            'EventLocation' => $request->get('eventLocation'),
            'BookingLink' => $request->get('bookingLink'),
            'colorCode' => $request->get('colorCode'),
        ]);

        // Redirect or do something else after successful update
        return redirect('/')->with('success', 'Event updated successfully!');
    }
}

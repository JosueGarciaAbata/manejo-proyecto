<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public $numEvent = 5;
    public function index()
    {
        $events = Event::paginate(6);
        return view('pages.events', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('pages.event-detail', compact('event'));
    }
    
    public function search(Request $request)
    {
        $request->validate([
            'date' => 'nullable|date',
            'query' => 'nullable|string',
        ]);

        $query = Event::query();

        if ($request->filled('date')) {
            $query->whereDate('fec_ini_eve', $request->input('date'));
        }

        if ($request->filled('query')) {
            $query->where(function($q) use ($request) {
                $q->where('tit_eve', 'LIKE', "%{$request->input('query')}%")
                ->orWhere('tag_eve', 'LIKE', "%{$request->input('query')}%");
            });
        }

        $events = $query->paginate(6);

        return view('pages.events', compact('events'));
    }

    public function searchByDate(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        $events = Event::whereDate('fec_ini_eve', $request->date)->paginate(6);
        return view('pages.events', compact('events'));
    }

    public function searchByTag(Request $request)
    {
        $request->validate([
            'tag' => 'required|string',
        ]);

        $events = Event::where('tag_eve', 'LIKE', "%{$request->tag}%")->paginate(6);
        return view('pages.events', compact('events'));
    }

    public function latestEvents()
    {
        $events = Event::orderBy('fec_ini_eve', 'desc')->take(3)->get();
        return view('pages.home', compact('events'));
    }

}

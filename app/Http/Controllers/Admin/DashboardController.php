<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\Participant;
use App\Models\Speaker;
use App\Models\User;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        protected EventRepository $eventRepository
    ){}
    public function index()
    {
        $events = $this->eventRepository->getAllEvents();
        $totalUsers = User::query()->count();
        $totalSpeakers = Speaker::query()->count();
        $totalEvents = Event::query()->count();
        $totalParticipants = Participant::query()->count();

        return view('dashboard', compact('events', 'totalEvents', 'totalUsers', 'totalSpeakers', 'totalParticipants'));
    }

    public function search(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $events = Event::with(['user', 'room', 'speaker'])->where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $events = Event::query()->latest()->paginate($perPage);
        }

        return view('events.index', compact('events'));
    }

    public function listEventsCalendar()
    {
        $events = Event::all();

        return response()->json(EventResource::collection($events));
    }
}

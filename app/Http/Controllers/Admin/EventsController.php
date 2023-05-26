<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationEventRequest;
use App\Models\Event;
use App\Repositories\EventRepository;
use App\Repositories\RoomRepository;
use App\Repositories\SpeakerRepository;
use App\Services\Admin\EventService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function App\Http\Controllers\str_random;

class EventsController extends Controller
{
    public function __construct(
        protected EventService $eventService,
        protected EventRepository $eventRepository,
        protected RoomRepository $roomRepository,
        protected SpeakerRepository $speakerRepository,
    ){}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $events = Event::with(['user', 'room', 'speaker'])->where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('start_date', 'LIKE', "%$keyword%")
                ->orWhere('finish_date', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $events = Event::query()->latest()->paginate($perPage);
        }

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $speakers = $this->speakerRepository->getSpeakerAll();
        $rooms = $this->roomRepository->getRoomAll();

        return view('events.create', compact('speakers', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(RegistrationEventRequest $request)
    {
        $request['topics'] = json_encode($request['topics']);

        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $destinationPath = storage_path('/app/public/uploads');
            $file->move($destinationPath, $fileName);
            $requestData['image'] = 'uploads/' . $fileName;
        }

        $this->eventRepository->createEvent($requestData);

        return redirect('events')->with('flash_message', 'Event added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $event = $this->eventRepository->showEvent($id);
        $topics = json_decode($event->topics);

        return view('events.show', compact('event', 'topics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $event = $this->eventRepository->editEvent($id);
        $rooms = $this->roomRepository->getRoomAll();
        $speakers = $this->speakerRepository->getSpeakerAll();
        $topics = json_decode($event->topics);

        return view('events.edit', compact('event', 'topics', 'rooms', 'speakers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(RegistrationEventRequest $request, $id)
    {
        $request['topics'] = json_encode($request['topics']);

        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $destinationPath = storage_path('/app/public/uploads');
            $file->move($destinationPath, $fileName);
            $requestData['image'] = 'uploads/' . $fileName;
        }

        $event = $this->eventRepository->getEventToId($id);
        $event->update($requestData);

        return redirect('events')->with('flash_message', 'Event updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $this->eventRepository->getDestroyEvent($id);

        return redirect('events')->with('flash_message', 'Event deleted!');
    }
}

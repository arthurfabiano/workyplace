<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParticipantsRequest;
use App\Jobs\SendEmailRegistrationUser;
use App\Models\Speaker;
use App\Repositories\EventRepository;
use App\Repositories\ParticipantRepository;
use App\Services\Admin\ParticipantService;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct(
        protected EventRepository $eventRepository,
        protected ParticipantRepository $participantRepository,
        protected ParticipantService $participantService
    ){}
    public function events()
    {
        $nextEvents = $this->eventRepository->getNextEvents();
        $previousEvents = $this->eventRepository->getPreviousEvents();
        $event = $this->eventRepository->getPreviousEventsWithLimit();

        $topics  = isset($event[0]) ? json_decode($event[0]['topics']) : '';
        $skills  = isset($event[0]) ? json_decode($event[0]['speaker']['skills']) : '';

        return view('layouts.frontend.events', compact('nextEvents', 'previousEvents', 'topics', 'skills'));
    }

    public function speakers()
    {
        $speakers = Speaker::all();

        return view('layouts.frontend.speakers', compact('speakers'));
    }

    public function storeParticipant(ParticipantsRequest $request)
    {
        $requestData = $request->all();

        $result = $this->participantService->createParticipantInEvent($requestData);

        if ($result)
        {
            SendEmailRegistrationUser::dispatch($result);
            return redirect('eventos')->with('message', 'Obrigado por participar!');
        }

        return redirect('eventos')->with('message', 'No momento está sala está cheia!');
    }
}

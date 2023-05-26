<?php

namespace App\Services\Admin;

use App\Models\Event;
use App\Models\Room;
use App\Repositories\EventRepository;
use App\Repositories\ParticipantRepository;
use App\Repositories\RoomRepository;
use Illuminate\Support\Str;

class ParticipantService
{
    public function __construct(
        protected EventRepository $eventRepository,
        protected RoomRepository $roomRepository,
        protected ParticipantRepository $participantRepository
    ){}

    public function createParticipantInEvent($data)
    {
        $event = $this->eventRepository->getEventRoom($data);
        $room = $this->roomRepository->findRoom($event->room_id);

        $numberParticipants = $room->number_of_participants ?? 0;

        if ($numberParticipants > 0) {
            return $this->participantRepository->createParticipant($data);
        }

        return false;
    }
}

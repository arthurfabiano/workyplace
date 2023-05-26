<?php

namespace App\Observers;

use App\Models\Event;
use App\Models\Participant;
use App\Models\Room;

class NumberParticipantsEventObserver
{
    public function created(Participant $participant)
    {
        $event = Event::query()->with('room')->find($participant->event_id);
        $room = Room::query()->find($event->room_id);

        $total = $room->number_of_participants ?? 0;

        if ($room->amount_of_participants < $total){
            $newValue = $room->amount_of_participants + 1;
            $room->update(['amount_of_participants' => $newValue]);
        }

        return false;
    }

    public function deleted(Participant $participant)
    {
        $event = Event::query()->with('room')->find($participant->event_id);
        $room = Room::query()->find($event->room_id);

        if ($room->amount_of_participants > 0){
            $newValue = $room->amount_of_participants - 1;
            $room->update(['amount_of_participants' => $newValue]);
        }

        return false;
    }
}

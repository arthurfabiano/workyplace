<?php

namespace App\Repositories;

use App\Models\Event;

class EventRepository
{
    public function getAllEvents()
    {
        return Event::with('speaker')->get();
    }
    public function getEventToId($id)
    {
        return Event::query()->findOrFail($id);
    }
    public function createEvent($data)
    {
        return Event::query()->create($data);
    }

    public function showEvent($idEvent)
    {
        return Event::with('participant')->findOrFail($idEvent);
    }

    public function editEvent($idEvent)
    {
        return Event::with('speaker')->findOrFail($idEvent);
    }

    public function getDestroyEvent($id)
    {
        return Event::destroy($id);
    }

    public function getNextEvents()
    {
        return Event::with(['speaker', 'room'])->where('finish_date', '>=', date("Y-m-d h:i:s"))->paginate(5);
    }

    public function getPreviousEvents()
    {
        return Event::with('speaker')->where('finish_date', '<', date("Y-m-d h:i:s"))->limit(3)->get();
    }
    public function getPreviousEventsWithLimit()
    {
        return Event::with('speaker')->where('finish_date', '>=', date("Y-m-d h:i:s"))->get();
    }

    public function getEventRoom($data)
    {
        return Event::query()->with('room')->find($data['event_id']);
    }
}

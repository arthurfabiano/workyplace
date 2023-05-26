<?php

namespace App\Services\Admin;

use App\Models\Event;
use Illuminate\Support\Str;

class EventService
{
    public function __construct() {}

    public function listEvent($data)
    {
    }

    public function storeEvent($data)
    {
        return Event::query()->create($data);
    }
}

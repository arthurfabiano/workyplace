<?php

namespace App\Repositories;

use App\Models\Room;

class RoomRepository
{
    public function getRoomAll()
    {
        return Room::all();
    }

    public function createRoom($data)
    {
        return Room::query()->create($data);
    }

    public function findRoom($id)
    {
        return Room::query()->findOrFail($id);
    }

    public function deleteRoom($id)
    {
        return Room::destroy($id);
    }

}

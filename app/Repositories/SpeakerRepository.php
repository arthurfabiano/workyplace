<?php

namespace App\Repositories;


use App\Models\Speaker;

class SpeakerRepository
{
    public function getSpeakerAll()
    {
        return Speaker::all();
    }
}

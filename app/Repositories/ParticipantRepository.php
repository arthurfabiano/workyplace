<?php

namespace App\Repositories;

use App\Jobs\SendEmailRegistrationUser;
use App\Models\Participant;

class ParticipantRepository
{
    /**
     * @param $data
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function createParticipant($data)
    {
        return Participant::query()->create($data);
    }
}

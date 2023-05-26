<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "start" => Carbon::parse($this->start_date)->format('Y-m-d'),
            "end" => Carbon::parse($this->finish_date)->format('Y-m-d'),
            "constraint" => 'businessHours',
            "color" => '#257e4a'
        ];
    }
}

<?php

namespace App\Jobs;

use App\Models\Event;
use App\Models\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailRegistrationUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $participant;

    /**
     * Create a new job instance.
     */
    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $event = Event::query()->where('id', $this->participant->event_id)->get();

        Mail::send('email', ['event' => $event[0]], function ($message){
            $message->from('contato@worbyplace.com.br', 'Worbyplace');
            $message->to($this->participant->email, $this->participant->name);
            $message->subject('Participação no Evento');
        });
    }
}

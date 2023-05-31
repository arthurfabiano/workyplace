<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ParticipantsRequest;
use App\Jobs\SendEmailRegistrationUser;
use App\Models\Participant;
use App\Repositories\ParticipantRepository;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    public function __construct(
        protected ParticipantRepository $participantRepository
    ){}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $participants = Participant::query()->where('full_name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $participants = Participant::query()->latest()->paginate($perPage);
        }

        return view('participants.index', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('participants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ParticipantsRequest $request)
    {
        $requestData = $request->all();
        $participants = $this->participantRepository->createParticipant($requestData);

        SendEmailRegistrationUser::dispatch($participants);

        return redirect('participants')->with('flash_message', 'Participantes adicionado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $participant = Participant::query()->findOrFail($id);

        return view('participants.show', compact('participant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $participant = Participant::query()->findOrFail($id);

        return view('participants.edit', compact('participant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ParticipantsRequest $request, $id)
    {
        $requestData = $request->all();

        $participant = Participant::query()->findOrFail($id);
        $participant->update($requestData);

        return redirect('participants')->with('flash_message', 'Participante atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Participant::destroy($id);

        return redirect('participants')->with('flash_message', 'Participante deletado!');
    }
}

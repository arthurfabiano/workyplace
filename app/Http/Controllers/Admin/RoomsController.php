<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\RoomsRequest;
use App\Models\Room;
use App\Repositories\RoomRepository;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function __construct(
        protected RoomRepository $roomRepository
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
            $rooms = Room::where('name', 'LIKE', "%$keyword%")
                ->orWhere('number_of_participants', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $rooms = Room::latest()->paginate($perPage);
        }

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(RoomsRequest $request)
    {
        $requestData = $request->all();

        $this->roomRepository->createRoom($requestData);

        return redirect('rooms')->with('flash_message', 'Sala adicionada!');
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
        $room = $this->roomRepository->findRoom($id);

        return view('rooms.show', compact('room'));
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
        $room = $this->roomRepository->findRoom($id);

        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(RoomsRequest $request, $id)
    {
        $requestData = $request->all();

        $room = $this->roomRepository->findRoom($id);
        $room->update($requestData);

        return redirect('rooms')->with('flash_message', 'Sala atualizada!');
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
        $this->roomRepository->deleteRoom($id);

        return redirect('rooms')->with('flash_message', 'Sala deletada!');
    }
}

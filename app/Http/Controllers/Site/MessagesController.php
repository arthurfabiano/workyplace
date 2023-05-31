<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
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
            $messages = Message::where('full_name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('telefone', 'LIKE', "%$keyword%")
                ->orWhere('message', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $messages = Message::latest()->paginate($perPage);
        }

        return view('messages.index', compact('messages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'full_name' => 'required|string|max:150',
			'email' => 'required|string|max:150',
			'telefone' => 'required|string|max:20',
			'message' => 'required'
		]);
        $requestData = $request->all();

        Message::create($requestData);

        return redirect('contato')->with('message', 'Mensagem foi enviada, obrigado!');
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
        $message = Message::findOrFail($id);

        return view('messages.show', compact('message'));
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
        Message::destroy($id);

        return redirect('messages')->with('flash_message', 'Message deleted!');
    }
}

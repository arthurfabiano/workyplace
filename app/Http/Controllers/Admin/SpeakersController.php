<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\SpeakersRequest;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SpeakersController extends Controller
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
            $speakers = Speaker::where('name', 'LIKE', "%$keyword%")
                ->orWhere('telefone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $speakers = Speaker::latest()->paginate($perPage);
        }

        return view('speakers.index', compact('speakers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('speakers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SpeakersRequest $request)
    {
        $request['skills'] = json_encode($request['skills']);

        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $destinationPath = storage_path('/app/public/uploads');
            $file->move($destinationPath, $fileName);
            $requestData['image'] = 'uploads/' . $fileName;
        }

        Speaker::create($requestData);

        return redirect('speakers')->with('flash_message', 'Palestrante adicionado!');
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
        $speaker = Speaker::findOrFail($id);
        $skills = json_decode($speaker->skills);

        return view('speakers.show', compact('speaker', 'skills'));
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
        $speaker = Speaker::findOrFail($id);
        $skills = json_decode($speaker->skills);

        return view('speakers.edit', compact('speaker', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(SpeakersRequest $request, $id)
    {
        $request['skills'] = json_encode($request['skills']);

        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $destinationPath = storage_path('/app/public/uploads');
            $file->move($destinationPath, $fileName);
            $requestData['image'] = 'uploads/' . $fileName;
        }

        $speaker = Speaker::findOrFail($id);
        $speaker->update($requestData);

        return redirect('speakers')->with('flash_message', 'Palestrante atualizado!');
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
        Speaker::destroy($id);

        return redirect('speakers')->with('flash_message', 'Palestrando deletado!');
    }
}

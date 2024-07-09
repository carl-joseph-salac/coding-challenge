<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CrudController extends Controller
{
    public function showHome(): View
    {
        $infos = Crud::select('id', 'name', 'job', 'fav_color')->get();

        return view('home', compact('infos'));
    }

    public function showCreate()
    {
        return view('create');
    }

    public function saveInfo(Request $request): RedirectResponse
    {
        $infos = $request->validate([
            'name' => 'required|string',
            'job' => 'required|string',
            'fav_color' => 'required|string'
        ]);

        Crud::create($infos);

        return redirect()->route('showHome')->with('created', 'Created Successfully');
    }

    public function showEdit(Crud $info): View
    {
        return view('edit', compact('info'));
    }

    public function updateInfo(Request $request, Crud $info): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'job' => 'required|string',
            'fav_color' => 'required|string'
        ]);

        $info->update($data);

        return redirect()->route('showHome')->with('updated', 'Updated Successfully');
    }

    public function delete(Crud $info): RedirectResponse
    {
        $info->delete();
        return redirect()->route('showHome')->with('deleted', 'Deleted Successfully');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function showHome()
    {
        $infos = Crud::select('id', 'name', 'job', 'fav_color')->get();

        return view('home', compact('infos'));
    }

    public function showCreate()
    {
        return view('create');
    }

    public function saveInfo(Request $request)
    {
        $infos = $request->validate([
            'name' => 'required',
            'job' => 'required',
            'fav_color' => 'required'
        ]);

        Crud::create($infos);

        return redirect()->route('showHome')->with('created', 'Created Successfully');
    }

    public function showEdit(Crud $info)
    {
        return view('edit', compact('info'));
    }

    public function updateInfo(Request $request, Crud $info)
    {
        $data = $request->validate([
            'name' => 'required',
            'job' => 'required',
            'fav_color' => 'required'
        ]);

        $info->update($data);

        return redirect()->route('showHome')->with('updated', 'Updated Successfully');
    }

    public function delete(Crud $info)
    {
        $info->delete();
        return redirect()->route('showHome')->with('deleted', 'Deleted Successfully');
    }
}
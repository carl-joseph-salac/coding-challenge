<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function showHome()
    {
        return view('home');
    }

    public function showCreate()
    {
        return view('create');
    }

    public function saveInfo()
    {
        return redirect()->route('showHome');
    }

    public function showEdit()
    {
        return view('edit');
    }

    public function updateInfo()
    {
        return redirect()->route('showHome');
    }

    public function delete()
    {
        return redirect()->route('showHome');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view()
    {
        return view('admin.index');

        dd("AdminController");
    }

    public function identified(Request $request)
    {
        return view('admin.view');
    }
}

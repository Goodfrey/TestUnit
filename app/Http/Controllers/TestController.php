<?php

namespace App\Http\Controllers;

use App\Models\Shopping;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function view()
    {
        $sho    =   Shopping::first();
        dd($sho->identified, $sho->product->name, $sho->status->name, $sho->user->name);
        $user   =   User::first();
        dd(auth()->user()->type->name);

        dd("TestController");
    }
}

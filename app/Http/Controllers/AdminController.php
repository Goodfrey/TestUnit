<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Shopping;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view()
    {
        $status     =   Status::where('name', 'like', '%pendi%')->first()->id;
        $data       =   Invoices::where('status_id', '=', $status)->get()->groupBy('identified');

        $invoices   =   (COUNT($data) > 0) ? $data : '';

        return view('admin.index', ['invoices' => $invoices]);
    }

    public function identified(Request $request)
    {
        return view('admin.view');
    }

    public function invoices(Request $request)
    {
        $status     =   Status::where('name', 'like', '%pendi%')->first()->id;
        $shop       =   Shopping::where('status_id', '=', $status)->get()->groupBy('identified');

        dd($shop[0]);

        if(COUNT($shop) > 0)
        {
            foreach ($shop as $s => $sh)
            {
                dd($sh->identified);
            }
        }

        dd($shop);
    }
}

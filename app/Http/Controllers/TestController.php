<?php

namespace App\Http\Controllers;

use App\Models\Shopping;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function view()
    {
        $status     =   Status::where('name', 'like', '%pendi%')->first()->id;
        $shop       =   Shopping::where('status_id', '=', $status)->orderBy('identified', 'desc')->get();

        foreach ($shop as $k => $val)
        {
            $imp    =   round(($val->product->price * ($val->product->import/100)),2);
            $invo   =   [
                'identified'    =>  $val->identified,
                'shopping'      =>  $val->shopping_id,
                'price'         =>  $val->product->price,
                'import'        =>  $imp,
                'total'         =>  round(($val->product->price + $imp),2),
                'status'        =>  Status::where('name', 'like', '%proces%')->first()->id,
                'user'          =>  $val->user_id
            ];

        }

        dd("TestController");
    }
}

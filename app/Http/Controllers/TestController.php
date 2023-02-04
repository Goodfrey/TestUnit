<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Shopping;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function view()
    {
        dd("TestController");
    }
}

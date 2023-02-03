<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shopping;
use App\Models\Status;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function view()
    {
        return view('client.index',[
            'products'  =>  Product::get()
        ]);
    }

    public function add(Request $request)
    {

        $validator      =   Validator::make($request->all(), [
            'id'        => 'required',
            'ident'     => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrio un error verificando los datos, intente nuevamente',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $status =   Status::where('name', 'like', '%pendi%')->first()->id;

        $info   =   Shopping::where([
            ['product_id',  '=', $request->id],
            ['status_id',   '=', $status],
            ['user_id',     '=', auth()->user()->id],
        ])->get();

        if(COUNT($info) > 0)
        {
            return response()->json([
                'success' => false,
                'message' => 'El producto se encuentra agregado, en espera por facturacion',
            ], Response::HTTP_UNAUTHORIZED);
        }

        try {
            $new    =   new Shopping();
            $new->identified    =   $request->ident;
            $new->product_id    =   $request->id;
            $new->status_id     =   $status;
            $new->user_id       =   auth()->user()->id;

            $new->save();

            return response()->json([
                'success' => false,
                'message' => 'Producto agregado satisfactoriamente',
            ], Response::HTTP_OK);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], Response::HTTP_UNAUTHORIZED);
        }

        dd($request->all());
    }
}

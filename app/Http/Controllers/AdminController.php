<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Shopping;
use App\Models\Status;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function view()
    {
        $st     =   Status::where('name', 'like', '%proc%')->first()->id;
        $data   =   Invoices::where('status_id', '=', $st)->get();
        $invoices   =   (COUNT($data) > 0) ? $data : '';

        return view('admin.index', ['invoices' => $invoices]);
    }

    public function identified(Request $request)
    {
        $data    =   DB::select('SELECT s.id, s.identified, p.name, p.price, s.created_at date, ROUND((p.price * (p.import/100)),2) imp, ROUND((p.price - (p.price * (p.import/100))),2) sub FROM shoppings s INNER JOIN products p ON(s.product_id = p.id) AND S.identified = "'.$request->id.'"');
        return view('admin.view', [
            'data'  => $data
        ]);
    }

    public function invoices(Request $request)
    {
        $st     =   Status::where('name', 'like', '%pend%')->first()->id;
        $stP    =   Status::where('name', 'like', '%proc%')->first()->id;
        $price  =   $imp    =   $sub    =   $tot  =   0;
        $iData  =   [];

        $shop   =   Shopping::select('identified', 'user_id')->where('status_id', '=', $st)->get()->groupBy('identified');

        if(count($shop) > 0)
        {
            foreach ($shop as $k => $val)
            {
                $data    =   DB::select('SELECT s.identified, p.price, ROUND((p.price * (p.import/100)),2) imp, ROUND((p.price - (p.price * (p.import/100))),2) sub FROM shoppings s INNER JOIN products p ON(s.product_id = p.id) AND S.identified = "'.$k.'"');

                foreach ($data as $d => $da)
                {
                    $imp = ($da->imp + $imp);
                    $sub = ($da->sub + $sub);
                    $tot = ($da->price + $tot);
                }
            
                try{
                    $new    =   new Invoices();
                    $new->identified    = $k;
                    $new->shopping_id   = 1;
                    $new->price         = $sub;
                    $new->import        = $imp;
                    $new->total         = $tot;
                    $new->status_id     = $stP;
                    $new->user_id       = $val[0]->user_id;
                    $new->save();

                    $sub = $imp = $tot = 0;

                    $shopping = Shopping::where('identified','=', $k)->update(['status_id' => $stP]);

                }catch(\Exception $e){
                    return response()->json([
                        'success' => false,
                        'message' => "Error Procesando Facturacion",
                    ], Response::HTTP_UNAUTHORIZED);
                }
            }
            return response()->json([
                'success' => true,
                'message' => "Facturacion finalizada con exito",
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                'success' => false,
                'message' => "Sin datos para facturar",
            ], Response::HTTP_UNAUTHORIZED);
        }
        
    }
}

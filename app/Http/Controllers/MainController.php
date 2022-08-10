<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use App\State;
Use App\Stock;
Use App\City;
Use App\Supplier;
use Auth;
use Hash;

class MainController extends Controller
{
    //
    public function main(){
        $data['users'] = Stock::leftJoin('suppliers','suppliers.name','=','stocks.supplier_name')->leftjoin('states','states.id','=','suppliers.state')->select('states.name','supplier_name','cyl_qty_5','cyl_qty_10','cyl_qty_15')->get();
        return view('layouts.app',$data);
    }
}

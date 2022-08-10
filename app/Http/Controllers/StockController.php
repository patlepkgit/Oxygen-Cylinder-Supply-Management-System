<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use App\State;
Use App\Stock;
Use App\City;
Use App\Booking;
Use App\Supplier;
use Auth;
use Hash;

class StockController extends Controller
{
    //
    public function stock(){
        $data['suppliers'] = Supplier::get(["name", "id"]);
        // $data['users'] = DB::table('suppliers')->select('id','name')->get();
        return view('stocks',$data);
    }

    public function fetchData(Request $request){
        $q = Auth::user()->name;
        $data['stocks']=Stock::where('supplier_name','LIKE','%'.$q.'%')->get(["supplier_name","cyl_qty_5","cyl_qty_10","cyl_qty_15"]);
        $data['bookings'] = Booking::leftjoin('states','states.id','=','bookings.state')->leftjoin('cities','cities.id','=','bookings.city')->where('supplier_name','LIKE','%'.$q.'%')->select('bookings.name','cylinder_qty','states.name as state','cities.name as city','age','covid-19 as report','date_covid-19 as date')->get();          
        return view('dashboard',$data);
    }

   
    public function storeData(Request $request)
    {
        $request->validate([
            'cyl_qty_5'=> 'required|numeric|max:5',
            'cyl_qty_10'=> 'required|numeric|max:5',
            'cyl_qty_15'=> 'required|numeric|max:5'
        ]);

        // return $request->input();
        $q = Auth::user()->name;
        $affected=Stock::where('supplier_name','LIKE','%'.$q.'%')->update([
            'cyl_qty_5'=> $request->cyl_qty_5,
            'cyl_qty_10'=> $request->cyl_qty_10,
            'cyl_qty_15'=> $request->cyl_qty_15
             
          ]);

          return redirect()->intended('dashboard');
    } 

    public function process(){
        
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DropdownController extends Controller
{
    //
    // public function index()
    // {
    //     $data['countries'] = Country::get(["name", "id"]);
    //     return view('welcome', $data);
    // }

    // public function index()
    // {
        
    //     $data['states'] = State::get(["name", "id"]);
    //     return view('suplierReg', $data);
    // }

    // public function fetchCity(Request $request)
    // {
    //     $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
    //     return response()->json($data);
    // }
        function all(){
            // return DB::select('select * from suppliers where name=:name',['name'=>'ov']);
            // $titles = DB::table('suppliers')->pluck('name');

            // foreach ($titles as  $title) {
            //     echo $title;
            // }

            // DB::table('suppliers')->orderBy('id')->chunk(100,function($users){
            //     foreach($users as $user){}
            // });

            // return DB::table('suppliers')->count();
            // return DB::table('suppliers')->max('age');

            //  if (DB::table('suppliers')->where('id', 1)->exists()) {
            //     // ...
                
            // }

            // return DB::table('suppliers')->select('name','email as user_email')->get();
            // return DB::table('suppliers')->distinct()->get();

            // $query=DB::table('suppliers')->select('name');
            // $user=$query->addSelect('age')->get();
            // return $user;

            // $users = DB::table('suppliers')
            //  ->select(DB::raw('count(*) as user_count, name'))
            //  ->where('name', '<>', 1)
            //  ->groupBy('name')
            //  ->get();
            //  return $users;

            // $users = DB::table('suppliers')
            //     ->selectRaw('age * ? as ageup', [1])
            //     ->get();
            //     return  $users;
        }
}

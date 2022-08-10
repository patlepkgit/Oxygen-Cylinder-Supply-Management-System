<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use App\State;
Use App\Stock;
Use App\City;
Use App\Supplier;
use Auth;
use Hash;

class AuthController extends Controller
{
    //
    public function register()
    {
        $data['states'] = State::where("country_code","IN")->get(["name", "id"]);
        return view('supplierReg', $data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z]+$/u|unique:suppliers|max:255',
            'gender' => 'required|in:male,female',
            'age'=> 'required|numeric|max:150',
            'adhar_id'=>'required|unique:suppliers|digits:12',
            'id_proof'=>'required',
            'address'=>'required|max:255',
            'state'=>'required',
            'city'=>'required',
            'phone'=>'required|digits:10',
            'email' => 'required|string|email:rfc,dns|unique:suppliers',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        // return $request->input();

        $user=Supplier::create([
          'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'adhar_id' => $request->adhar_id,
            'id_proof' => $request->id_proof,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // user::create([
        //     'name' => $request->name,
        //     // 'gender' => $request->gender,
        //     // 'age' => $request->age,
        //     // 'adhar_id' => $request->adhar,
        //     // 'id_proof' => $request->idproof,
        //     // 'address' => $request->address,
        //     // 'state' => $request->state,
        //     // 'city' => $request->city,
        //     // 'phone' => $request->phone,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        Stock::create([
            'supplier_name'=>$request->name,
        ]);

        Auth::login($user,true);
        return redirect()->intended('dashboard');
    }

    

    public function login()
    {
      return view('supplierLogin');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

       
       
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->with('status','You are logged in !');
        }

        return redirect('login')->with('error', 'Oops! You have entered invalid credentials');
    }
    public function home()
    { 
      return view('dashboard');
    }

    public function logout() 
    {
        Auth::logout();
        return redirect('login');
    }


    

   
}

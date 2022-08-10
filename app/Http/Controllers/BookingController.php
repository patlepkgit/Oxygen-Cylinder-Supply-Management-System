<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\State;
use App\Stock;
use App\City;
use App\Supplier;
use App\Booking;
use Auth;
use Hash;

class BookingController extends Controller
{
    //
    public function book(Request $request)
    {
        $data['states'] = State::where("country_code", "IN")->get(["name", "id"]);
        return view('bookings', $data);
    }
    public function fetch_city(Request $request)
    {
        $data['cities'] = City::where("state_id", $request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetch_supplier(Request $request)
    {
        $data['suppliers'] = Supplier::where("state", $request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetch_quantity(Request $request)
    {
        $data['stocks'] = Stock::where("supplier_name", $request->name)
            ->get(["supplier_name", "cyl_qty_5", "cyl_qty_10", "cyl_qty_15"]);
        return response()->json($data);
    }



    public function search_by(Request $request)
    {
        $data['bookings'] = Booking::all();
        return response()->json($data);
    }


    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'age' => 'required|numeric|max:150',
            'adhar_id' => 'required|digits:12',
            'id_proof' => 'required',
            'covid_report' => 'required',

            'address' => 'required|max:255',
            'state' => 'required',
            'city' => 'required',
            'phone' => 'required|digits:10',
            'supplier' => 'required',
            'cylinder_qty' => 'required'
        ]);

        // return $request->input();

        Booking::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'adhar_id' => $request->adhar_id,
            'id_proof' => $request->id_proof,
            'covid-19' => $request->covid_report,
            'date_covid-19' => $request->date,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'phone' => $request->phone,
            'supplier_name' => $request->supplier,
            'cylinder_qty' => $request->cylinder_qty

        ]);
 
        //   return redirect('login');
        return redirect('booking_status')->with('success', 'Your booking recorded');
    }

    public function status()
    {
        $data['users'] = Booking::leftjoin('states', 'states.id', '=', 'bookings.state')->select('bookings.name', 'supplier_name', 'cylinder_qty', 'states.name as state')->get();
        return view('booking_status', $data);
    }
}

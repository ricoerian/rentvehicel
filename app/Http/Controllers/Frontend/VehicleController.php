<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Vehicle;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\BookingRequest;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $vehicles = Vehicle::where('status',1);
        
        if($request->category_id && $request->penumpang){
            $vehicles = $vehicles->Where('type_id',$request->category_id)->Where('penumpang','>=',$request->penumpang);
        }
        
        $vehicles = $vehicles->get();
        return view('frontend.vehicle.index', compact('vehicles'));
    }

    public function show(Vehicle $vehicle)
    {
        return view('frontend.vehicle.show', compact('vehicle'));
    }

    public function store(BookingRequest $request)
    {
        Booking::create($request->validated());

        return redirect()->back()->with([
            'message' => 'kami akan menghubungi anda secepatnya !',
            'alert-type' => 'success'
        ]);
    }
}

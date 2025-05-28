<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vehicle;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\VehicleRequest;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::get();

        return view('admin.vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = Vehicle::statuses();
        $types = Type::get(['id','nama']);

        return view('admin.vehicles.create', compact('statuses','types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleRequest $request)
    {
        if($request->validated()) {
            $image = $request->file('image')->store(
                'vehicles/images', 'public'
            );
            $slug = Str::slug($request->nama_ken, '-');

            Vehicle::create($request->except('image') + ['image' => $image,'slug' => $slug]);
        }

        return redirect()->route('admin.vehicles.index')->with([
            'message' => 'berhasil di buat',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        $statuses = Vehicle::statuses();
        $types = Type::get(['id','nama']);

        return view('admin.vehicles.edit', compact('Vehicle','types','statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        if($request->validated()){
            $slug = Str::slug($request->nama_ken, '-');
            if($request->image) {
                File::delete('storage/' . $vehicle->image);
                $image = $request->file('image')->store(
                    'vehicles/images', 'public'
                );
                $vehicle->update($request->except('image') + ['image' => $image, 'slug' => $slug]);
            }else {
                $vehicle->update($request->validated() + ['slug' => $slug]);
            }
        }

        return redirect()->route('admin.vehicles.index')->with([
            'message' => 'berhasil di edit',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        File::delete('storage/' . $vehicle->image);
        $vehicle->delete();

        return redirect()->back()->with([
            'message' => 'berhasil di hapus',
            'alert-type' => 'danger'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\VehicleYear;
use Illuminate\Http\Request;
use App\Models\VehicleMake;
use App\Models\VehicleModel;

class VehicleYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'admin.vehicle-year.year-list',
            [
                'vehicle_years' => VehicleYear::all(),
                'vehicle_makes' => VehicleMake::all(),
                'vehicle_models' => VehicleModel::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view(
            'admin.vehicle-year.add-year',
            [
                'vehicle_makes' => VehicleMake::all(),
                'model_types' => VehicleModel::all()
            ]
        );

    }


    public function store(Request $request)
    {
        $available_year = VehicleYear::where('make_id', $request->make_id)
            ->where('model_id', $request->model_id)
            ->where('year', $request->year)
            ->count();
        // return $available_year;
        // dd(empty($available_year));
        if ($available_year == '0') {
            $vehicle_year = VehicleYear::create([
                "make_id" => $request->make_id,
                "model_id" => $request->model_id,
                "year" => $request->year,
                "status" => $request->status,
            ]);

            if ($vehicle_year) {
                session()->flash('success', 'Vehicle Year Successfully Added !');
            }
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleYear $vehicleYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VehicleYear $vehicleYear)
    {
        // return $vehicleYear;
        return view(
            'admin.vehicle-year.edit-year',
            [
                'vehicle_makes' => VehicleMake::all(),
                'model_types' => VehicleModel::all(),
                'vehicle_year' => $vehicleYear,

            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehicleYear $vehicleYear)
    {
        $available_year = VehicleYear::where('make_id', $request->make_id)
            ->where('model_id', $request->model_id)
            ->where('year', $request->year)
            ->count();
        // return $available_year;
        // dd(empty($available_year));
        if ($available_year == '0') {
            $vehicleYear->update([
                "make_id" => $request->make_id,
                "model_id" => $request->model_id,
                "year" => $request->year,
                "status" => $request->status,
            ]);

            session()->flash('update_success', 'Vehicle Year Successfully Updated !');

        }

        return redirect('vehicle-year');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleYear $vehicleYear)
    {

        $vehicleYear->delete();

        return back();
    }
}

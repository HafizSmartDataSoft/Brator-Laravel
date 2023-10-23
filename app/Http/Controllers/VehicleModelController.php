<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleModel as RequestsVehicleModel;
use App\Http\Requests\VehicleModelRequest;
use App\Models\EngineType;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use Illuminate\Http\Request;

class VehicleModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'admin.vehicle-model.vehicle-model-list',
            [
                'vehicle_models' => VehicleModel::all(),
                'vehicle_makes' => VehicleMake::all(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'admin.vehicle-model.add-vehicle-model',
            [
                'engine_types' => EngineType::all(),
                'vehicle_makes' => VehicleMake::all(),
            ]

        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleModelRequest $request)
    {
        // return $request;
        $slug = $this->slugify($request->name);

        $vehicle_model = VehicleModel::create([
            "name" => $request->name,
            "slug" => $slug,
            "description" => $request->description,
            "make_id" => $request->make_id,
            "status" => $request->status,
        ]);

        if ($vehicle_model) {
            session()->flash('success', 'Vehicle Model Successfully Added !');
        }
        // fail
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleModel $vehicleModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VehicleModel $vehicleModel)
    {
        return view(
            'admin.vehicle-model.edit-vehicle-model',
            [
                'vehicle_model' => $vehicleModel,
                'engine_types' => EngineType::all(),
                'vehicle_makes' => VehicleMake::all(),

            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehicleModel $vehicleModel)
    {
        $slug = $this->slugify($request->name);

        $vehicleModel->update([
            "name" => $request->name,
            "slug" => $slug,
            "description" => $request->description,
            "make_id" => $request->make_id,
            "status" => $request->status,
        ]);
        session()->flash('update_success', 'Vehicle Model Successfully Updated !');

        return redirect('vehicle-model');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleModel $vehicleModel)
    {
        $vehicleModel->delete();

        return back();
    }
    public function slugify($text)
    {
        // Replace non-alphanumeric characters with dashes
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // Transliterate non-ASCII characters
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // Remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // Convert to lowercase
        $text = strtolower($text);

        // Remove leading/trailing dashes
        $text = trim($text, '-');

        return $text;
    }
}

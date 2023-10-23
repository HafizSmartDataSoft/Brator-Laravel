<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleMakeRequest;
use App\Models\VehicleMake;
use Illuminate\Http\Request;
use App\Models\VehicleModel;


class VehicleMakeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'admin.vehicle-make.vehicle-make-list',
            ['vehicle_makes' => VehicleMake::all()]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'admin.vehicle-make.add-vehicle-make'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleMakeRequest $request)
    {
        // return $request;
        $slug = $this->slugify($request->name);
        $image_url = null;

        if ($request->image) {
            $image_url = $this->saveImage($request);
        }

        $vehicle_make = VehicleMake::create([
            "name" => $request->name,
            "slug" => $slug,
            "description" => $request->description,
            "link" => $request->link,
            "image" => $image_url,
            "status" => $request->status,
        ]);

        if ($vehicle_make) {
            session()->flash('success', 'Vehicle Make Successfully Added !');
        }
        // fail
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleMake $vehicleMake)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VehicleMake $vehicleMake)
    {
        return view(
            'admin.vehicle-make.edit-vehicle-make',
            [
                'vehicle_make' => $vehicleMake,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehicleMake $vehicleMake)
    {
        // return $request;
        if ($vehicleMake->name != $request->name) {

            $request->validate([
                'name' => 'required|string|max:255|unique:vehicle_makes,name'
            ]);
        }
        $slug = $this->slugify($request->name);
        $vehicleMake->update([
            "name" => $request->name,
            "slug" => $slug,
            "description" => $request->description,
            "link" => $request->link,
            "status" => $request->status,
        ]);

        if ($request->image) {
            if ($vehicleMake->image != null) {
                unlink($vehicleMake->image);
            }
            $image_url = $this->saveImage($request);
            $vehicleMake->update([

                "image" => $image_url,

            ]);
        }
        session()->flash('update_success', 'Vehicle Make Successfully Updated !');

        return redirect('admin/vehicle-make');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleMake $vehicleMake)
    {
        if($vehicleMake->image){
            unlink($vehicleMake->image);
        }
        $vehicleMake->delete();

        return back();
    }

    public function saveImage($request)
    {
        $image = $request->file('image');
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $directory = 'assets/frontend/make/make-image/';
        $imageUrl = $directory . $imageName;
        $image->move($directory, $imageName);
        return $imageUrl;
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

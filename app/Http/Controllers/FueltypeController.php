<?php

namespace App\Http\Controllers;

use App\Models\FuelType;
use Illuminate\Http\Request;
use App\Http\Requests\FuelTypeRequest;



class FueltypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'admin.fuel-type.fuel-type-list',
            ['fuel_types' => FuelType::all()]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fuel-type.add-fuel-type');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FuelTypeRequest $request)
    {
        $slug = $this->slugify($request->name);


        $fuel_type = FuelType::create([
            "name" => $request->name,
            "slug" => $slug,
            "description" => $request->description,
            "status" => $request->status,
        ]);

        if ($fuel_type) {
            session()->flash('success', 'Fuel Type Successfully Added !');
        }
        // fail
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(FuelType $fuelType)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FuelType $fuelType)
    {
        return view(
            'admin.fuel-type.edit-fuel-type',
            ['fuel_type' => $fuelType]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FuelType $fuelType)
    {
        // dd($fuelType);
        // dd($request);
        $slug = $this->slugify($request->name);

        $fuelType->update([
            "name"=>$request->name,
            "slug"=>$slug,
            "description"=>$request->description,
            "status"=>$request->status,
        ]);
        session()->flash('update_success', 'Fuel Type Successfully Updated !');

        return redirect('fuel-type');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FuelType $fuelType)
    {
        // dd(1);
        $fuelType->delete();

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

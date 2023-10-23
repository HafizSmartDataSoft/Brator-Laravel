<?php

namespace App\Http\Controllers;

use App\Http\Requests\EngineTypeRequest;
    use App\Models\EngineType;
use Illuminate\Http\Request;
use App\Models\FuelType;

class EngineTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'admin.engine-type.engine-type-list',
            ['engine_types' => EngineType::all()]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'admin.engine-type.add-engine',
            ['fuel_types' => FuelType::all()]

        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EngineTypeRequest $request)
    {
        $slug = $this->slugify($request->name);

        $engine_type = EngineType::create([
            "name" => $request->name,
            "slug" => $slug,
            "description" => $request->description,
            "fuel_id" => $request->fuel_id,
            "status" => $request->status,
        ]);

        if ($engine_type) {
            session()->flash('success', 'Engine Type Successfully Added !');
        }
        // fail
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(EngineType $engineType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EngineType $engineType)
    {
        return view(
            'admin.engine-type.edit-engine',
            ['engine_type' => $engineType,
            'fuel_types' => FuelType::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EngineType $engineType)
    {
        $slug = $this->slugify($request->name);

        $engineType->update([
            "name" => $request->name,
            "slug" => $slug,
            "description" => $request->description,
            "fuel_id" => $request->fuel_id,
            "status" => $request->status,
        ]);
        session()->flash('update_success', 'Engine Type Successfully Updated !');

        return redirect('engine-type');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EngineType $engineType)
    {
        $engineType->delete();

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSubCategory;
use App\Models\VehicleYear;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return $years = VehicleYear::all()->pluck('year')->unique();
        return view(
            'frontend.home.home',
            [
                // 'categories' => Category::orderBy('created_at','DESC')->paginate(4),
                'categories' => Category::all(),
                'products' => Product::all(),
                'sub_categories' => ProductSubCategory::all(),
                'years' => VehicleYear::all()->pluck('year')->unique(),

            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

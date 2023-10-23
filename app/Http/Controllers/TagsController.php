<?php

namespace App\Http\Controllers;

use App\Models\TagModel;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('admin.product-tag.tag-list',   [
            'tags' => TagModel::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.product-tag.add-tag');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $available_tag = TagModel::where('name', $request->name)
            ->count();
        if ($available_tag == '0') {

            $tags = TagModel::create([
                "name" => $request->name,
                "status" => $request->status,

            ]);

            session()->flash('success', 'Tag Successfully Added !');

        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(TagModel $productTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TagModel $product_tag)
    {
        // dd($productTag);
        // return $product_tag;
        return view(
            'admin.product-tag.edit-tag',
            [
                'product_tag' => $product_tag,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TagModel $productTag)
    {
        $available_tag = TagModel::where('name', $request->name)
            ->count();

        if ($available_tag == '0') {
            $productTag->update([
                "name" => $request->name,
                "status" => $request->status,

            ]);
            session()->flash('update_success', 'Tag Model Successfully Updated !');

        }

        return redirect('product-tag');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TagModel $productTag)
    {
        // return $productTag;
        $productTag->delete();

        return back();
    }
}

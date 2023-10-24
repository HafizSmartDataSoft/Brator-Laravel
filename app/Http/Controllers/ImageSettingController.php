<?php

namespace App\Http\Controllers;

use App\Models\ImageSetting;
use App\Models\type_work_on;
use App\Models\TypeWorkOn;
use Illuminate\Http\Request;

class ImageSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.image-setting.list', [
            "image_settings" => ImageSetting::all(),
            "work_ons" => TypeWorkOn::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.image-setting.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;

        $image_setting = ImageSetting::create([
            "type_name" => $request->type_name,
            "width" => $request->width,
            "height" => $request->height,
            "status" => $request->status,
        ]);

        if ($request->work_on) {
            foreach ($request->work_on as $work_on) {
                $type_work_on = TypeWorkOn::create([
                    "type_id" => $image_setting->id,
                    "work_on" => $work_on,
                ]);
            }
        }
        return back()->with('success', 'Image setting Added Successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(ImageSetting $imageSetting)
    {
        return $imageSetting;
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImageSetting $imageSetting)
    {
        $workOns = $imageSetting->workOn;
        // return $workOns;
        return view(
            'admin.image-setting.edit',
            [
                "imageSetting" => $imageSetting,
                "workOns" => $workOns,
            ]
        );
        // return $imageSetting;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ImageSetting $imageSetting)
    {
        // return $request;
        if ($request->work_on) {
            $deleted = TypeWorkOn::where('type_id', $imageSetting->id)->delete();
            foreach ($request->work_on as $work_on) {
                $product_sub_category = TypeWorkOn::create([
                    "type_id" => $imageSetting->id,
                    "work_on" => $work_on,
                ]);
            }
        }
        $imageSetting->update([
            "type_name" => $request->type_name,
            "width" => $request->width,
            "height" => $request->height,
            "status" => $request->status,
        ]);
        session()->flash('update_success', 'Image Setting Successfully Updated !');
        return redirect('admin/image-setting');
        // return $request;
    }
    public function getImageSetting(Request $request)
    {
        // return $request;
        $makeId = $request->input('make_id');
        $models = TypeWorkOn::where('work_on', $makeId)->distinct()->pluck('type_id');
        // $models = TypeWorkOn::where('work_on', $makeId)->get();
        $models = ImageSetting::find($models);
        return $models;
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImageSetting $imageSetting)
    {
        $deleted = TypeWorkOn::where('type_id', $imageSetting->id)->delete();

        $imageSetting->delete();
        return back();
        //
    }
}

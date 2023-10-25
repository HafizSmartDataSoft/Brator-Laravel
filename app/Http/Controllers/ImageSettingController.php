<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImageSetting;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\type_work_on;
use App\Models\TypeWorkOn;
use Intervention\Image\Facades\Image;

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

    public function regenerateThumbnails(Request $request)
    {
        // return $request;
        if ($request->worksOn == 'all') {

            //for products
            $productImageSettings = $this->productImageSettings();

            //for category
            $categories = Category::all();
            foreach ($categories as $category) {
                if ($category->image != null) {
                    $imageUrl = $this->save_category_image($category->image);
                }
            }
        } elseif ($request->worksOn == 'product') {
            if ($request->setting_type == 'all') {
                $this->productImageSettings();
            } else {
                $imageSetting = ImageSetting::find($request->setting_type);
                $products = Product::all();
                // return $imageSettings;

                foreach ($products as $product) {
                    //for featured image
                    $main_images = ProductImage::where('product_id', $product->id)->where('image_type', 'main')->get();
                    if (count($main_images) != 0) {
                            $deleted = ProductImage::where('product_id', $product->id)->where('image_type', $imageSetting->type_name)->delete();
                            foreach ($main_images as $main_image) {
                                    $typeName = $imageSetting->type_name;
                                    $extension = pathinfo($main_image->image, PATHINFO_EXTENSION);
                                    $img = Image::make($main_image->image);
                                    // return $extension;
                                    $directory = 'assets/frontend/product/gallery-images/' . $typeName . '/';
                                    $imageName = rand() . '.' . $extension;
                                    $imageUrl = $directory . $imageName;
                                    $img->resize($imageSetting->width, $imageSetting->height, function ($c) {
                                        // $c->aspectRatio();
                                        // $c->upsize();
                                    });

                                    if (!file_exists($directory)) {
                                        mkdir($directory, 0777, true);
                                    }

                                    $gallaryImage = ProductImage::create([
                                        "product_id" => $product->id,
                                        "image" => $imageUrl,
                                        "image_type" => $typeName,
                                    ]);

                                    $img->save($directory . $imageName);
                            }
                    }
                }
                // return $imageSettings;
            }
        }elseif ($request->worksOn == 'category') {

            $categories = Category::all();
            foreach ($categories as $category) {
                if ($category->image != null) {
                    $imageUrl = $this->save_category_image($category->image);
                }
            }
        }


        return back()->with('success', 'Regenerate Thumbnails Complete!');
    }
    public function productImageSettings()
    {

        $workOns = TypeWorkOn::where('work_on', 'product')->get();
        $workOns = $workOns->pluck('type_id');
        $imageSettings = ImageSetting::find($workOns)->where('status', 1);
        $products = Product::all();
        // return $imageSettings;

        foreach ($products as $product) {
            //for featured image
            if ($product->featured_image != null) {
                $imageUrl = $this->save_featured_image($product->featured_image);
            }
            $main_images = ProductImage::where('product_id', $product->id)->where('image_type', 'main')->get();
            if (count($main_images) != 0) {
                foreach ($imageSettings as $imageSetting) {
                    // return $imageSetting;
                    $deleted = ProductImage::where('product_id', $product->id)->where('image_type', $imageSetting->type_name)->delete();
                }

                foreach ($main_images as $main_image) {
                    foreach ($imageSettings as $imageSetting) {
                        $typeName = $imageSetting->type_name;
                        $extension = pathinfo($main_image->image, PATHINFO_EXTENSION);
                        $img = Image::make($main_image->image);
                        // return $extension;
                        $directory = 'assets/frontend/product/gallery-images/' . $typeName . '/';
                        $imageName = rand() . '.' . $extension;
                        $imageUrl = $directory . $imageName;
                        $img->resize($imageSetting->width, $imageSetting->height, function ($c) {
                            // $c->aspectRatio();
                            // $c->upsize();
                        });

                        if (!file_exists($directory)) {
                            mkdir($directory, 0777, true);
                        }

                        $gallaryImage = ProductImage::create([
                            "product_id" => $product->id,
                            "image" => $imageUrl,
                            "image_type" => $typeName,
                        ]);

                        $img->save($directory . $imageName);
                    }
                }
            }
        }
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
    public function save_featured_image($request)
    {
        $home_default = ImageSetting::where('type_name', 'home_default')->where('status', 1)->first();
        //resize working
        // $image=Image::make($image)->driver('imagick');
        // $image = $request->file('featured_image');
        $image = $request;
        // $imageName = rand() . '.' . $image->getClientOriginalExtension();
        // $directory = 'assets/frontend/product/featured_image/';
        // $imageUrl = $directory . $imageName;
        $img = Image::make($image);
        $img->resize($home_default->width, $home_default->height, function ($c) {
            // $img->resize(300, 400, function ($c) {
            // $c->aspectRatio();
            // $c->upsize();
        });
        $img->save();
        // $img->save($directory . $imageName);
        // unlink($request);
        // $image->move($directory, $imageName);
        // return $imageUrl;
    }
    public function save_category_image($request)
    {
        $category_default = ImageSetting::where('type_name', 'category_default')->where('status', 1)->first();
        $image = $request;
        $img = Image::make($image);
        $img->resize($category_default->width, $category_default->height, function ($c) {
        });
        $img->save();
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

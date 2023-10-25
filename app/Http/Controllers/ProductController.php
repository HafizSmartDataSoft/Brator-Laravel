<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\VehicleYear;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use App\Models\Category;
use App\Models\ImageSetting;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSubCategory;
use App\Models\ProductTag;
use App\Models\TagModel;
use App\Models\TypeWorkOn;
// use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Facades\Image;
use Illuminate\Http\JsonResponse;



class ProductController extends Controller
{
    public function __construct()
    {
        request()->all();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'admin.product.product-list',
            [
                'products' => Product::all(),
                'categories' => Category::all(),
                'sub_categories' => ProductSubCategory::all(),
            ]

        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::with('children')->whereNull('parent_id')->get();
        // dd($categories);

        // return $categories;

        return view(
            'admin.product.add-product',
            [
                'vehicle_years' => VehicleYear::all(),
                'vehicle_makes' => VehicleMake::all(),
                'vehicle_models' => VehicleModel::all(),
                'tags' => TagModel::all(),
                'categories' => $categories

            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    //     public function store(Request $request): JsonResponse
    //     {
    // return $request;
    //         // dd($request);
    //         $image = $request->file('file');
    //         // dd($image);
    //         $imageName = time().'.'.$image->extension();
    //         $image->move(public_path('images'),$imageName);
    //         return response()->json(['success'=>$imageName]);
    //     }

    public function store(ProductRequest $request)
    {
        // $files = $_FILES;
        // return $files;
        // $images = session()->get('product.gallery');
        // return $images;
        // return $request;
        // if ($request->hasFile('file')) {

        // $files = $request->file('file');
        // return $files;

        //     foreach ($files as $file) {
        //         $fileName = $file->getClientOriginalName();
        //         $file->storeAs('uploads', $fileName);
        //         // Additional processing as needed
        //     }
        // }

        //    return $request->sub_category;

        $slug = $this->slugify($request->name);
        $image_url = null;

        if ($request->featured_image) {
            $image_url = $this->saveImage($request);
        }

        $product = Product::create([
            "name" => $request->name,
            "slug" => $slug,
            "sku" => $request->sku,
            "description" => $request->description,
            "base_price" => $request->base_price,
            "sale_price" => $request->sale_price,
            "cost_price" => $request->cost_price,
            "tax" => $request->tax,
            "quantity" => $request->quantity,
            "alert_threshold" => $request->alert_threshold,
            "status" => $request->status,
            "parent_category" => $request->parent_category,
            // "sub_category"=>$request->sub_category,
            // "tag" => $request->tag,
            "make_id" => $request->make_id,
            "year_id" => $request->year_id,
            "model_id" => $request->model_id,
            "featured_image" => $image_url,
            // "gallary_images"=>$request->gallary_images,
        ]);

        // return $product->id;
        if ($request->tag) {
            foreach ($request->tag as $tag) {
                $product_tag = ProductTag::create([
                    "product_id" => $product->id,
                    "tag_id" => $tag,
                ]);
            }
        }

        if ($request->sub_category) {
            foreach ($request->sub_category as $category) {
                $product_sub_category = ProductSubCategory::create([
                    "product_id" => $product->id,
                    "parent_id" => $request->parent_category,
                    "sub_category_id" => $category,
                ]);
            }
        }

        //save gallary images
        // $images = session()->get('product.gallery');
        // // return $images;
        // if (is_array($images)) {
        //     foreach ($images as $image) {
        //         $gallaryImage = ProductImage::create([
        //             "product_id" => $product->id,
        //             "image" => $image,
        //             // "gallary_images"=>$request->gallary_images,
        //         ]);
        //     }
        //     session()->forget('product.gallery');
        // }

        $workOns = TypeWorkOn::where('work_on', 'product')->get();
        $workOns = $workOns->pluck('type_id');
        $imageSettings = ImageSetting::find($workOns)->where('status', 1);

        // $deleted = ProductImage::where('product_id', $product->id)->delete();
        $count = 0;
        $main_images = session()->get('product.main');
        // return $main_images;
        if (is_array($main_images)) {
            //first adding image main then type image
            foreach ($main_images as $main_image) {
                $gallaryImage = ProductImage::create([
                    "product_id" => $product->id,
                    "image" => $main_image,
                    "image_type" => 'main',
                ]);
                // return $gallaryImage;
            }
            session()->forget('product.main');

            foreach ($imageSettings as $imageSetting) {
                $typeName = $imageSetting->type_name;
                $images = session()->get('product' . $typeName);
                // session()->forget('product' . $typeName);
                // return $images;
                if (is_array($images)) {
                    foreach ($images as $image) {
                        $gallaryImage = ProductImage::create([
                            "product_id" => $product->id,
                            "image" => $image,
                            "image_type" => $typeName,
                        ]);
                    }
                }
                $count++;
                session()->forget('product' . $typeName);
            }
        }

        if ($product) {
            session()->flash('success', 'Product Successfully Added !');
        }
        // fail
        return back();
        // dd($request);
        // return $request;
    }
    // public function store(Request $request)
    // {
    //     return $request;
    //     // Validate the form data, including image_names if needed
    //     $request->validate([
    //         // Validation rules for other form fields
    //         'image_names' => 'required|array',
    //     ]);
    //     // Retrieve the uploaded image names
    //     $uploadedImages = json_decode($request->input('image_names'));

    //     // Now you have an array of image names to work with
    //     // You can store them in the database, move the files, etc.

    //     // Handle other form data and product creation logic here

    //     return redirect()->route('product.index')->with('success', 'Product created successfully');
    // }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
    }
    public function dropzoneImage(Request $request)
    {
        session()->forget('product.main');

        $workOns = TypeWorkOn::where('work_on', 'product')->get();
        $workOns = $workOns->pluck('type_id');
        $imageSettings = ImageSetting::find($workOns)->where('status', 1);
        // dd($imageSettings);

        $images = $request->file('file');
        // return $images;

        foreach ($images as $image) {
            $main = $image;

            // dd($image->getClientOriginalName());
            $extention = $image->getClientOriginalExtension();

            $main_directory = 'assets/frontend/product/gallery-images/';
            $main_imageName = rand() . '.' . $main->getClientOriginalExtension();
            $main_imageUrl = $main_directory . $main_imageName;
            session()->push('product.main', $main_imageUrl);

            // return $image;
            // return $m_image;

            foreach ($imageSettings as $imageSetting) {
                // for ($i = 0; $i < count($imageSettings); $i++) {
                // dd($imageSettings);
                // if ($imageSetting) {
                $typeName = $imageSetting->type_name;
                // $width = $imageSetting->width;
                // $height = $imageSetting->height;

                // return $extension;
                $directory = 'assets/frontend/product/gallery-images/' . $typeName . '/';
                $imageName = rand() . '.' . $extention;
                $imageUrl = $directory . $imageName;
                session()->push('product' . $typeName, $imageUrl);
                $img = Image::make($image);
                $img->resize($imageSetting->width, $imageSetting->height, function ($c) {
                    // $c->aspectRatio();

                    $c->upsize();
                });
                if (!file_exists($directory)) {
                    mkdir($directory, 0777, true); // Create the directory recursively with full permissions
                }
                //resize working
                // $image=Image::make($image)->driver('imagick');
                $img->save($directory . $imageName);
                // $image->move($directory, $imageName);
                // }
            }

            $main->move($main_directory, $main_imageName);
        }
        return $imageUrl;
    }
    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Product $product)
    {

        // return $product;
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $sub_categories = ProductSubCategory::where('product_id', $product->id)->get();
        $products_tags = ProductTag::where('product_id', $product->id)->get();
        $gallaryImages = ProductImage::where('product_id', $product->id)->get();


        // dd($sub_categories);
        // return $sub_categories ;
        return view(
            'admin.product.edit-product',
            [
                'product' => $product,
                'categories' => Category::all(),
                'products' => Product::all(),
                'sub_categories' => $sub_categories,
                'vehicle_years' => VehicleYear::all(),
                'vehicle_makes' => VehicleMake::all(),
                'vehicle_models' => VehicleModel::all(),
                'tags' => TagModel::all(),
                'products_tags' => $products_tags,
                'categories' => $categories,
                'gallaryImages' => $gallaryImages,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Product $product)
    {

        // return $request;
        // $images = session()->get('product.gallery');
        // return $images;
        $image_url = null;

        if ($request->tag) {
            $deleted = ProductTag::where('product_id', $product->id)->delete();
            foreach ($request->tag as $tag) {
                $product_tag = ProductTag::create([
                    "product_id" => $product->id,
                    "tag_id" => $tag,
                ]);
            }
        }

        if ($request->sub_category) {
            $deleted = ProductSubCategory::where('product_id', $product->id)->delete();
            foreach ($request->sub_category as $category) {
                $product_sub_category = ProductSubCategory::create([
                    "product_id" => $product->id,
                    "parent_id" => $request->parent_category,
                    "sub_category_id" => $category,
                ]);
            }
        }

        if ($request->featured_image) {
            if ($product->featured_image != null) {
                unlink($product->featured_image);
            }
            $image_url = $this->saveImage($request);
            $product->update([
                "featured_image" => $image_url,
            ]);
        }

        // session()->push('product.gallery', $imageUrl);
        // $typeName='cart_default';
        // $productImages = session()->get('product' . $typeName);
        // $images = session()->get('product.gallery'); // Use 'product.gallery' instead of 'product.gallery'
        // return $productImages;


        $workOns = TypeWorkOn::where('work_on', 'product')->get();
        $workOns = $workOns->pluck('type_id');
        $imageSettings = ImageSetting::find($workOns)->where('status', 1);

        // $deleted = ProductImage::where('product_id', $product->id)->delete();
        $count = 0;
        $main_images = session()->get('product.main');
        // return $main_images;
        if (is_array($main_images)) {

            //deleting previous images
            $gallaryImages = ProductImage::where('product_id', $product->id)->get();
            foreach ($gallaryImages as $gallaryImage) {
                unlink($gallaryImage->image);
            }
            $deleted = ProductImage::where('product_id', $product->id)->delete();

            //first adding image main then type image
            foreach ($main_images as $main_image) {
                $gallaryImage = ProductImage::create([
                    "product_id" => $product->id,
                    "image" => $main_image,
                    "image_type" => 'main',
                ]);
                // return $gallaryImage;
            }
            session()->forget('product.main');

            foreach ($imageSettings as $imageSetting) {
                $typeName = $imageSetting->type_name;
                $images = session()->get('product' . $typeName);
                // session()->forget('product' . $typeName);
                // return $images;
                if (is_array($images)) {
                    foreach ($images as $image) {
                        $gallaryImage = ProductImage::create([
                            "product_id" => $product->id,
                            "image" => $image,
                            "image_type" => $typeName,
                        ]);
                    }
                }
                $count++;
                session()->forget('product' . $typeName);
            }
        }
        // $images = session()->get('product.gallery');
        // return $images;

        // return $request;
        if ($product->sku != $request->sku) {
            $request->validate([
                'sku' => 'required|string|max:255|unique:products,sku'
            ]);
        }
        $slug = $this->slugify($request->name);
        $product->update([
            "name" => $request->name,
            "slug" => $slug,
            "sku" => $request->sku,
            "description" => $request->description,
            "base_price" => $request->base_price,
            "sale_price" => $request->sale_price,
            "cost_price" => $request->cost_price,
            "tax" => $request->tax,
            "quantity" => $request->quantity,
            "alert_threshold" => $request->alert_threshold,
            "status" => $request->status,
            "parent_category" => $request->parent_category,
            // "sub_category"=>$request->sub_category,
            // "tag" => $request->tag,
            "make_id" => $request->make_id,
            "year_id" => $request->year_id,
            "model_id" => $request->model_id,
        ]);

        session()->flash('update_success', 'Product Successfully Updated !');

        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $gallaryImages = ProductImage::where('product_id', $product->id)->get();

        foreach ($gallaryImages as $gallaryImage) {
            unlink($gallaryImage->image);
        }
        $deleted = ProductImage::where('product_id', $product->id)->delete();

        if ($product->featured_image) {

            unlink($product->featured_image);
        }
        ProductTag::where('product_id', $product->id)->delete();
        ProductSubCategory::where('product_id', $product->id)->delete();
        $product->delete();
        return back();
    }


    public function getMake(Request $request)
    {
        // return $request;
        $year = $request->input('year_id');
        // $models = VehicleYear::where('make_id', $makeId)->distinct()->pluck('model_id');
        $make = VehicleYear::where('year', $year)->distinct()->pluck('make_id');
        $makes = VehicleMake::find($make);
        return $makes;
    }

    public function getModel(Request $request)
    {
        // return $request;
        $makeId = $request->input('make_id');
        // $models = VehicleYear::where('make_id', $makeId)->distinct()->pluck('model_id');
        $models = VehicleYear::where('make_id', $makeId)->get();
        $models = VehicleModel::find($models);
        return $models;
    }

    public function getYear(Request $request)
    {
        // return $request;
        $makeId = $request->input('make_id');
        $modelId = $request->input('model_id');

        $years = VehicleYear::select('id', 'year')
            ->where('make_id', $makeId)
            ->where('model_id', $modelId)
            ->distinct()
            ->get();
        return $years;
    }

    public function saveImage($request)
    {
        $home_default = ImageSetting::where('type_name', 'home_default')->where('status', 1)->first();
        //resize working
        // $image=Image::make($image)->driver('imagick');
        $image = $request->file('featured_image');
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $directory = 'assets/frontend/product/featured_image/';
        $imageUrl = $directory . $imageName;
        $img = Image::make($image);
        $img->resize($home_default->width, $home_default->height, function ($c) {
            // $c->aspectRatio();
            // $c->upsize();
        });
        $img->save($directory . $imageName);
        // $image->move($directory, $imageName);
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

    public function sort(Request $request)
    {
        // return $request;
        $sortBy = $request->input('sort_by');
        $category = $request->input('category_id');
        session()->put('data-sort', $sortBy);

        // return $sortBy;
        // return $category;

        if ($sortBy == 0) {

            $products = Product::where('parent_category', $category)->orderBy('created_at', 'asc')->paginate(3);
            // return $products;
            if (count($products) == 0) {

                session()->put('data-sort', '0');

                $products = Product::join('product_sub_categories', 'products.id', '=', 'product_sub_categories.product_id')
                    ->where('product_sub_categories.sub_category_id', $category)
                    ->select('products.*')
                    ->orderBy('created_at', 'asc')
                    ->paginate(3);
                // return $products;
            }
        } else if ($sortBy == 1) {
            session()->put('data-sort', '1');

            $products = Product::where('parent_category', $category)->orderBy('sale_price', 'asc')->paginate(3);
            // return $products;
            if (count($products) == 0) {
                $products = Product::join('product_sub_categories', 'products.id', '=', 'product_sub_categories.product_id')
                    ->where('product_sub_categories.sub_category_id', $category)
                    ->select('products.*')
                    ->orderBy('sale_price', 'asc')
                    ->paginate(3);
                // return $products;
            }
        } else if ($sortBy == 2) {

            session()->put('data-sort', '2');

            $products = Product::where('parent_category', $category)->orderBy('sale_price', 'desc')->paginate(3);
            // return $products;
            if (count($products) == 0) {
                $products = Product::join('product_sub_categories', 'products.id', '=', 'product_sub_categories.product_id')
                    ->where('product_sub_categories.sub_category_id', $category)
                    ->select('products.*')
                    ->orderBy('sale_price', 'desc')
                    ->paginate(3);
                // return $products;
            }
        }
        return response()->json($products);
    }
}

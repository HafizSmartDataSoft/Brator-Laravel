<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Discount;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSubCategory;
use Carbon\Carbon;
use App\Models\DiscountCategory;
use App\Models\DiscountExcludeProduct;
use App\Models\DiscountProduct;
use App\Models\DiscountSubCategory;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\UserReview;
use Illuminate\Http\Request;

class ProductViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    public function show(Product $product_detail)
    {
        // return $product_detail;
        $products = session()->get('products.recently_viewed');
        session()->push('products.recently_viewed', $product_detail->id);

        // $categories=Category::find($product_detail->parent_category);
        // return $categories->id;

        /* this code is for Show Coupons */
        // (    $discount_on_category = DiscountCategory::where('category_id', $product_detail->parent_category)->pluck('discount_id');
        //     // $discount_on_category = $discount_on_category->pluck('discount_id');
        //     // return $discount_on_category;
        //     $discount_on_category = Discount::whereIn('id', $discount_on_category)->where('status', 1)->get();)

        $tags = $product_detail->tags; // This will retrieve all tags related to the product
        // Now, $tags contains a collection of Tag models.

        // return $tags;
        $product_sub_category = $product_detail->productSubCategory;
        // return $product_sub_category;
        $gallaryImages = ProductImage::where('product_id', $product_detail->id)->get();

        // return UserReview::with('user')
        // ->where('product_id', $product_detail->id)
        // ->get();
        return view(
            'frontend.product.product-details',
            [
                'product_detail' => $product_detail,
                'recentlyViewed' => Product::find($products),
                'categories' => Category::all(),
                'parent_category' => Category::find($product_detail->parent_category),
                'sub_categories' => $product_sub_category,
                'tags' => $tags,
                'gallaryImages' => $gallaryImages,
                'reviews' => UserReview::with('user')
                    ->where('product_id', $product_detail->id)
                    ->get(),
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product_detail)
    {
        //
    }
    public function cart(Product $product)
    {
        // return $product;
        return view(
            'frontend.product.cart',
            [
                'product' => $product,
            ]
        );
    }

    public function checkout(Request $request)
    {
        // return $request;
        $product_category = session()->get('product_category');
        $discount = 0;
        $product = Product::find($request->product_id);
        $items = $request->items;
        $discount_on_categories = DiscountCategory::where('category_id', $product->parent_category)->get();
        // return $discount_on_categories;

        foreach ($discount_on_categories as $discount_on_category) {
            $discount_on_category = Discount::find($discount_on_category->discount_id);
            if ($discount_on_category && $discount_on_category->status == 1) {
                // return $discount_on_category;
                $discount = $this->discountValidate($discount_on_category, $product, $items);
                // if ($discount)
                //     return $discount;
                if (session('customerId') && $discount > 0 && $discount != 'not_valid') {
                    $customerId = session('customerId');
                    $customer = Customer::find($customerId);
                    if ($discount_on_category->once_check == 1) {
                        // return $discount_on_category;

                        $customer_orders = Orderdetail::where('customer_id', $customerId)->get();
                        $temp = 0;
                        //need to check all orders
                        foreach ($customer_orders as $customer_order) {
                            if ($customer_order->coupons == $discount_on_category->coupon_code) {
                                $temp = 1;
                            }
                        }
                        if ($temp != 1) {
                            return view('frontend.product.checkout', [
                                'product' => $product,
                                'items' => $items,
                                'customer' => $customer,
                                'discount' => $discount,
                                'coupon_code' => $discount_on_category->coupon_code,
                            ]);
                        }
                    } else if ($discount > 0  && $discount != 'not_valid') {
                        return view('frontend.product.checkout', [
                            'product' => $product,
                            'items' => $items,
                            'customer' => $customer,
                            'discount' => $discount,
                            'coupon_code' => $discount_on_category->coupon_code,
                        ]);
                    }
                    // return $customer;
                } else if ($discount > 0  && $discount != 'not_valid') {
                    return view('frontend.product.checkout', [
                        'product' => $product,
                        'items' => $items,
                        'discount' => $discount,
                        'coupon_code' => $discount_on_category->coupon_code,
                    ]);
                }
            }
        }
        $discount = 0;
        //check if there any discount on sub category
        $product_subCategories = $product->subCategories->pluck('sub_category_id');
        $discount_on_subCategories = DiscountSubCategory::whereIn('sub_category_id', $product_subCategories)->get();
        foreach ($discount_on_subCategories as $discount_sub_category) {
            $discount_sub_category = Discount::find($discount_sub_category->discount_id);
            if ($discount_sub_category && $discount_sub_category->status == 1) {
                $discount = $this->discountValidate($discount_sub_category, $product, $items);
                // return $discount;

                if (session('customerId') && $discount > 0  && $discount != 'not_valid') {
                    $customerId = session('customerId');
                    $customer = Customer::find($customerId);
                    if ($discount_sub_category->once_check == 1) {
                        $customer_orders = Orderdetail::where('customer_id', $customerId)->get();
                        $temp = 0;
                        //need to check all
                        foreach ($customer_orders as $customer_order) {
                            if ($customer_order->coupons == $discount_sub_category->coupon_code) {
                                $temp = 1;
                            }
                        }
                        if ($temp != 1) {
                            return view('frontend.product.checkout', [
                                'product' => $product,
                                'items' => $items,
                                'customer' => $customer,
                                'discount' => $discount,
                                'coupon_code' => $discount_sub_category->coupon_code,

                            ]);
                        }
                    } else if ($discount > 0 && $discount != 'not_valid') {
                        // return $discount;

                        return view('frontend.product.checkout', [
                            'product' => $product,
                            'items' => $items,
                            'customer' => $customer,
                            'discount' => $discount,
                            'coupon_code' => $discount_sub_category->coupon_code,

                        ]);
                    }
                } else if ($discount > 0  && $discount != 'not_valid') {

                    return view('frontend.product.checkout', [
                        'product' => $product,
                        'items' => $items,
                        'discount' => $discount,
                        'coupon_code' => $discount_sub_category->coupon_code,
                    ]);
                }
            }
        }

        // return $discount_on_subCategories;

        $discount = 0;
        if (session('customerId')) {
            $customerId = session('customerId');
            $customer = Customer::find($customerId);
            // return $customer;
            return view('frontend.product.checkout', [
                'product' => $product,
                'items' => $items,
                'customer' => $customer,
                'discount' => $discount,
            ]);
        }

        return view('frontend.product.checkout', [
            'product' => $product,
            'items' => $items,
            'discount' => $discount,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product_detail)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product_detail)
    {
        //
    }

    public function recentlyViewed()
    {

        // session()->forget('products.recently_viewed');

        $products = session()->get('products.recently_viewed');

        $categories = Category::with('children')->whereNull('parent_id')->get();
        // dd($products );
        // return $products;
        return view(
            'frontend.recently-viewed.recently-viewed',
            [
                'recentlyViewed' => Product::find($products),
                'allProducts' => Product::all(),
                'categories' => $categories,
            ]
        );
    }



    public function storeCompare(Request $request)
    {
        $compare = $request->input('value');

        session()->push('products.compare', $compare);
        session()->flash('storeCompare', 'Seleted to Compare !');

        // $compareProducts = session('products.compare', []);

        // // Remove the value '21' from the array if it exists
        // $compareProducts = array_diff($compareProducts, ['21']);

        // // Put the modified array back into the session
        // session(['products.compare' => $compareProducts]);


        $products = session()->get('products.compare');
        // session()->forget('products.compare',['21']);

        // $categories = Category::with('children')->whereNull('parent_id')->get();

        return $products;
        // return view(
        //     'frontend.recently-viewed.recently-viewed',
        //     [
        //         'recentlyViewed' => Product::find($products),
        //         'allProducts' => Product::all(),
        //         'categories' => $categories,
        //     ]
        // );
    }

    public function compareProducts()
    {

        $products = session()->get('products.compare');
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view(
            'frontend.product.compare',
            [
                'compareProduct' => Product::find($products),
                'allProducts' => Product::all(),
                'categories' => $categories,
            ]
        );
    }
    public function deleteCompare($compare)
    {
        // return $compare;

        $compareProducts = session('products.compare', []);
        $compareProducts = array_diff($compareProducts, [$compare]);

        // // Put the modified array back into the session
        session(['products.compare' => $compareProducts]);

        return back();
    }

    public function discountValidate($discountAvaiable, $discountProduct, $items)
    {
        if ($discountAvaiable != null) {
            $excludeProducts = $discountAvaiable->excludeProducts;
            foreach ($excludeProducts as $excludeProduct) {
                if ($excludeProduct->product_id == $discountProduct->id) {
                    $not_valid = 'not_valid';
                    return $not_valid;
                }
            }
        }

        $subtotal = $discountProduct->sale_price * $items;
        if ($discountAvaiable) {
            $currentDate = Carbon::now();

            $startDate = Carbon::parse($discountAvaiable->start_date);
            $expairDate = Carbon::parse($discountAvaiable->expiration_date);
            if ($discountAvaiable->discount_on == 'all_products') {
                if ($currentDate->lt($expairDate) && $currentDate->gt($startDate) && $subtotal >= $discountAvaiable->minimum_amount && ($discountAvaiable->max_uses > 0 || $discountAvaiable->max_uses == null)) {
                    if ($discountAvaiable->coupon_type == 'fixed_amount') {
                        $discount = $discountAvaiable->discount;
                        return $discount;
                        // return response()->json($discountAvaiable);
                    } else {
                        $discount = $discountProduct->sale_price * ($discountAvaiable->discount / 100) * $items;
                        return $discount;
                        return response()->json($discountAvaiable);
                    }
                } else {
                    $not_valid = 'not_valid';
                    return $not_valid;
                }
            } else if ($discountAvaiable->discount_on == 'product') {
                $products = DiscountProduct::where('discount_id', $discountAvaiable->id)->get();
                foreach ($products as $product) {
                    if ($product->product_id == $discountProduct->id) {
                        if ($currentDate->lt($expairDate) && $currentDate->gt($startDate) && $subtotal >= $discountAvaiable->minimum_amount && ($discountAvaiable->max_uses > 0 || $discountAvaiable->max_uses == null)) {
                            if ($discountAvaiable->coupon_type == 'fixed_amount') {
                                $discount = $discountAvaiable->discount;
                                return $discount;
                                return "Today's date is before 2023-11-30 23:59:00";
                                // return response()->json($discountAvaiable);
                            } else {
                                $discount = $discountProduct->sale_price * ($discountAvaiable->discount / 100) * $items;
                                return $discount;
                                return response()->json($discountAvaiable);
                            }
                        } else {
                            $not_valid = 'not_valid';
                            return $not_valid;
                        }
                    }
                }
                $not_valid = 'not_valid';
                return $not_valid;
            } else if ($discountAvaiable->discount_on == 'sub_category') {
                $productSubCategories = $discountProduct->subCategories;
                $subCategories = DiscountSubCategory::where('discount_id', $discountAvaiable->id)->get();
                // return response()->json($categories);
                foreach ($subCategories as $category) {
                    foreach ($subCategories as $productCategory) {
                        if ($category->sub_category_id == $productCategory->sub_category_id) {

                            if ($currentDate->lt($expairDate) && $currentDate->gt($startDate) && $subtotal >= $discountAvaiable->minimum_amount && ($discountAvaiable->max_uses > 0 || $discountAvaiable->max_uses == null)) {
                                if ($discountAvaiable->coupon_type == 'fixed_amount') {
                                    $discount = $discountAvaiable->discount;
                                    return $discount;
                                    return "Today's date is before 2023-11-30 23:59:00";
                                    // return response()->json($discountAvaiable);
                                } else {
                                    $discount = $discountProduct->sale_price * ($discountAvaiable->discount / 100) * $items;
                                    return $discount;
                                    return response()->json($discountAvaiable);
                                }
                            } else {
                                $not_valid = 'not_valid';
                                return $not_valid;
                            }
                        }
                    }
                }
                $not_valid = 'not_valid';
                return $not_valid;
            } else if ($discountAvaiable->discount_on == 'category') {
                $categories = DiscountCategory::where('discount_id', $discountAvaiable->id)->get();
                // return response()->json($categories);
                foreach ($categories as $category) {
                    if ($category->category_id == $discountProduct->parent_category) {
                        // Define the specific date you want to compare
                        $startDate = Carbon::parse($discountAvaiable->start_date);
                        $expairDate = Carbon::parse($discountAvaiable->expiration_date);

                        if ($currentDate->lt($expairDate) && $currentDate->gt($startDate) && $subtotal >= $discountAvaiable->minimum_amount && ($discountAvaiable->max_uses > 0 || $discountAvaiable->max_uses == null)) {
                            if ($discountAvaiable->coupon_type == 'fixed_amount') {
                                $discount = $discountAvaiable->discount;
                                return $discount;
                                return "Today's date is before 2023-11-30 23:59:00";
                                // return response()->json($discountAvaiable);

                            } else {
                                $discount = $discountProduct->sale_price * ($discountAvaiable->discount / 100) * $items;
                                return $discount;
                                return response()->json($discountAvaiable);
                            }
                        } else {
                            $not_valid = 'not_valid';
                            return $not_valid;
                        }
                    }
                }
                $not_valid = 'not_valid';
                return $not_valid;
            }
        } else {
            $not_valid = 'not_valid';
            return $not_valid;
        }
    }

    // public function dropzoneImage(Request $request)
    // {
    //     // $file = $request->file('file');
    //     // return $request;
    //     $image = $request->file('file');
    //     $imageName = rand() . '.' . $image->getClientOriginalExtension();
    //     $directory = 'assets/frontend/product/gallery-images/';
    //     $imageUrl = $directory . $imageName;
    //     $image->move($directory, $imageName);
    //     $workOns = TypeWorkOn::where('work_on', 'product')->get();
    //     $workOns = $workOns->pluck('type_id');
    //     $imageSettings = ImageSetting::find($workOns)->where('status', 1);
    //     foreach ($imageSettings as $imageSetting) {
    //         if ($imageSetting) {
    //             $typeName = $imageSetting->type_name;
    //             $width = $imageSetting->width;
    //             $height = $imageSetting->height;
    //             $image = $request->file('file');
    //             $image = Image::make($image);
    //             $image->resize($width, $height);
    //             $imageName = rand() . '.' . $image->getClientOriginalExtension();
    //             $directory = 'assets/frontend/product/' . $typeName . '/';
    //             $imageUrl = $directory . $imageName;
    //             $image->move($directory, $imageName);
    //             session()->push('product' . $typeName, $imageUrl);
    //         }
    //     }
    //     // return $imageUrl;
    //     // return asset($imageUrl);
    //     // session()->forget('product.gallary');
    //     session()->push('product.gallary', $imageUrl);
    //     return $imageUrl;
    // }

}

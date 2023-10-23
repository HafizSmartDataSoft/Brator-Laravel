<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discount;
use App\Models\DiscountCategory;
use App\Models\DiscountExcludeProduct;
use App\Models\DiscountProduct;
use App\Models\DiscountSubCategory;
use App\Models\Orderdetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'admin.discount.discount-list',
            [
                'discounts' => Discount::all(),

            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'admin.discount.add-discount',
            [
                'categories' => Category::all(),
                'products' => Product::all(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;

        $discount = Discount::create([
            "coupon_title" => $request->coupon_title,
            "coupon_code" => $request->coupon_code,
            "discount" => $request->discount,
            "coupon_type" => $request->coupon_type,
            "start_date" => $request->start_date,
            "expiration_date" => $request->expiration_date,
            "minimum_amount" => $request->minimum_amount,
            "max_uses" => $request->max_uses,
            "once_check" => $request->once_check,
            "discount_on" => $request->discount_on,
            "status" => $request->status,
        ]);

        if ($request->category && $request->discount_on == 'category') {
            foreach ($request->category as $category) {
                $discount_category = DiscountCategory::create([
                    "discount_id" => $discount->id,
                    "category_id" => $category,
                ]);
            }
        }

        if ($request->excluded) {
            foreach ($request->excluded as $product) {
                $discount_exclude_product = DiscountExcludeProduct::create([
                    "discount_id" => $discount->id,
                    "product_id" => $product,
                ]);
            }
        }

        if ($request->sub_category  && $request->discount_on == 'sub_category') {
            foreach ($request->sub_category as $category) {
                $discount_sub_category = DiscountSubCategory::create([
                    "discount_id" => $discount->id,
                    "sub_category_id" => $category,
                ]);
            }
        }

        if ($request->product && $request->discount_on == 'product') {
            foreach ($request->product as $product) {
                $discount_exclude_product = DiscountProduct::create([
                    "discount_id" => $discount->id,
                    "product_id" => $product,
                ]);
            }
        }
        return back()->with('success', 'Discount Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        $excludes = null;
        // $excludes = DiscountExcludeProduct::where('discount_id', $discount->id)->get();
        $excludes = $discount->excludeProducts;
        $discount_on = null;
        if ($discount->discount_on == 'category') {
            $discount_on = DiscountCategory::where('discount_id', $discount->id)->get();
        } else if ($discount->discount_on == 'sub_category') {
            $discount_on = DiscountSubCategory::where('discount_id', $discount->id)->get();
        } else if ($discount->discount_on == 'product') {
            $discount_on = DiscountProduct::where('discount_id', $discount->id)->get();
        }
        // return $discount_on;

        return view(
            'admin.discount.edit-discount',
            [
                'categories' => Category::all(),
                'products' => Product::all(),
                'discount' => $discount,
                'discount_ons' => $discount_on,
                'excludes' => $excludes,

            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discount $discount)
    {

        // return $request;
        $discount->update([
            "coupon_title" => $request->coupon_title,
            "coupon_code" => $request->coupon_code,
            "discount" => $request->discount,
            "coupon_type" => $request->coupon_type,
            "start_date" => $request->start_date,
            "expiration_date" => $request->expiration_date,
            "minimum_amount" => $request->minimum_amount,
            "max_uses" => $request->max_uses,
            "once_check" => $request->once_check,
            "discount_on" => $request->discount_on,
            "status" => $request->status,
        ]);

        if ($request->category && $request->discount_on == 'category') {
            $deleted = DiscountCategory::where('discount_id', $discount->id)->delete();
            $deleted = DiscountSubCategory::where('discount_id', $discount->id)->delete();
            $deleted = DiscountProduct::where('discount_id', $discount->id)->delete();

            foreach ($request->category as $category) {
                $discount_category = DiscountCategory::create([
                    "discount_id" => $discount->id,
                    "category_id" => $category,
                ]);
            }
        } else if ($request->sub_category  && $request->discount_on == 'sub_category') {
            $deleted = DiscountCategory::where('discount_id', $discount->id)->delete();
            $deleted = DiscountSubCategory::where('discount_id', $discount->id)->delete();
            $deleted = DiscountProduct::where('discount_id', $discount->id)->delete();

            foreach ($request->sub_category as $category) {
                $discount_sub_category = DiscountSubCategory::create([
                    "discount_id" => $discount->id,
                    "sub_category_id" => $category,
                ]);
            }
        } else if ($request->product && $request->discount_on == 'product') {
            $deleted = DiscountCategory::where('discount_id', $discount->id)->delete();
            $deleted = DiscountSubCategory::where('discount_id', $discount->id)->delete();
            $deleted = DiscountProduct::where('discount_id', $discount->id)->delete();

            foreach ($request->product as $product) {
                $discount_product = DiscountProduct::create([
                    "discount_id" => $discount->id,
                    "product_id" => $product,
                ]);
            }
        } else if ($request->discount_on == 'all_products') {
            $deleted = DiscountCategory::where('discount_id', $discount->id)->delete();
            $deleted = DiscountSubCategory::where('discount_id', $discount->id)->delete();
            $deleted = DiscountProduct::where('discount_id', $discount->id)->delete();
        }

        if ($request->excluded) {
            $deleted = DiscountExcludeProduct::where('discount_id', $discount->id)->delete();
            foreach ($request->excluded as $product) {
                $discount_exclude_product = DiscountExcludeProduct::create([
                    "discount_id" => $discount->id,
                    "product_id" => $product,
                ]);
            }
        } else {
            $deleted = DiscountExcludeProduct::where('discount_id', $discount->id)->delete();
        }
        session()->flash('update_success', 'Discount Successfully Updated !');
        return redirect('product/discount');
    }


    public function discountValidate(Request $request)
    {
        $currentDate = Carbon::now();
        $discountCode = $request->input('discount_code');
        $discountProduct = $request->input('discount_product');
        $subtotal = $request->input('subtotal');
        $items = $request->input('items');
        $discountProduct = Product::find($discountProduct);
        $discountAvaiable = Discount::where('coupon_code', $discountCode)->where('status', 1)->first();

        if (session('customerId')) {
            $customerId = session('customerId');
            //coupon can use once.
            if ($discountAvaiable->once_check == 1) {
                // return $discountAvaiable;
                $customer_orders = Orderdetail::where('customer_id', $customerId)->get();
                $temp = 0;
                //need to check all orders
                foreach ($customer_orders as $customer_order) {
                    if ($customer_order->coupons == $discountAvaiable->coupon_code) {
                        $temp = 1;
                    }
                }
                if ($temp == 1) {
                    $not_valid = 'not_valid';
                    return $not_valid;
                }
            }
        }

        //  return response()->json($discountProduct);
        // return $discountProduct->parent_category;

        if ($discountAvaiable != null) {
            $excludeProducts = $discountAvaiable->excludeProducts;
            foreach ($excludeProducts as $excludeProduct) {
                if ($excludeProduct->product_id == $discountProduct->id) {
                    $not_valid = 'not_valid';
                    return $not_valid;
                }
            }
        }

        // return response()->json($excludeProducts);
        if ($discountAvaiable) {

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








    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        $deleted = DiscountCategory::where('discount_id', $discount->id)->delete();
        $deleted = DiscountSubCategory::where('discount_id', $discount->id)->delete();
        $deleted = DiscountProduct::where('discount_id', $discount->id)->delete();
        $discount->delete();
        session()->flash('update_success', 'Discount Delete Successfully!');

        return back();
    }
}

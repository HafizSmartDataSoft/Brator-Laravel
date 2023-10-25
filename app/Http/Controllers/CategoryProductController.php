<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\DiscountSubCategory;
use App\Models\Orderdetail;
use App\Models\Customer;
use App\Models\Discount;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
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
    public function show(Request $request, Category $product_category)
    {
        // return $product_category->id;
        //taking last viwed category to use in discount.
        session()->put('product_category', $product_category->id);
        $orderby = null;
        $orderby = $request->orderby;
        // return $request;
        // return $product_category;
        //for parent category
        // session()->put('data-sort', '0');
        // $dataSort = session()->get('data-sort');
        // $dataSort = $request->query('sort_by');
        // return $dataSort;





        $products = Product::where('parent_category', $product_category->id);

        if (!empty($orderby)) {
            if ($orderby === "date") {
                $products->orderBy('created_at', 'desc');
            } elseif ($orderby === "price") {
                // return $orderby;
                $products->orderBy('sale_price', 'asc');
            } elseif ($orderby === "price-desc") {
                $products->orderBy('sale_price', 'desc');
            }
        }

        $products = $products->paginate(3);

        if (count($products) == 0) {
            $products = Product::join('product_sub_categories', 'products.id', '=', 'product_sub_categories.product_id')
                ->where('product_sub_categories.sub_category_id', $product_category->id)
                ->select('products.*');

            if (!empty($orderby)) {
                if ($orderby === "date") {
                    $products->orderBy('created_at', 'desc');
                } elseif ($orderby === "price") {
                    $products->orderBy('sale_price', 'asc');
                } elseif ($orderby === "price-desc") {
                    $products->orderBy('sale_price', 'desc');
                }
            }

            $products = $products->paginate(3);

            // if (!empty($orderby)) {
            //     if ($orderby === "0") {
            //         $products->appends(['sort' => 'latest']);
            //     } elseif ($orderby === "1") {
            //         $products->appends(['sort' => 'low-high']);
            //     } elseif ($orderby === "2") {
            //         $products->appends(['sort' => 'high-low']);
            //     }
            // }
        }

        $categories = Category::with('children')->whereNull('parent_id')->get();
        $recentProducts = session()->get('products.recently_viewed');
        $products->appends(['orderby' => $orderby]);

        //find discount to show discount amount with every product
        // if ($product_category->parent_id) {
        //     //sub category
        //     $discount_on_subCategories = DiscountSubCategory::where('sub_category_id', $product_category->id)->get();
        //     // return $discount_on_subCategories;
        //     foreach ($discount_on_subCategories as $discount_sub_category) {
        //         $discount_sub_category = Discount::find($discount_sub_category->discount_id);
        //         if ($discount_sub_category && $discount_sub_category->status == 1) {
        //             $discount = $discount_sub_category;
        //             // return $discount;
        //             // $discount = $this->discountValidate($discount_sub_category, $product, $items);
        //             if (session('customerId') && $discount) {
        //                 $customerId = session('customerId');
        //                 $customer = Customer::find($customerId);
        //                 if ($discount_sub_category->once_check == 1) {
        //                     $customer_orders = Orderdetail::where('customer_id', $customerId)->get();
        //                     $temp = 0;
        //                     //need to check all
        //                     foreach ($customer_orders as $customer_order) {
        //                         if ($customer_order->coupons == $discount_sub_category->coupon_code) {
        //                             $temp = 1;
        //                         }
        //                     }
        //                     if ($temp != 1) {
        //                         return view('frontend.product-category.category-products', [
        //                             'category' => $product_category,
        //                             'products' => $products,
        //                             'recentlyViewed' => Product::find($recentProducts),
        //                             'categories' => $categories,
        //                             'allProducts' => Product::all(),
        //                             'orderby' => $orderby,

        //                             'customer' => $customer,
        //                             'discount' => $discount,
        //                         ]);
        //                     }
        //                 } else {
        //                     return view('frontend.product-category.category-products', [
        //                         'category' => $product_category,
        //                         'products' => $products,
        //                         'recentlyViewed' => Product::find($recentProducts),
        //                         'categories' => $categories,
        //                         'allProducts' => Product::all(),
        //                         'orderby' => $orderby,
        //                         'customer' => $customer,
        //                         'discount' => $discount,

        //                     ]);
        //                 }
        //             } else if ($discount) {
        //                 return view('frontend.product-category.category-products', [
        //                     'category' => $product_category,
        //                     'products' => $products,
        //                     'recentlyViewed' => Product::find($recentProducts),
        //                     'categories' => $categories,
        //                     'allProducts' => Product::all(),
        //                     'orderby' => $orderby,

        //                     'discount' => $discount,
        //                 ]);
        //             }
        //         }
        //     }
        // } else {
        //     //category

        // }
        //find discount end



        // return $home_imeges;
        return view(
            'frontend.product-category.category-products',
            [
                'category' => $product_category,
                'products' => $products,
                'recentlyViewed' => Product::find($recentProducts),
                'categories' => $categories,
                'allProducts' => Product::all(),
                'orderby' => $orderby,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Category $product_category)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $product_category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $product_category)
    {
        //
    }
}

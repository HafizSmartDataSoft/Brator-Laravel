<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\VehicleYear;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function search(Request $request)
    {
        //  return $request;

        if ($request->year) {
            $years=VehicleYear::where('year',$request->year)->pluck('id');
            // return $years;
            $products = Product::whereIn('year_id', $years);
            // return $products;
        }



        if($request->make){
            $products=$products->Where('make_id',$request->make);
                        // return $products;
        }
        if($request->model){
            $products=$products->Where('model_id',$request->model);
                        // return $products;
        }

        $orderby = null;
        $orderby = $request->orderby;

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

        $recentProducts = session()->get('products.recently_viewed');
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $products->appends(['orderby' => $orderby]);

        return view(
            'frontend.shop.search',
            [
                'recentlyViewed' => Product::find($recentProducts),
                'categories' => $categories,
                'allProducts' => Product::all(),
                'orderby' => $orderby,
                'products' => $products,


            ]
        );
    }
}

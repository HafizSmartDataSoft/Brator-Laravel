<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use App\Models\VehicleYear;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function search(Request $request)
    {
        //  return $request;
        if ($request->year == null) {
            if ($request->page || $request->orderby) {
            } else {
                $search_year = session()->forget('search_year');
                $search_make = session()->forget('search_make');
                $search_model = session()->forget('search_model');
            }
        }
        $search_year = session()->get('search_year');

        if ($request->year) {

            session()->forget('search_year');
            session()->forget('search_make');
            session()->forget('search_model');

            session()->put('search_year', $request->year);
            $years = VehicleYear::where('year', $request->year)->pluck('id');
            // return $years;
            $products = Product::whereIn('year_id', $years);
            // return $products;
        } elseif ($search_year) {
            $years = VehicleYear::where('year', $search_year)->pluck('id');
            $products = Product::whereIn('year_id', $years);
        } else {
            // there will no products
            $products = Product::where('status', 10);
        }

        $search_make = session()->get('search_make');
        if ($request->make) {
            session()->put('search_make', $request->make);
            $products = $products->Where('make_id', $request->make);
        } elseif ($search_make) {
            $products = $products->Where('make_id', $search_make);
        }

        $search_model = session()->get('search_model');
        if ($request->model) {
            session()->put('search_model', $request->model);
            $products = $products->Where('model_id', $request->model);
        } elseif ($search_model) {
            $products = $products->Where('model_id', $search_model);
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

        $products = $products->paginate(10);
        $products->appends(['orderby' => $orderby]);


        $recentProducts = session()->get('products.recently_viewed');
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view(
            'frontend.shop.show-products',
            [
                'recentlyViewed' => Product::find($recentProducts),
                'categories' => $categories,
                'allProducts' => Product::all(),
                'orderby' => $orderby,
                'products' => $products,
            ]
        );
    }

    public function showMakeProduct(Request $request,$make)
    {
        $make = VehicleMake::where('slug', $make)->first();
        // return $make;
        $orderby = null;
        $orderby = $request->orderby;
        $makeProducts = $make->products()->where('status',2);
        if (!empty($orderby)) {
            if ($orderby === "date") {
                $makeProducts->orderBy('created_at', 'desc');
            } elseif ($orderby === "price") {
                // return $orderby;
                $makeProducts->orderBy('sale_price', 'asc');
            } elseif ($orderby === "price-desc") {
                $makeProducts->orderBy('sale_price', 'desc');
            }
        }

        $makeProducts = $makeProducts->paginate(10);
        $makeProducts->appends(['orderby' => $orderby]);
        // return $makeProducts;

        $recentProducts = session()->get('products.recently_viewed');
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view(  'frontend.shop.show-products',
        [
            'recentlyViewed' => Product::find($recentProducts),
            'categories' => $categories,
            'allProducts' => Product::all(),
            'orderby' => $orderby,
            'products' => $makeProducts,
        ]
        );
    }

    public function showModelProduct(Request $request,$model)
    {
        $model = VehicleModel::where('slug', $model)->first();
        // return $make;
        $orderby = null;
        $orderby = $request->orderby;
        $modelProducts = $model->products()->where('status',2);
        if (!empty($orderby)) {
            if ($orderby === "date") {
                $modelProducts->orderBy('created_at', 'desc');
            } elseif ($orderby === "price") {
                // return $orderby;
                $modelProducts->orderBy('sale_price', 'asc');
            } elseif ($orderby === "price-desc") {
                $modelProducts->orderBy('sale_price', 'desc');
            }
        }

        $modelProducts = $modelProducts->paginate(10);
        $modelProducts->appends(['orderby' => $orderby]);
        // return $modelProducts;

        $recentProducts = session()->get('products.recently_viewed');
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view(  'frontend.shop.show-products',
        [
            'recentlyViewed' => Product::find($recentProducts),
            'categories' => $categories,
            'allProducts' => Product::all(),
            'orderby' => $orderby,
            'products' => $modelProducts,
        ]
        );
    }
}

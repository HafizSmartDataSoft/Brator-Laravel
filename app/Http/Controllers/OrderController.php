<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSubCategory;
use App\Models\ProductTag;
use App\Models\VehicleYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\returnValue;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'admin.order.order-list',
            [
                'orders' => Orderdetail::orderBy('created_at', 'desc')->get(),
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
        return view('admin.order.edit-order');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // return $request;
        $product = Product::find($request->product_id);
        if ($product->quantity >= $request->quantity) {
            $quantity = $product->quantity - $request->quantity;
            $product->update([
                "quantity" => $quantity,
            ]);
        } else {
            session()->flash('error', 'Product not avaiable!');
            return redirect('/');
        }

        //  check coupon avaiable
        if ($request->coupon_code) {
            $discountAvaiable = Discount::where('coupon_code', $request->coupon_code)->where('status', 1)->first();
            // return $discountAvaiable->max_uses;
            if ($discountAvaiable->max_uses != null) {
                if ($discountAvaiable->max_uses > 0) {
                    $max_uses = $discountAvaiable->max_uses - 1;
                    $discountAvaiable->update([
                        "max_uses" => $max_uses,
                    ]);
                } else {
                    session()->flash('error', 'Coupon not avaiable!');
                    return redirect('/');
                }
            }
        }

        $name = $request->frist_name . ' ' . $request->last_name;
        $address = $request->unit_address . ' , ' . $request->address;

        $Orderdetail = Orderdetail::create([
            "name" => $name,
            "product_id" => $request->product_id,
            "customer_id" => $request->customer_id,
            "company_name" => $request->company_name,
            "note" => $request->note,
            "country" => $request->country,
            "address" => $address,
            "suburb" => $request->suburb,
            "state" => $request->state,
            "postcode" => $request->postcode,
            "phone_number" => $request->phone_number,
            "mail" => $request->mail,
            "quantity" => $request->quantity,
            "coupons" => $request->coupon_code,
            "total_price" => $request->total_price,
            "payment_method" => $request->payment_method,
        ]);

        $address = $address . ' , ' . $request->suburb . ' , ' . $request->state . '-' . $request->postcode;

        $Order = Order::create([
            "order_id" => $Orderdetail->id,
            "product_id" => $request->product_id,
            "customer_id" => $request->customer_id,
            "delivery_address" => $address,
            "payment_method" => $request->payment_method,
        ]);


        if ($Orderdetail) {
            session()->flash('success', 'Order placed successfully!');
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orderdetail $order)
    {
        // return $coupon;
        return view(
            'admin.order.order-details',
            [
                'order' => $order,
                'product' => Product::find($order->product_id),
                'coupon'=>Discount::where('coupon_code',$order->coupons)->first(),

            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orderdetail $order)
    {
        // return $order;
        return view(
            'admin.order.edit-order',
            [
                'order' => $order,
                'product' => Product::find($order->product_id),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orderdetail $order)
    {


        // return $request->all();
        $status = $order->update([
            "name" => $request->name,
            "product_id" => $request->product_id,
            // "customer_id" => $request->customer_id,
            "company_name" => $request->company_name,
            "note" => $request->note,
            "country" => $request->country,
            "address" => $request->address,
            "suburb" => $request->suburb,
            "state" => $request->state,
            "postcode" => $request->postcode,
            "phone_number" => $request->phone_number,
            "mail" => $request->mail,
            "quantity" => $request->quantity,
            "coupons" => $request->coupons,
            "total_price" => $request->total_price,
            "payment_method" => $request->payment_method,
            "status" => $request->status,
        ]);
        // dd(Orderdetail::find($order->id));
        session()->flash('update_success', 'Order Info Successfully Updated !');
        return redirect('product/order');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orderdetail $order)
    {
        Order::where('order_id', $order->id)->delete();
        $order->delete();
        return back();
    }
}

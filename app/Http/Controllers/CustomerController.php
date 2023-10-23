<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\Orderdetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'admin.customer.customer-list',
            [
                'customers' => Customer::all(),
                'orders' => Orderdetail::where('customer_id', session('customerId'))->orderBy('created_at', 'desc')->get(),
                'products' => Product::all(),
            ]
        );
    }
    public function orders()
    {
        return view(
            'frontend.customer.orders',
            [
                'orders' => Orderdetail::where('customer_id', session('customerId'))->orderBy('created_at', 'desc')->get(),
                'products' => Product::all(),
            ]
        );
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
    public function store(CustomerRequest $request)
    {

        $image_url = null;
        if ($request->image) {
            $image_url = $this->saveImage($request);
        }

        $customer = Customer::create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "date_of_birth" => $request->date_of_birth,
            "gender" => $request->gender,
            "phone_number" => $request->phone_number,
            "mail" => $request->mail,
            "country" => $request->country,
            "address" => $request->address,
            "suburb" => $request->suburb,
            "state" => $request->state,
            "postcode" => $request->postcode,
            "password" => bcrypt($request->password),
            // "status" => $request->status,
            "image" => $image_url,
        ]);
        return redirect('customer/login');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {

        return view(
            'admin.customer.edit-customer',
            ['customer' => $customer]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {

        if ($request->image) {
            if ($customer->image != null) {
                unlink($customer->image);
            }
            $image_url = $this->saveImage($request);
            $customer->update([
                "image" => $image_url,
            ]);
        }

        $customer->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "date_of_birth" => $request->date_of_birth,
            "gender" => $request->gender,
            "phone_number" => $request->phone_number,
            "mail" => $request->mail,
            "country" => $request->country,
            "address" => $request->address,
            "suburb" => $request->suburb,
            "state" => $request->state,
            "postcode" => $request->postcode,
            "status" => $request->status,

        ]);

        if ($request->password != null) {
            $validator = Validator::make($request->all(), [
                'password' => 'required|min:8',
                'password_confirmation' => 'required|min:8',

            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)
                    ->withInput();
            }
            if ($request->password == $request->password_confirmation) {
                $customer->update([
                    "password" => bcrypt($request->password),
                ]);
            } else {
                return back()->with('message', 'Passwords are not same! ');
            }
        }

        session()->flash('update_success', 'Customer Info Successfully Updated !');

        return redirect('/customer/customer');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Customer $customer)
    {
        if ($customer->image) {
            unlink($customer->image);
        }
        $customer->delete();
        return back();
    }
    public function registration()
    {
        return view('frontend.customer.registration');
    }
    public function login()
    {
        return view('frontend.customer.login');
    }

    public function loginCheck(Request $request)
    {
        $customer = Customer::where('mail', $request->mail)
            ->first();
        // return $customer;

        if ($customer) {
            $hashpass = $customer->password;
            if (password_verify($request->password, $hashpass)) {
                Session::put('customerId', $customer->id);
                session()->flash('success', 'You have successfully logged in!');
                return redirect('/');
            } else {
                return  back()->with('message', 'invalid Password');
            }
        } else {
            return  back()->with('message', 'invalid Email Address');
        }
    }

    public function logout()
    {
        Session::forget('customerId');
        session()->flash('success', 'You Logout successfully !');
        return redirect('/');
    }

    public function saveImage($request)
    {
        $image = $request->file('image');
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $directory = 'assets/frontend/customer/';
        $imageUrl = $directory . $imageName;
        $image->move($directory, $imageName);
        return $imageUrl;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController2 extends Controller
{

    public function addProduct(){
        return view('admin.product.add-product');
    }

    public function productList(){
        return view('admin.product.product-list');
    }

    public function editProduct(){
        return view('admin.product.edit-product');
    }

    public function addBrand(){
        return view('admin.brand.add-brand');
    }


}

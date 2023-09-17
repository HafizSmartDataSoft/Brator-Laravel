<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
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
    public function addCategory(){
        return view('admin.category.add-category');
    }
    public function editCategory(){
        return view('admin.category.edit-category');
    }
    public function categoryList(){
        return view('admin.category.category-list');
    }
    public function addBrand(){
        return view('admin.brand.add-brand');
    }


}

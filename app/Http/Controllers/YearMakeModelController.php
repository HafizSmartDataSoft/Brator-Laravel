<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YearMakeModelController extends Controller
{
    public function addMake(){
        return view('admin.year-make-model.add-make');
    }
    public function addModel(){
        return view('admin.year-make-model.add-model');
    }
}

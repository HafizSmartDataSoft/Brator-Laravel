<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashHomeController extends Controller
{
        public function index(){
            return view('admin.home.home');
        }


}

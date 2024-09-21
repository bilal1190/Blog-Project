<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function about(){
        return view('frontblog.about');
    }

    public function contact(){
        return view('frontblog.contact');
    }




}

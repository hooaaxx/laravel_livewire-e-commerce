<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $productShirt = Product::where('category', 'Shirt')->latest()->get();
        $productEtc = Product::where('category', 'Etc')->latest()->get();

        return view('home', compact(['productShirt', 'productEtc']));
    }
}

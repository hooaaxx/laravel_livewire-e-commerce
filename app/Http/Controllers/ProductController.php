<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use auth;
use view;
use Cart;

class ProductController extends Controller
{
    use WithPagination;
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index(){
        $productShirt = Product::where('category', 'Shirt')->latest()->paginate(8);
        $productEtc = Product::where('category', 'Etc')->latest()->get();

        return view('products.index', compact(['productShirt', 'productEtc']));
    }

    public function show(Product $product)
    {
        $products = Product::where('id', $product->id)->get();

        return view('products.show', compact('products'));
        // $this->authorize('view', $product);
        // dd($product);
    }
}

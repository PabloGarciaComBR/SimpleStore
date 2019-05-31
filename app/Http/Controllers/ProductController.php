<?php

namespace SimpleStore\Http\Controllers;

use Illuminate\Http\Request;
use SimpleStore\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('products.index', ['products' => $products]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', ['product' => $product]);
    }
}

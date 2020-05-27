<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::take(8)->get();

        return view('web.pages.index', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function products()
    {
        $categories = Category::all();
        $products = Product::all();

        return view('web.pages.products', [
            'categories' => $categories,
            'products' => $products,
        ]);   
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::take(6)->get();
        $shops = Shop::take(6)->get();
        $products = Product::with(['galleries'])->take(8)->get();

        return view('pages.home', [
            'categories' => $categories,
            'shops' => $shops,
            'products' => $products
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MajorCategory;
use App\Models\Product;
use App\Models\Review;

// トップページ用コントローラ
class WebController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $major_categories = MajorCategory::all();
        $recently_products = Product::orderBy('created_at', 'desc')->take(4)->with('reviews')->get();
        $recommend_products = Product::where('recommend_flag', true)->take(3)->with('reviews')->get();


        return view('web.index', compact('major_categories', 'categories', 'recently_products', 'recommend_products'));
    }
}
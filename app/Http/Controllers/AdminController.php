<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function statistics()
    {
        return view('backend.index');
    }

    public function categories()
    {
        $cats = DB::table('categories')->paginate(10);
        return view('backend.categories', [
            'categories' => $cats
        ]);
    }

    public function brands()
    {
        $brands = DB::table('brands')->paginate(10);
        return view('backend.brands', [
            'brands' => $brands
        ]);
    }

    public function products()
    {
        $products = DB::table('products')->paginate(10);
        return view('backend.products', [
            'products' => $products
        ]);
    }

    public function customers()
    {
//        $customers = DB::table('customer')->paginate(10);
        return view('backend.customers', [
//            'customer' => $customers
        ]);
    }
}

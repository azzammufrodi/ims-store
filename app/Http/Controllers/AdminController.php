<?php

namespace App\Http\Controllers;

use App\Charts\PriceChart;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(PriceChart $priceChart)
    {
        $chart = $priceChart->build();
        $Product = Product::all();


        $ProductCount = $Product->count();
        $ProductAssets = $Product->sum('price');
        return view('admin.dashboard', compact('chart', 'Product', 'ProductCount', 'ProductAssets'));
    }
}

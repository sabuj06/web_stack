<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slide;
use App\Models\AboutPage;
use App\Models\CoreValue;
use App\Models\ProductsPage;

class PageController extends Controller {

    public function home() {
        $slides   = Slide::orderBy('sort_order')->get();
        $products = Product::orderBy('sort_order')->get();
        return view('home', compact('slides', 'products'));
    }

    public function about() {
        $about      = AboutPage::first();
        $coreValues = CoreValue::orderBy('sort_order')->get();
        return view('about', compact('about', 'coreValues'));
    }

    public function products() {
        $products     = Product::orderBy('sort_order')->get();
        $productsPage = ProductsPage::first();
        return view('products', compact('products', 'productsPage'));
    }

    public function contact() {
        return view('contact');
    }
}
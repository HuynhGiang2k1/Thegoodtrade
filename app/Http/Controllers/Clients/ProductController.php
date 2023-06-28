<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index(){
        $categorise = Category::with('subCategories')->where('name_en',$this->categoryUrl())->first()->subCategories;
        $view = $this->products($this->categoryUrl());
        $url = $this->categoryUrl();
        return view('clients.product.product-page', compact( 'categorise', 'view', 'url'));
    }

    public function show(Product $product){
        return view('clients.product.product-detail', compact('product'));
    }

    public function getProducts(Request $request){
        if($request->ajax()){
            $data = $request->all();
            $catids = $data['catids'];
            array_pop($catids);
            if(!empty($catids))
                return $this->products($data['catname'], $catids);
            return $this->products($data['catname']);

        }
    }

    public function products($catname, $catids = null){
        if(!empty($catids)) {
            $products = Product::whereIn('sub_category_id', $catids)->get();
        } else {
            $products = Category::with('products')->where('name_en', $catname)->first()->products;
        }
        return view('clients.product.list-products', compact('products'));
    }

    public function categoryUrl(){
        $arr = explode('/', request()->path());
        return end($arr);
    }

}

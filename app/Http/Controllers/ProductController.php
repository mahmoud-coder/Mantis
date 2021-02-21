<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Paragraph;
use App\Models\ProductsCategory;
use App\Models\Product;

class ProductController extends Controller
{
    public function single($slug){
        return view('product',Option::all_options())->with('product', Product::where('slug',$slug)->first() );
    }
    public function all_products(){
        return view('categories',
            array_merge(
                Option::all_options(),
                [
                    'main_message' => Paragraph::where('slug','products-page-message')->first(),
                    'products' => Product::simplePaginate(Option::get('products_page_max'))
                ]
            ));
    }
    public function fresh_products(){
        return view('products', array_merge(
            Option::all_options(),
            [
                'main_message' => Paragraph::where('slug','fresh-products')->first(),
                'products' => ProductsCategory::where('name','Fresh')->first()->products()->simplePaginate(Option::get('products_page_max'))
            ]
        ));
    }
    public function frozen_products(){
        return view('products', array_merge(
            Option::all_options(),
            [
                'main_message' => Paragraph::where('slug','frozen-products')->first(),
                'products' => ProductsCategory::where('name','Frozen')->first()->products()->simplePaginate(Option::get('products_page_max'))
            ]
        ));
    }
}

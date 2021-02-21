<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Paragraph;
use App\Models\Product;

class HomeController extends Controller
{
    public function __invoke(){
        return view('home',
            array_merge(
                Option::all_options(),
                Paragraph::home_page_data(),
                ['products' => Product::limit(6)->get()->toArray() ]
            ));
    }
}

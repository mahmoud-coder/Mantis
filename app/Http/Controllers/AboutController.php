<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;

class AboutController extends Controller
{
    public function __invoke(){
        return view('about',Option::all_options());
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;

class CalenderController extends Controller
{
    public function __invoke(){
        return view('calender',Option::all_options());
    }
}

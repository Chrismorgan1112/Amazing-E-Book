<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class IndexController extends Controller
{
    //
    public function index($localization = 'en'){
        App::setlocale($localization);
        return view('index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class IndexController extends Controller
{
    //

    public function show(){
        return view('index', [
            'news'=>News::orderBy('created_at','desc')->get(),
            'data'=> 'data1'
        ]);

    }
}

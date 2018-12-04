<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class TextNewsController extends Controller
{
    //

    public function show($id){


        return view('textNews', [
            'news'=>News::find($id)
        ]);

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadingSpanController extends Controller
{
    //

    public function word(){
        return view('ReadingSpan_Word');
    }

    public function sentence(){
        return view('ReadingSpan_Sentence');
    }
}

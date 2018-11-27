<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadingSpanController extends Controller
{
    //

    public function word(){
        return view('tester/ReadingSpan_Word');
    }

    public function sentence(){
        return view('tester/ReadingSpan_Sentence');
    }
}

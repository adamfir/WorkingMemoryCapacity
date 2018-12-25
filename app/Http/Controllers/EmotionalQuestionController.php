<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmotionalQuestionController extends Controller
{
    //

    public function index(){
        $time = 60;
        return view('pages/tester/EmotionalQuestion', compact('time'));
    }
}

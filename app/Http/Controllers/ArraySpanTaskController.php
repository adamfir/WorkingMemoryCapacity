<?php

namespace App\Http\Controllers;
use App\ArraySpanTask;


use Illuminate\Http\Request;

class ArraySpanTaskController extends Controller
{
    //
    //
    public function index(){
        return view('pages/tester/ArraySpanTaskRead');
    }

    public function test(Request $request){
        $params0 = $request ->params0;
        $params1 = $request ->params1;
        $params2 = $request ->params2;
        $params3 = $request ->params3;

        return view('pages/tester/ArraySpanTask', compact('params0', 'params1', 'params2', 'params3'));
    }
    public function submit(Request $request){
        $array = ArraySpanTask::create(['Pict1'=> $request->Pict1, 'Pict2' => $request->Pict2, 'Pict3' => $request->Pict3, 'Pict4' => $request->Pict4]);
        
    }
}

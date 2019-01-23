<?php

namespace App\Http\Controllers;
use App\ArraySpanTask;


use Illuminate\Http\Request;

class ArraySpanTaskController extends Controller
{
    //
    //
    public function index($seri, $iterasi){
        $nextRoute = 'tester.blank1';
        for($i=0; $i<4; $i++){
            $arrays[$i] = rand(0, 3);
        }
        $data = ['array'=>$arrays];
        // dd($nextRouteParam);
        $array0 = $arrays[0];
        $array1 = $arrays[1];
        $array2 = $arrays[2];
        $array3 = $arrays[3];
        $nextRouteParam = ['task'=>'array', 'seri' => $seri, 'iterasi'=>$iterasi, 'array0'=>$array0, 'array1'=>$array1, 'array2'=>$array2, 'array3'=>$array3];
        return view('pages/tester/ArraySpanTaskRead', compact('nextRoute', 'iterasi', 'seri', 'nextRouteParam', 'data'));
    }

    public function pertanyaan($task, $seri, $iterasi, $array0, $array1, $array2, $array3, $posisiRandom){

        $nextRoute = 'tester.ArraySpanTask-Test';
        $nextRouteParam = ['task'=>'array', 'seri' => $seri, 'iterasi'=>$iterasi, 'array0'=>$array0, 'array1'=>$array1, 'array2'=>$array2, 'array3'=>$array3];
        // dd($nextRouteParam);
        // dd($posisiRandom);
        $cekRandom = rand(0, 3);
        return view('pages/tester/ArraySpanTaskPertanyaan', compact('nextRoute', 'nextRouteParam', 'posisiRandom', 'cekRandom'));
    }

    public function soal($task, $iterasi, $seri, $array0, $array1, $array2, $array3){

        $datas = [];
        $datas[0] = $array0;
        $datas[1] = $array1;
        $datas[2] = $array2;
        $datas[3] = $array3;

        if($seri == 1 || $seri == 2){
            $nilaiRandom = rand(0, 3);
            $posisiRandom = rand(0, 3);

            for($i = 0 ; $i< 4; $i++){
                if($i == $posisiRandom){
                    $datas[$i] = $nilaiRandom;
                }
            }
        }
        $data = ['array'=>$datas];
        $nextRoute = 'tester.ArraySpanTask-Pertanyaan';
        $nextRouteParam = ['task'=>'array', 'seri' => $seri, 'iterasi'=>$iterasi, 'array0'=>$array0, 'array1'=>$array1, 'array2'=>$array2, 'array3'=>$array3, 'posisiRandom'=>$posisiRandom];
        return view('pages/tester/ArraySpanTaskRead', compact('data', 'nextRouteParam', 'nextRoute'));

    }

    public function test($task, $iterasi, $seri, $array0, $array1, $array2, $array3){
        $params0 = $array0;
        $params1 = $array1;
        $params2 = $array2;
        $params3 = $array3;

        return view('pages/tester/ArraySpanTask', compact('params0', 'params1', 'params2', 'params3'));
    }
    
    public function submit(Request $request){
        $array = ArraySpanTask::create(['Pertanyaan'=> $request->Pertanyaan]);
        
    }
}

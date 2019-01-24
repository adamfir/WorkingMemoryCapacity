<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlankController extends Controller
{
    //
    public function blank($task, $seri, $iterasi){
        // if (Auth::user()->role == 2){
            $iterasi = $iterasi +1;
            if($iterasi > 3){
                $iterasi = 1;
                $seri = $seri+1;
            }
            $fokusKe = 1;
            if($task == 'array'){
                if($fokusKe == 1){
                    $waktu = 5;
                    $nextRoute = 'tester.ArraySpanTask-Read';
                    $nextRouteParam = ['seri' => $seri, 'iterasi'=>$iterasi];
                    return view(
                        'pages.tester.blank', 
                        compact('task','seri','iterasi','fokusKe','waktu', 'nextRoute', 'nextRouteParam')
                    );
                    // return halaman kalimat dan kata
                }
                else if($fokusKe == 2){
                    $waktu = 5;
                    $nextRoute = 'tester.ArraySpanTask-Read';
                    $nextRouteParam = ['seri' => $seri, 'iterasi'=>$iterasi];
                    return view(
                        'pages.test.blank', 
                        compact('task','seri','iterasi','fokusKe','waktu',
                            'nextRoute','nextRouteParam'
                        )
                    );
                    // return halamn recall kata
                }
                else{
                    // error
                    return view('pages.test.blank', compact('seri','iterasi','waktu'));
                }
            }
            else{
                // array task
            }

    }

    function blank1($task, $seri, $iterasi, $array0, $array1, $array2, $array3){
        $waktu = 5;
        $nextRoute = 'tester.ArraySpanTask-Soal';
        $nextRouteParam = ['task'=>'array', 'seri' => $seri, 'iterasi'=>$iterasi, 'array0'=>$array0, 'array1'=>$array1, 'array2'=>$array2, 'array3'=>$array3];
        return view(
            'pages.tester.blank', 
            compact('seri','iterasi', 'waktu', 'nextRoute', 'nextRouteParam')
        );
    }
}

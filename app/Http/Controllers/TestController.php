<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ReadingSpanTask;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('pages.test.home');
    }
    public function focus($task ,$seri, $iterasi, $fokusKe){
        if (Auth::user()->role == 2){
            if($task == 'reading'){
                if($fokusKe == 1){
                    $waktu = 20;
                    $nextRoute = 'tester.reading-span-learn';
                    $nextRouteParam = ['seri' => $seri, 'iterasi'=>$iterasi];
                    return view(
                        'pages.test.focus', 
                        compact('task','seri','iterasi','fokusKe','waktu', 'nextRoute', 'nextRouteParam')
                    );
                    // return halaman kalimat dan kata
                }
                else if($fokusKe == 2){
                    $waktu = 10;
                    $taskId = ReadingSpanTask::where('serial', '=', $seri)
                        ->where('iteration', '=', $iterasi)
                        ->where('user_id', '=', Auth::user()->id)
                        ->first()->id;
                    $nextRoute = 'tester.reading-span-recall';
                    $nextRouteParam = ['taskId' => $taskId];
                    return view(
                        'pages.test.focus', 
                        compact('task','seri','iterasi','fokusKe','waktu',
                            'nextRoute','nextRouteParam'
                        )
                    );
                    // return halamn recall kata
                }
                else{
                    // error
                    return view('pages.test.focus', compact('seri','iterasi','waktu'));
                }
            }
            else{
                // array task
            }
        }
        else if(Auth::user()->role >= 3){
            if ($task == 'reading'){
                if($fokusKe == 1){
                    // return halaman induski emosi (gambar)
                }
                else if($fokusKe == 2){
                    // return halamn kalimat dan kata
                }
                else if($fokusKe == 3){
                    // return halaman recall kata
                }
                else {
                    // error
                    return view('pages.test.focus', compact('seri','iterasi','waktu'));
                }
            }
            else{
                // array task
            }
        }
        else{
            // error
            return view('pages.test.home');
        }
    }
}

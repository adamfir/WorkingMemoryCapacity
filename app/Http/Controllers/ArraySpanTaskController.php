<?php

namespace App\Http\Controllers;
use App\ArraySpanTask;
use App\User;
use Auth;


use Illuminate\Http\Request;

class ArraySpanTaskController extends Controller
{
    //
    //
    public function index($seri, $iterasi){
        $nextRoute = 'tester.blank1';

        if($seri == 1){
            $i = 0;
            $biru = 0;
            $hijau = 0;
            $ungu = 0;

            $segiempat = 0;
            $segitiga = 0;
            $lingkaran = 0;

            $shape = array(array(0, 1, 2), array(3, 4, 5), array(6, 7, 8));
            $key1 = array(0, 1, 2);
            $key2 = array(0, 1, 2);

            while(true){
                $random_keys1=array_rand($key1,1);
                $random_keys2=array_rand($key2,1);

                $rand_keys1 = $key1[$random_keys1];
                $rand_keys2 = $key2[$random_keys2];

                $sementara = $shape[$rand_keys1][$rand_keys2];

                unset($shape[$rand_keys1][$rand_keys2]);
                unset($key1[$rand_keys1]);
                unset($key2[$rand_keys2]);
                $arrays[$i] = $sementara;
                $i++;
                if($i ==3){
                    $arrays[$i] = rand(0, 8);
                    // dd($sementara, $shape, $key1, $key2, $arrays);
                    break;
                }


            }
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
        $users = User::where('id', '=', Auth::user()->id)->first();
        $user = $users->id;
        $cekRandom = rand(0, 3);
        return view('pages/tester/ArraySpanTaskPertanyaan', compact('nextRoute', 'nextRouteParam', 'posisiRandom', 'cekRandom', 'user', 'seri', 'iterasi'));
    }

    public function soal($task, $seri, $iterasi, $array0, $array1, $array2, $array3){

        $datas = [];
        $datas[0] = (int)$array0;
        $datas[1] = (int)$array1;
        $datas[2] = (int)$array2;
        $datas[3] = (int)$array3;

        $dataSoal = $datas;

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
        return view('pages/tester/ArraySpanTaskRead', compact('dataSoal', 'data', 'nextRouteParam', 'nextRoute', 'seri'));

    }

    public function test($task, $seri, $iterasi, $array0, $array1, $array2, $array3){
        $params0 = $array0;
        $params1 = $array1;
        $params2 = $array2;
        $params3 = $array3;

        $users = User::where('id', '=', Auth::user()->id)->first();
        $user = $users->id;
        $nextRoute = 'tester.blank';
        $nextRouteParam = ['task'=> 'array', 'seri' =>$seri, 'iterasi'=>$iterasi];
        return view('pages/tester/ArraySpanTask', compact('params0', 'params1', 'params2', 'params3', 'user', 'task', 'iterasi', 'seri', 'nextRoute', 'nextRouteParam'));
    }
    
    public function submit(Request $request){
        // $array = ArraySpanTask::create(['pertanyaan'=> $request->pertanyaan]);

        $users = User::where('id', '=', Auth::user()->id)->first();
        $user = $users->id;
        $arraySpanTask = ArraySpanTask::where('user_id', '=', $user)->orderBy('updated_at', 'desc')->first();;
        // dd($arraySpanTask);
        $arraySpanTask ->penyusunan = $request->penyusunan;
        $arraySpanTask->save(); 
    }

    public function pertanyaanPost(Request $request){
        // dd($request->user);
        $array =  ArraySpanTask::create(['pertanyaan'=> $request->pertanyaan, 'user_id'=>$request->user, 'seri'=>$request->seri, 'iterasi'=>$request->iterasi]);

        // dd($array);
    }
}

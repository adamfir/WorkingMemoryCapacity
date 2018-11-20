<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function UserPage(){
        return view('pages/admin/input/UserPage');
    }
    public function KuesionerPage(){
        return view('pages/admin/input/KuesionerPage');
    }
    public function SerialKataPage(){
        return view('pages/admin/input/SerialKataPage');
    }
    public function SerialKalimatPage(){
        return view('pages/admin/input/SerialKalimatPage');
    }
    public function InputGambarPage(){
        return view('pages/admin/input/InputGambarPage');
    }
}

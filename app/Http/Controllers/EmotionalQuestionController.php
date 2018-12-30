<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmotionalQuestion;
use App\EmotionalQuestionAnswer;
use App\User;
use Illuminate\Support\Facades\Auth;

class EmotionalQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $quests = EmotionalQuestion::all();
        $time = 1;
        return view('pages.test.kuesioner', compact('time', 'quests'));
    }

    // public function index(){
    //     $time = 60;
    //     return view('pages/tester/EmotionalQuestion', compact('time'));
    // }

    public function submit(Request $request){
        foreach ($request->quests as $key => $quest){
            $answer = new EmotionalQuestionAnswer;
            $answer->user_id = Auth::user()->id;
            $answer->emotional_question_id = $key; 
            $answer->answer = $quest;
            $answer->save();
        }
        $arrayRand = [];
        while(sizeof($arrayRand) < 5){
           $rand = \mt_rand(3,7);
            if (!in_array($rand, $arrayRand)){
                array_push($arrayRand, $rand);
            }
        }
        $user = User::where('id','=', Auth::user()->id)->first();
        $user->reading_stack = implode(',',$arrayRand);
        $user->save();
        return redirect('/tester')->with([
            'success' => 'Pengisian kuesioner berhasil dilakukan.']);
    }
}

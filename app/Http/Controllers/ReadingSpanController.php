<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sentence;
use App\Word;
use App\ReadingSpanTask;
use Illuminate\Support\Facades\Auth;
use App\User;

class ReadingSpanController extends Controller
{
    //

    public function word(){
        return view('pages/tester/ReadingSpan_Word');
    }

    public function sentence(){
        return view('pages/tester/ReadingSpan_Sentence');
    }

    public function learn($seri, $iterasi){
        $user = User::where('id', '=', Auth::user()->id)->first();
        $seri = $user->serial;
        $iterasi = $user->iteration;
        $waktu = 8*$seri;
        $sentence = Sentence::where('seri', '=', $seri)->where('iterasi', '=', $iterasi)->first();
        $sentences = explode("|", $sentence->sentences);
        $readingSpan = ReadingSpanTask::where('serial', '=', $seri)
            ->where('iteration', '=', $iterasi)
            ->where('user_id', '=', Auth::user()->id)
            ->first();
        if($readingSpan == null){
            $word_data = Word::all()->shuffle();
            $words = [];
            foreach ($word_data as $item) {
                array_push($words, $item->word);
                if(sizeof($words) >= $seri){
                    break;
                }
            }
            $readingSpan = new ReadingSpanTask;
            $readingSpan->user_id = Auth::user()->id;
            $readingSpan->serial = $seri;
            $readingSpan->iteration = $iterasi;
            $readingSpan->word = implode(",", $words);
            $readingSpan->sentence_id = $sentence->id;
            $readingSpan->save();
            $taskId = $readingSpan->id;
        }
        else{
            $words = explode(",", $readingSpan->word);
            $taskId = $readingSpan->id;
        }
        $nextRoute = 'tester.reading-span-judge';
        $nextRouteParam = ['taskId' => $taskId];
        return view('pages/test/readLearn', compact(
            'sentences', 'waktu', 'words', 'taskId', 'nextRoute', 'nextRouteParam'));
    }

    public function judge($taskId){
        $waktu = 5;
        $readingSpan = ReadingSpanTask::where('id', '=', $taskId)->first();
        $sentence = Sentence::where('id', '=', $readingSpan->sentence_id)->first()->sentence;
        $nextRoute = 'tester.reading-span-judgeAns';
        // dd($readingSpan, $sentence);
        return view('pages.test.readJudge', compact('sentence', 'taskId', 'waktu', 'nextRoute'));
    }

    public function judgeAns($taskId, $ans){
        $readingSpan = ReadingSpanTask::where('id', '=', $taskId)->first();
        $sentence = Sentence::where('id', '=', $readingSpan->sentence_id)->first();
        $readingSpan->sentence_answer = $ans;
        if($ans == $sentence->correct_answer){
            $readingSpan->sentence_result = 1;
        }
        else{
            $readingSpan->sentence_result = 0;
        }
        $readingSpan->save();
        $user = User::where('id', '=', Auth::user()->id)->first();
        if($user->role == 2){
            $fokusKe = 2;
        }
        else{
            $fokusKe = 3;
        }
        return redirect(
            route(
                'tester.focus', 
                [
                    'task' => 'reading',
                    'seri' => $user->serial,
                    'iterasi' => $user->iteration,
                    'fokusKe' => $fokusKe
                ]
            )
        );
    }

    public function recall($taskId){
        $readingSpan = ReadingSpanTask::where('id', '=', $taskId)->first();
        $words = explode(",", $readingSpan->word);
        $waktu = 5*sizeof($words);
        return view('pages.test.readRecall', compact('taskId', 'words', 'waktu'));
    }

    public function recallAns(Request $request, $taskId){
        $readingSpan = ReadingSpanTask::where('id', '=', $taskId)->first();
        $words = explode(",", $readingSpan->word);
        $words = array_map('strtolower', $words);
        $words = array_map('ucwords', $words);
        $wordsAns = array_map('strtolower', $request->words);
        $wordsAns = array_map('ucwords', $wordsAns);
        $user = User::where('id', '=', Auth::user()->id)->first();
        if($user->iteration < 3){
            $user->iteration += 1;
        }
        else{
            $user->serial += 1;
            $user->iteration = 1;
            if($user->serial > 7){
                // dd("Reading Span Task Selesai");
                return redirect(route('tester.home'))->with([
                    'success' => 'Selamat, anda telah menyelesaikan Reading Span Task.']);
            }
        }
        $user->save();
        if($readingSpan->recall_method == 'free'){
            $intersect = array_intersect($words, $wordsAns);
            $readingSpan->word_answer = implode(",", $wordsAns);
            $readingSpan->word_result = count($intersect);
            // dd($request,$readingSpan);
            $readingSpan->save();
            return redirect(
                route(
                    'tester.focus', 
                    [
                        'task' => 'reading',
                        'seri' => $user->serial,
                        'iterasi' => $user->iteration,
                        'fokusKe' => 1
                    ]
                )
            );
        }
        dd($words, $wordsAns);
    }
}

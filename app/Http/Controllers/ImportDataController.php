<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Imports\EmotionalQuestionsImport;
use App\Imports\WordsImport;
use App\Imports\SentencesImport;
use App\User;
use App\EmotionalQuestion;
use Storage;
use Illuminate\Support\Facades\Hash;

class ImportDataController extends Controller
{
    public function userImport(Request $request){
        if($request->hasFile('excel_data')){
            $path = $request->file('excel_data')->store('excel');
            $excel_data = Excel::import(new UsersImport, $path);
            Storage::delete($path);
            $message = 'Berhasil';
            return redirect()->back()->with(['success' => $message]);
        }
        $message = "File not found";
        return redirect()->back()->with(['error' => $message]);
    }
    public function EmotionalQuestionImport(Request $request){
        if($request->hasFile('excel_data')){
            $path = $request->file('excel_data')->store('excel');
            $excel_data = Excel::import(new EmotionalQuestionsImport, $path);
            Storage::delete($path);
            $message = 'Berhasil';
            return redirect()->back()->with(['success' => $message]);
        }
        $message = "File not found";
        return redirect()->back()->with(['error' => $message]);
    }
    public function WordImport(Request $request){
        if($request->hasFile('excel_data')){
            $path = $request->file('excel_data')->store('excel');
            $excel_data = Excel::import(new WordsImport, $path);
            Storage::delete($path);
            $message = 'Berhasil';
            return redirect()->back()->with(['success' => $message]);
        }
        $message = "File not found";
        return redirect()->back()->with(['error' => $message]);
    }
    public function SentenceImport(Request $request){
        if($request->hasFile('excel_data')){
            $path = $request->file('excel_data')->store('excel');
            $excel_data = Excel::import(new SentencesImport, $path);
            Storage::delete($path);
            $message = 'Berhasil';
            return redirect()->back()->with(['success' => $message]);
        }
        $message = "File not found";
        return redirect()->back()->with(['error' => $message]);
    }
}

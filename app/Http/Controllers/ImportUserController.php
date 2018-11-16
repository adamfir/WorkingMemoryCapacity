<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\User;
use Storage;

class ImportUserController extends Controller
{
    public function import(Request $request){
        if($request->hasFile('excel_data')){
            $path = $request->file('excel_data')->store('excel');
            $excel_data = Excel::toCollection(new UsersImport, $path);
            Storage::delete($path);

            foreach($excel_data[0] as $user){
                $user = new User($user->toArray());
                $user->save();
            }
            $message = '';
            return redirect()->back()->with(['success' => $message]);
        }
        $message = "File not found";
        return redirect()->back()->with(['error' => $message]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    //
    
    public function dashboard(Request $request)
    {
        $pagination = 30;   
        $data = History::orderBy('created_at','desc')->get();
        return view('history.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }
}

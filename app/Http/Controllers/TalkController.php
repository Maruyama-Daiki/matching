<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TalkController extends Controller
{
    public function index()
    {
         //Swipes_tableの情報を取得
        $swipe_list = Swipe::all();
        
         return view('admin.talk.index');
         
         
    }
        
       
}

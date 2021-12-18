<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Profile;
use App\Swipe;
use App\user;


class SwipeController extends Controller
{
     public function store(Request $request)
     {
        $user = Auth::user();
        $profile = $user->profile;
        
         Swipe::create([
              'from_user_id' =>$user->profile->user_id,
              'to_user_id' =>$request->input('to_user_id'),
              'is_like' =>$request->input('is_like'),
            ]);
         
         return redirect('/match');
     }
}

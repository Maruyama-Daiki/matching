<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
         
         //自分がswipeした人からいいねが来ていたらmatch
         //ログインユーザーが、スワイプした際のto_user_idとis_likeを取得。
         $from_matched = $request->to_user_id;
         $profile_matchd = Profile::where('user_id',$from_matched)->get();
         dump($from_matched);
         dump($profile_matchd);
         
         
         //$requestからis_likeだけを取得。
         $from_matched_is_like = $request->is_like;
         dump($from_matched_is_like);
         
         
         //逆に、上記のto_user_idがfrom_user_idで、ログインユーザーがto_user_idで、is_lileが1(いいね)1の時の組み合わせを取得。
         $to_matched = Swipe::where('from_user_id', $from_matched)
                            ->where('to_user_id', $user->profile->user_id)
                            ->where('is_like',1)
                            ->first();
                            
         dump($to_matched);
        
                            
         $to_matched_is_like = $to_matched->is_like;
         dump($to_matched_is_like);
         
        
        
        if($from_matched_is_like == $to_matched_is_like){
            dump($from_matched_is_like);
            dump($to_matched_is_like);
            
            return redirect('/match',['profile' => $profile_matchd])->with('message', 'マッチしました');
            
             //return view('admin.match.index', ['profile' => $profile_matchd]);
            // dump("マッチしました。");
            // return;
            
        }
                            
        
         return redirect('/match');
     }
}

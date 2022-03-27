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
        $from_user_id = $user->profile->user_id;
        $to_user_id = $request->input('to_user_id');
        
        
         Swipe::create([
              'from_user_id' =>$from_user_id,
              'to_user_id' =>$to_user_id,
              'is_like' =>$request->input('is_like'),
            ]);
         
         //自分がswipeした人からいいねが来ていたらmatch
         //ログインユーザーが、スワイプした際のto_user_idとis_likeを取得。
         
         //表示されているユーザーのuser_idを取得。
          $user_matched = $request->to_user_id;
         //取得したuser_idのプロフィール情報を取得。
          $profile_matched = Profile::where('user_id',$user_matched)->first();
          
         //逆に、上記のto_user_idがfrom_user_idで、ログインユーザーがto_user_idで、is_lileが1(いいね)1の時の組み合わせを取得。
         $to_matched = Swipe::where('from_user_id', $to_user_id)
                            ->where('to_user_id', $from_user_id)
                            ->where('is_like',1)
                            ->first();
                            
         $from_matched = Swipe::where('from_user_id', $from_user_id)
                            ->where('to_user_id', $to_user_id)
                            ->where('is_like',1)
                            ->first();
                            
        //to_matchedとfrom_matchedが空じゃない時、
        if(!empty($to_matched) && !empty($from_matched)){
            
            //マッチした場合、もう一度そのユーザーを表示させる。
            return view('admin.match.index',['profile' => $profile_matched,'to_matched'=>$to_matched,'from_matched'=>$from_matched])->with('message', 'マッチしました');
            
        }
        else {
        
        return redirect('/match');
        }
     }
}


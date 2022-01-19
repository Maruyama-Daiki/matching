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
        //  dump($user_matched);
          dump($profile_matched);
         
         
         
         
         //逆に、上記のto_user_idがfrom_user_idで、ログインユーザーがto_user_idで、is_lileが1(いいね)1の時の組み合わせを取得。
         $to_matched = Swipe::where('from_user_id', $to_user_id)
                            ->where('to_user_id', $from_user_id)
                            ->where('is_like',1)
                            ->first();
                            
                            
        
         $from_matched = Swipe::where('from_user_id', $from_user_id)
                            ->where('to_user_id', $to_user_id)
                            ->where('is_like',1)
                            ->first();
                            
        dump($from_user_id);
         dump($to_matched);
         dump($from_matched);
                            
        //to_matchedとfrom_matchedが空じゃない時、
        if(!empty($to_matched) && !empty($from_matched)){
         //$to_matched_is_like = $to_matched->is_like;
         dump("マッチ。");
        
        
        // if($from_matched_is_like == $to_matched_is_like){
        //     dump($from_matched_is_like);
        //     dump($to_matched_is_like);
            
            
            //マッチした場合、もう一度そのユーザーを表示させる。
            return view('admin.match.index',['profile' => $profile_matched])->with('message', 'マッチしました');
            
             //return view('admin.match.index', ['profile' => $profile_matchd]);
            // dump("マッチしました。");
            // return;
            
        }
        else {
        
        return redirect('/match');
        }
        
     }
}

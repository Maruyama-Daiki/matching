<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Profile;
use App\Swipe;


class UserController extends Controller
{
    //MATCHINGページのコントローラー
    public function index()
    {
        //Profiles_tableの情報を取得
        $profile_list = Profile::all();
        
        //ログイン中のユーザーのuser_idを取得
        $current_user_profile = Profile::where('user_id', Auth::id())->first();
        
        $profile=null;
        
    
        
        if (count($profile_list) > 0) {
            //ログインユーザーの性別(0or1)と、相手の性別(0or1)を足す処理。
            foreach($profile_list as $profile_list_item){
                $gender_sum = $current_user_profile->gender + $profile_list_item->gender;
                //Swipes_tableの情報を取得し、スワイプの組み合わせがあるか取得
                $swipe_list_like = Swipe::where('from_user_id',Auth::id())->where('to_user_id',$profile_list_item->id)->get();
                
                //奇数(異性）の場合は表示
                //一旦マッチやLIKEやNOPEしたユーザー以外を表示（0＝まだswipeしていない）
                if ($gender_sum % 2 == 1 && count($swipe_list_like) == 0) {
                
                $profile=$profile_list_item;
                
                
   
                break;
                 } 
            }
            
             
        } else {
            $profile = null;
        }
   
  
        return view('admin.match.index', [
            'profile' => $profile]);
    }
}

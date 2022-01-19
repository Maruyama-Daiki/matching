<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Swipe;
use App\Profile;


class TalkController extends Controller
{
    public function index()
    {
        
        $result_talk_list = array();
        
         //Profiles_tableの情報を取得
        $profiles = Profile::all();
        
        //ログイン中のユーザーのuser_idを取得
        $current_user_id = Auth::id();
        //$current_user_id = Profile::where('user_id', Auth::id())->first();
        
         //Swipes_tableの情報を取得
        $swipe_list = Swipe::all();
        
        foreach($profiles as $profile){
            //profileのuser_idを取得
            $profile_user_id = $profile->user_id;
            //swipes_tableのis_likeがお互いに１（like）の情報を取得する。
            $from_matched = Swipe::where('from_user_id', $current_user_id)
                            ->where('to_user_id', $profile_user_id)
                            ->where('is_like',1)
                            ->first();
                            
            $to_matched = Swipe::where('from_user_id', $profile_user_id)
                            ->where('to_user_id', $current_user_id)
                            ->where('is_like',1)
                            ->first();
            
            //$is_like_sum = $from_matched->is_like + $to_matched->is_like;
            
            //if($is_like_sum == 2){
              //to_matchedとfrom_matchedが空じゃない時、
        if(!empty($to_matched) && !empty($from_matched)){
                
                array_push($result_talk_list, $profile);
            }
            
            // else{
            //     $profile = null;
            // }
        }
        
         return view('admin.talk.index',[
            'talk_list' => $result_talk_list]);
         
         
    }
        

        public function chat(Request $request)
    {
        $profile = Profile::find($request->user_id);
        
        return view('admin.talk.talkchat', ['userprofile' => $profile]);
    }
}

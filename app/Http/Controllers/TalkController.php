<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Swipe;
use App\Profile;
use App\Message;
use Storage;

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
                            
              //to_matchedとfrom_matchedが空じゃない時、
        if(!empty($to_matched) && !empty($from_matched)){
                
                array_push($result_talk_list, $profile);
            }
            
        }
        
         return view('admin.talk.index',[
            'talk_list' => $result_talk_list]);
         
         
    }
        

        public function chat(Request $request)
    {
        $result_messages =  Message::where(function($query) use($request){
                        $query->where('from_user_id', '=', Auth::id())
                              ->where('to_user_id', '=', $request->to_user_id);
                    })->orwhere(function($query) use($request){
                        $query->where('to_user_id', '=', Auth::id())
                              ->where('from_user_id', '=', $request->to_user_id);
                    })->get();
                    
        $profile = Profile::find($request->to_user_id);
        
        $current_profile = Profile::where('user_id', Auth::id())->first();
        
        
        return view('admin.talk.talkchat', ['userprofile' => $profile , 'authprofile' => $current_profile , 'messages_list' => $result_messages,'to_user_id'=>$request->to_user_id]);
        
    }
    
    
        public function send(Request $request)
    {
        $rules = array(
            'text' => 'required',
        );
        
        $this->validate($request, $rules);
        
        $messages = new Message;
        $form = $request->all();
        
        $user_id = $form['to_user_id'];
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        // データベースに保存する
        $messages->fill($form);
        $messages->from_user_id=Auth::id();
        $messages->save();
        
        return redirect("/talkchat?to_user_id=$user_id");
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\News;
use App\Profile;
use App\Swipe;
use Storage;

class UsernewsController extends Controller
{
  
    public function index(Request $request)
    {
        $posts = News::all()->sortByDesc('updated_at');
        $result_posts = array();
        
        //ログイン中のユーザーのuser_idを取得
        $current_user_id = Auth::id();
        
        //自分の投稿と、マッチした人の投稿のみを表示させる
        //自分の投稿を取得する。投稿データのuser_idとログインユーザーのuser_idが一致したら表示
        
        foreach($posts as $post){
            //投稿ニュースのuser_idを取得
            $post_user_id = $post->user_id;
            //swipes_tableのis_likeが
            $from_matched = Swipe::where('from_user_id', $current_user_id)
                            ->where('to_user_id', $post_user_id)
                            ->where('is_like',1)
                            ->first();
                            
            $to_matched = Swipe::where('from_user_id', $post_user_id)
                            ->where('to_user_id', $current_user_id)
                            ->where('is_like',1)
                            ->first();
            
            if($post_user_id == $current_user_id || (!empty($from_matched) && !empty($to_matched))){
                array_push($result_posts, $post);
            }
        }

        // admin/news/index.blade.php ファイルを渡している
        return view('admin.news.index', ['news_list' => $result_posts]);
    }
}

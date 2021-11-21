<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでNews Modelが扱えるようになる
use App\News;

// use App\Profile;
// User::find(1)->profile->name;

class NewsController extends Controller
{
    // 以下を追記
  public function add()
  {
    
      return view('admin.news.create');
  }

  public function create(Request $request)
  {
      // Varidationを行う
      $this->validate($request, News::$rules);
      
      $news = new News;
      $form = $request->all();
      
      // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if (isset($form['image_path'])) {
        $path = $request->file('image_path')->store('public/image');
        $news->image_path = basename($path);
      } else {
          $news->image_path = null;
      }
      
      $form['user_id'] = Auth::id(); //新規投稿作成時にないuser_idを適応させる
      
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image_path']);
      
      // データベースに保存する
      $news->fill($form);
      $news->save();
      
      // POSTにリダイレクトする
      return redirect('/post');
  }  
}

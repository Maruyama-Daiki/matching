<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでprofile Modelが扱えるようになる
use App\Profile;
use Storage;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
    
    public function create(Request $request)
  {
      // Varidationを行う
      $this->validate($request, Profile::$rules);
      
      $profile = new Profile;
      $form = $request->all();
     
      // フォームから画像が送信されてきたら、保存して、$profile->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        // $path = $request->file('image')->store('public/image');
        // $profile->image_path = basename($path);
        $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $profile->image_path = Storage::disk('s3')->url($path);
      } else {
          $profile->image_path = null;
      }
      
     
     $form['user_id'] = Auth::id(); //プロフィール作成時にないuser_idを適応させる
      
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      
      // データベースに保存する
      $profile->fill($form);
      $profile->save();
      
      return redirect('/mypage');
  }
}

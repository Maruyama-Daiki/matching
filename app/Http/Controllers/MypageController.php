<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Profile;
use Storage;

class MypageController extends Controller
{
  
    public function index()
    {
        $profile = Profile::where('user_id', Auth::id())->first();
        if (empty($profile))
        {
            return view('admin.profile.create');
        }
        else
        {
            // admin/profile/mypage.blade.php ファイルを渡している
            return view('admin.profile.mypage', ['profile' => $profile]);
        }
    }
    
     public function edit(Request $request)
  {
      // Profile Modelからデータを取得する
      $profile = Profile::where('user_id', Auth::id())->first();
      return view('admin.profile.edit', ['profile' => $profile]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Profile::$rules);
      // 送信されてきたフォームデータを格納する
      $form = $request->all();
      // Profile Modelからデータを取得する
      $profile = Profile::where('user_id', Auth::id())->first(); 
      
      if ($request->remove == 'true') {
          $profile['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $profile['image_path'] = basename($path);
      } else {
          $profile['image_path'] = $profile->image_path;
      }
      
      unset($form['image']);
      unset($form['remove']);
      unset($form['_token']);

      // 該当するデータを上書きして保存する
      $profile->fill($form)->save();

      return redirect('/mypage');
  }
}
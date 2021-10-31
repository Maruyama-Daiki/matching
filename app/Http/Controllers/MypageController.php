<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profile;

class MypageController extends Controller
{
  
    public function index()
    {
        $posts = Profile::all()->sortByDesc('updated_at');

        // admin/news/index.blade.php ファイルを渡している
        return view('admin.profile.mypage', ['profile_list' => $posts]);
    }
}
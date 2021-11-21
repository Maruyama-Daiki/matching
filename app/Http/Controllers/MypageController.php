<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Profile;

class MypageController extends Controller
{
  
    public function index()
    {

        // $profile = Profile::find(Auth::id());
        // dump($profile);
        // dump(Auth::id());
        // return;
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
}
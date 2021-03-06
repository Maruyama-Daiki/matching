<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Profile;
use Storage;

class UserprofileController extends Controller
{
    public function index(Request $request)
    {
         $profile = Profile::find($request->user_id);
         
         // admin/profile/mypage.blade.php ファイルを渡している
            return view('admin.match.userprofile', ['userprofile' => $profile]);
        }

}

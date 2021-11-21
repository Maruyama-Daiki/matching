<?php
// matchのページのコントローラー

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;

class UserController extends Controller
{
    public function index()
    {
        $profile_list = Profile::find(1);
    
        return view('admin.match.index', [
            'profile_list' => $profile_list]);
    }
}
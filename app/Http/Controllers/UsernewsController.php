<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;

class UsernewsController extends Controller
{
  
    public function index()
    {
        $posts = News::all()->sortByDesc('updated_at');

        //  if (count($posts) > 0) {
        //      $headline = $posts->shift();
        //  } else {
        //     $headline = null;
        // }

        // admin/news/index.blade.php ファイルを渡している
        return view('admin.news.index', ['news_list' => $posts]);
    }
}

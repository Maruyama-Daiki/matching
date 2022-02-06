@extends('layouts.front')

@section('content')
    <div class="container">
        {{ csrf_field() }}
                    <a href="/admin/news/create" class="btn btn-primary">新規投稿</a>
        
        <hr color="#c0c0c0">
        
        @if(count($news_list) > 0)
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($news_list as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                
                                <div class="name">
                                    <p>FROM：{{ str_limit($post->user->profile->name,100) }}</p>
                                </div>
                                
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($post->body, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}" class="post_photo">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
        
        @else
        <div class="p-5 m-5 text-center">
         <h3>まだ投稿がありません。</h3>
        </div>
        @endif
    </div>
@endsection
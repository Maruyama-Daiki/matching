
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TALK_USER_LIST</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
</head>

@extends('layouts.admin')

@section('title', 'TALKINGLIST')

@section('content')

<div class="container">
        {{ csrf_field() }}
        
 @if(count($talk_list) > 0)
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($talk_list as $profile)
                    <div class="profile">
                        <div class="row">
                            <div class="text col-md-6">
                                
                                <div class="tname">
                                    <p>NAME：{{ str_limit($profile->name,100) }}</p>
                                </div>
                                
                            </div>
                            <div class="talk_image mt-4">
                                @if ($profile->image_path)
                                <a href="{{ action('TalkController@chat', ['to_user_id' => $profile->id]) }}">
                                    <input type="image" img src="{{ asset('storage/image/' . $profile->image_path) }}" class="timage">
                                </a>
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
         <h3>まだマッチがありません。</h3>
        </div>
        @endif
</div>
@endsection
                    
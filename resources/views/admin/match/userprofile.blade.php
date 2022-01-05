<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERPROFILE</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
</head>

{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

@section('title', 'User Profile')

@section('content')
<div class="container">
        {{ csrf_field() }}
        
<hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                    <div class="profile_container">
                        
                        <div class="row">
                            <div class="text col-md-6">
                                
                                <div class="btn btn-outline-dark">
                                    <button type="button" onClick="history.back()">戻る</button>
                                </div>
                                
                                <hr width="100%" align="left" size="8" color="black">
                                
                                <div class="name">
                                    <p>名前：{{ str_limit($userprofile->name,100) }}</p>
                                </div>
                                
                                <hr width="100%" align="left" size="8" color="black">
                                
                                <div class="gender mt-3">
                                    <p>性別：{{ config('gender.index')[$userprofile->gender] }}</p>
                                </div>
                                
                                <hr width="100%" align="left" size="8" color="black">
                                
                                <div class="hobby mt-3">
                                    <p>趣味：{{ str_limit($userprofile->hobby,100) }}</p>
                                </div>
                                
                                <hr width="100%" align="left" size="8" color="black">
                                
                                <div class="introduce mt-3">
                                    <p>自己紹介：{{ str_limit($userprofile->introduce,200) }}</p>
                                </div>
                                
                                <hr width="100%" align="left" size="8" color="black">
                                
                                <div class="job mt-3">
                                    <p>仕事：{{ str_limit($userprofile->job,100) }}</p>
                                </div>
                                
                                <hr width="100%" align="left" size="8" color="black">
                                
                                <div class="area mt-3">
                                    <p>居住区：{{ str_limit($userprofile->area,100) }}</p>
                                </div>
                                
                                
                            </div>
                            
                            <div class="image col-md-6 text-right mt-4">
                                @if ($userprofile->image_path)
                                    <img src="{{ asset('storage/image/' . $userprofile->image_path) }}" width="auto" height="450px">
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
            </div>
        </div>
</div>
@endsection

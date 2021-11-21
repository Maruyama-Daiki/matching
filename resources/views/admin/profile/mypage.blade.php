<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYPAGE</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
</head>

{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

@section('title', 'My Page')

@section('content')
<div class="container">
        {{ csrf_field() }}
        
<hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                    <div class="profile_container">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="name">
                                    {{ str_limit($profile->name, 150) }}
                                </div>
                                <div class="gender">
                                    {{ config('gender.index')[$profile->gender] }}
                                </div>
                                <div class="hobby mt-3">
                                    {{ str_limit($profile->hobby, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($profile->image_path)
                                    <img src="{{ asset('storage/image/' . $profile->image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
            </div>
        </div>
</div>
@endsection

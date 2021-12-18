<!DOCTYPE html>
{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- prfile.blade.phpの@yield('title')に'MY PROFILE'を埋め込む --}}
@section('title', 'MY PROFILE EDIT')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>MY PROFILE 編集</h2>
                <form action="{{ action('MypageController@update') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2">プロフィール画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $profile->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label class="col-md-2">ニックネーム</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profile->name }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <select class="custom-select" name="gender">{{ $profile->gender }}
                                <option value="0">男性</option>
                                <option value="1">女性</option>
                            </select>
                        </div>
                    </div>
                   
                    
                     <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" style="height: 50px">{{ $profile->hobby }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduce" style="height: 200px">{{ $profile->introduce }}</textarea>
                        </div>
                    </div>
                    
                     <div class="form-group row">
                        <label class="col-md-2">仕事</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="job" style="height: 50px">{{ $profile->job }}</textarea>
                        </div>
                    </div>
                    
                     <div class="form-group row">
                        <label class="col-md-2">居住エリア(県・市)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="area" style="height: 50px">{{ $profile->area }}</textarea>
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="user_id" value="{{ $profile->user_id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
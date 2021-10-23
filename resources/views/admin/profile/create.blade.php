<!DOCTYPE html>
{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')


{{-- prfile.blade.phpの@yield('title')に'MY PROFILE'を埋め込む --}}
@section('title', 'MY PROFILE')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>MY PROFILE</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">

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
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label class="col-md-2">ニックネーム</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <select class="custom-select" name="gender">
                                <option value="0">男性</option>
                                <option value="1">女性</option>
                            </select>
                        </div>
                    </div>
                   
                    
                     <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" style="height: 50px">{{ old('hobby') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduce" style="height: 200px">{{ old('introduce') }}</textarea>
                        </div>
                    </div>
                    
                     <div class="form-group row">
                        <label class="col-md-2">仕事</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="job" style="height: 50px">{{ old('job') }}</textarea>
                        </div>
                    </div>
                    
                     <div class="form-group row">
                        <label class="col-md-2">居住エリア(県・市)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="area" style="height: 50px">{{ old('area') }}</textarea>
                        </div>
                    </div>
                    
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection
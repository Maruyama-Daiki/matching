<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rakus</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
{{-- layouts/default.blade.phpを読み込む --}}
@extends('layouts.default')

@section('title', 'Home Page')

@section('content')


<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
        <div class="carousel-item active">
         <img src="images/topimage.png" class="topimage" alt="First slide">
        </div>
        <div class="carousel-item">
         <img src="images/topimage1.jpg" class="topimage" alt="second slide">
        </div>
        <div class="carousel-item">
         <img src="images/topimage2.jpg" class="topimage" alt="third slide">
        </div>
  </div>
</div>

                
<hr color="black">
<hr color="black">

<div class="container">
    <div class="row">
        <p class='mx-auto mt-5'>CONTENTS</p>
    </div>
</div>
    
<div class="d-flex justify-content-around bd-highlight mt-5">
    <div class="p-2 bd-highlight">FREE</div>
    <div class="p-2 bd-highlight">POSTING</div>
    <div class="p-2 bd-highlight">MATCHING</div>
</div>
            
            
<div class="d-flex justify-content-around bd-highlight">
    <div class="p-2 bd-highlight">
        <img src="images/FREE-image.jpg" class="FREEimage" alt="FREEimage"　width="200" height="200">
    </div>
    <div class="p-2 bd-highlight">
        <img src="images/POSTING-image.jpg" class="POSTINGimage" alt="POSTINGimage"　width="200" height="200">
    </div>
    <div class="p-2 bd-highlight">
        <img src="images/MATCHING-image.jpg" class="MATCHINGimage" alt=MATCHINGimage"　width="200" height="200">
    </div>
</div>        

<div class="d-flex justify-content-around bd-highlight">
    <div class="p-2 bd-highlight">
        <p class="FREEimage-caption">
            出会いから、メッセージまで<br>
            基本サービスは全て無料。<br>
            ※課金サービスも一部ございます。
        </p>
    </div>
    <div class="p-2 bd-highlight">
        <p class="POSTINGimage-caption">
            写真を投稿。<br>
            気になる投稿から<br>
            共通の趣味を見つけよう。
        </p>
    </div>
    <div class="p-2 bd-highlight">
        <p class="MATCHINGimage-caption">
            24時間体制サポート・パトロールで、<br>
            安心・安全な出会いを提供。
        </p>
    </div>
</div>      

<div class="button-register">
    <div class="row">
        <button type="button" class="btn btn-outline-info btn-lg mx-auto mt-5">
            <a href='https://8daf8c72e9a94f3c97f1c2edee0de167.vfs.cloud9.us-east-2.amazonaws.com/register'>
                アカウント作成</button></a>
    </div>
</div>

<div class="attention-text">
    <p style="text-align: right">
        ※マッチングサービスは18歳以上の方が対象になります。<br>
        18歳未満の方はご利用になれません｡
    </p>

@endsection
            
</html>

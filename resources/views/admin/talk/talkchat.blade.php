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

@section('title', 'CHATROOM')

@section('content')

<main class="content">
    <div class="container p-0">
         {{ csrf_field() }}
        
        <div class="btn btn-outline-dark mb-2">
            <button type="button" onClick="history.back()">マッチリスト一覧</button>
        </div>
        
		<div class="card">
			<div class="row g-0">
				   
					<hr class="d-block d-lg-none mt-1 mb-0">
				</div>
				
				
				<div class="col-12 col-lg-auto col-xl-auto">
				    
					<div class="py-2 px-4 border-bottom d-none d-lg-block">
						<div class="d-flex align-items-center py-1">
							<div class="position-relative">
							    
							    <a href="{{ action('UserprofileController@index', ['user_id' => $userprofile->id]) }}">
							     <img src="{{ $userprofile->image_path }}" class="rounded-circle mr-1" width="40" height="40">
							    </a>
							    
							</div>
							<a href="{{ action('UserprofileController@index', ['user_id' => $userprofile->id]) }}">
							 <div class="flex-grow-1 pl-3">
								<strong>{{ str_limit($userprofile->name,100) }}</strong>
							 </div>
							</a>
						</div
						<hr color="#c0c0c0">
					</div>
					
				@if(count($messages_list) > 0)
					<div class="position-relative">
						<div class="chat-messages p-4">

						@foreach($messages_list as $message)
						
							@if($message->from_user_id==Auth::id())
							<div class="chat-message-right pb-4">
								<div>
									<img src="{{ $authprofile->image_path }}" class="rounded-circle mr-1" width="40" height="40">
									<div class="text-muted small text-nowrap mt-2">{{ $message->updated_at->format('y/n/j/G:i') }}</div>
								</div>
								<div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
									<div class="font-weight-bold mb-1">{{$authprofile->name}}</div>
									{{ $message->text }}
								</div>
							</div>
							
							@else
							<div class="chat-message-left pb-4">
								<div>
									<img src="{{ $userprofile->image_path }}" class="rounded-circle mr-1" width="40" height="40">
									<div class="text-muted small text-nowrap mt-2">{{ $message->updated_at->format('y/n/j/G:i') }}</div>
								</div>
								<div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
									<div class="font-weight-bold mb-1">{{$userprofile->name}}</div>
									{{ $message->text }}
								</div>
							</div>
							@endif
						@endforeach
						
						@else
						<div class="chatmessage text-center">
		        			<h3>メッセージを送りましょう!!</h3>
		        		</div>
		        		@endif

						</div>
					</div>

					<div class="flex-grow-0 py-3 px-4 border-top">
						<form action="{{ action('TalkController@send') }}" method="post" enctype="multipart/form-data">
						<div class="input-group">
							<input type="text" name="text" class="form-control" placeholder="Type your message">
							<input type="hidden" name="to_user_id" value="{{ $to_user_id}}">
						
							<button class="btn btn-primary">
								Send
							</button>
						</div>
						{{ csrf_field() }}
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection
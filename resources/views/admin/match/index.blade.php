@extends('layouts.admin')

@section('title', 'MATCHING')

@section('content')
<div class="p-user-index">
    
    
@if(!empty($to_matched) && !empty($from_matched))
<div class="mathing_message text-center">
<P>mathing</P>
</div>
    @else
    @endif
    
    
    
    @if (!is_null($profile))
    <div class="mphoto text-center">
        @if ($profile->image_path)
        <div class="mphoto">
        <image src="{{ asset('storage/image/' . $profile->image_path) }}" width="auto" height="450px" class="match_photo">
        </div>
        @endif
        
     <div class="muser_profile">
      <div class="mname">
         <a href="{{ action('UserprofileController@index', ['user_id' => $profile->id]) }}">{{ $profile->name }}</a>
      </div>
     </div>
    </div>

    @else
    @endif

</div>
   
    <div class="tcontrols text-center">
         @if (!is_null($profile))
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-1">
                    
                    <form action="{{ route('swipes.store') }}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="to_user_id" value="{{ $profile->user_id }}">
                        <input type="hidden" name="is_like" value="0">
        
                        <button class="tno" type="submit">
                            <i class="fa fa-times fa-5x" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-6 mb-1">
                    
                    <form action="{{ route('swipes.store') }}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="to_user_id" value="{{ $profile->user_id }}">
                        <input type="hidden" name="is_like" value="1">
                        
                        
                        <button class="tyes" type="submit">
                            <i class="fa fa-heart fa-5x" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @else
    <p>周りにユーザーがいないようです。</p>
    @endif
    </div>
@endsection

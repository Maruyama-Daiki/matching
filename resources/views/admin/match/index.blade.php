<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@extends('layouts.admin')

@section('title', 'MATCHING')

@section('content')
<div class="p-user-index">
    
    
        @if(!empty($to_matched) && !empty($from_matched))
        
        
        <script type="text/javascript">
        Swal.fire({
          title: 'マッチしました！！',
          confirmButtonText: 'OK',
          confirmButtonColor: '#FF0000',
        }).then((result) => {
          if (result.isConfirmed) {
            location.href = "match";
          }
        })
</script>

        @else
        @endif
    
    @if (!is_null($profile))
    <div class="mphoto text-center">
        @if ($profile->image_path)
        <a href="{{ action('UserprofileController@index', ['user_id' => $profile->id]) }}">
            <div class="mphoto">
            <image src="{{ $profile->image_path }}" width="auto" height="450px" class="match_photo">
            </div>
        </a>
        @endif
        
         <div class="muser_profile">
              <div class="mname">
                  <p>{{ $profile->name }}</p>
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
        <div class="p-5 m-5">
            <h3>周りにユーザーがいないようです。</h3>
        </div>
        @endif
    </div>
@endsection

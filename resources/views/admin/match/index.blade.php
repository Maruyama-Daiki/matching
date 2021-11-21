@extends('layouts.admin')

@section('title', 'MATCHING')

@section('content')
<div class="p-user-index">
    <div class="mphoto">
        <image src="{{ asset('storage/image/' . $profile_list->image_path) }}" title="mphoto" alt="Match photo" />
        <div class="mname">{{ $profile_list->name }}</div>
    </div>
    
    <div class="tcontrols">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-1">
                    <form action="" method="">
                        <button class="tno" type="submit">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-6 mb-1">
                    <form action="" method="">
                        
                        <button class="tyes" type="submit">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

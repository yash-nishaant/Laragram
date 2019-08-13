@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="pb-2" style="font-weight: bold;">You are Following</h3>
    @if (!$followingprofiles->count())
        <p>You are not following anyone</p>
    @else
        <div class="row">
            <div class="col-lg-12">
                @foreach ($followingprofiles as $userprofile)
                    <div class="media pb-4">
                        <a href="/profile/{{ $userprofile->user_id }}" class="pull-left">
                            <img src="{{$userprofile->profileImage()}}" class="w-100 rounded-circle" style="max-width: 100px;" alt="" class="media-object">
                        </a>
                        <div class="media-body pl-4">
                            <div class="media-heading"><a href="/profile/{{ $userprofile->user_id }}" style="font-weight: bold; color: black;">{{$userprofile->user->username}}</a></div>
                            <div class="text-small">{{$userprofile->user->name}}</div>       
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
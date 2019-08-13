@extends('layouts.app')

@section('content')
<div class="container col-6 offset-3">
    @foreach($posts as $post)
        <div class="card w-100" style="border:1px solid black; margin-bottom:10%">
            <div class="card-header w-100">
                <span class="font-weight-bold">
                    <a href="/profile/{{ $post->user->id }}">
                        <span><img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle pr-2" style="height: 6%; width:6%"></span><span class="text-dark">{{ $post->user->username }}</span>
                    </a>
                </span>
            </div>

            <div class="card-body">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
                <div class="row-pt-2 pb-2">
                    <div class="pt-2">
                        <div class="pt-2" name="commenttab">
                            <like-button post-id = "{{$post->id}}" like-count = "{{$post->likes->count()}}" has-liked = "{{$post->user->hasLiked($post)}}"></like-button>
                            <p class="pt-3">
                                <span><img src="{{$post->user->profile->profileImage()}}" class="rounded-circle pr-2" style="height: 6%; width:6%"></span>
                                <span class="font-weight-bold">
                                    <a href="/profile/{{$post->user->id}}">
                                        <span class="text-dark">{{$post->user->username }}</span>
                                    </a>
                                </span> {{ $post->caption }}
                            </p>
                            <a href="/p/{{$post->id}}">View all comments</a> 
                        </div>    
                                                 
                            {{$post->created_at->diffForHumans()}}
                                            
                    </div>  
                </div>
            </div>
            <comment-index post-id="{{$post->id}}"></comment-index>
        </div>
    @endforeach

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
</div>
@endsection



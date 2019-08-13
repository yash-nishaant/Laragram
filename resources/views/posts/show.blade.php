@extends('layouts.app')

@section('content')
<div class="card" style="position: relative; width:80%; height:80%; margin: auto; padding-right: 5px; padding-left: 2px; border: 1px transparent black">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center pt-2">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width: 40px;">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                        </div>
                        @can('update', $post->user->profile)
                        <div>
                            <a href="{{route('post.edit', $post->id)}}" class="pt-2"><small>Edit</small></a>
                            <a href="{{route('post.delete', $post->id)}}" class="pl-2"><small>Delete</small></a>
                        </div>
                        @endcan
                    </div>
                </div>

                <hr>
                
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </span> {{ $post->caption }}
                </p>
                <div>

                </div>
                <div class="pb-2">                  
                    <like-button post-id = "{{$post->id}}" like-count = "{{$post->likes->count()}}" has-liked = "{{$post->user->hasLiked($post)}}"></like-button>
                </div>
                <comment-element post-id="{{$post->id}}"></comment-element>
            </div>
        </div>
    </div>
</div>
@endsection

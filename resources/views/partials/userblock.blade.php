<div class="media pb-4">
    <a href="/profile/{{ $user->id }}" class="pull-left">
        <img src="{{$user->profile->profileImage()}}" class="w-100 rounded-circle" style="max-width: 100px;" alt="" class="media-object">
    </a>
    <div class="media-body pl-4">
        <div class="media-heading"><a href="/profile/{{ $user->id }}" style="font-weight: bold; color: black;">{{$user->username}}</a></div>
        <div class="text-small">{{$user->name}}</div>       
    </div>
</div>

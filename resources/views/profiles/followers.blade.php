@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="pb-2" style="font-weight: bold;">Your Followers</h3>
    @if (!$followers->count())
        <p>You have no followers</p>
    @else 
        <div class="row">
            <div class="col-lg-12">
                @foreach ($followers as $user)
                    @include('partials.userblock')
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
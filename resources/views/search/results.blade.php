@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="pb-2" style="font-weight: bold;">Results for "{{ Request::input('query')}}"</h3>

    @if (!$users->count())
        <p>No results found</p>
    @else 
        <div class="row">
            <div class="col-lg-12">
                @foreach ($users as $user)
                    @include('partials.userblock')
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection

<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\FollowedByUser;
use Illuminate\Support\Carbon;

class FollowsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(User $user)
    {
        $following = auth()->user()->following()->toggle($user->profile);
        $user->notify(new FollowedByUser(Auth::user()));
        return $following;
    }

    public function getFollowers(User $user)
    {
        $followers = $user->profile->followers()->get();
        return view('profiles.followers', compact('followers'));
    }

    public function getFollowing(User $user)
    {
        $followingprofiles = $user->following()->get();
        return view('profiles.following', compact('followingprofiles', 'user'));
    }


}

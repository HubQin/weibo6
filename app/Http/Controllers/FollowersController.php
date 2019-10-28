<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class FollowersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // 关注
    public function follow(User $user)
    {
        $this->authorize('follow', $user);
        if (!Auth::user()->isFollowing($user->id)) {
            Auth::user()->follow($user->id);
        }

        return redirect()->route('users.show', $user->id);
    }

    // 取消关注
    public function unfollow(User $user)
    {
        $this->authorize('follow', $user);
        if (Auth::user()->isFollowing($user->id)) {
            Auth::user()->unfollow($user->id);
        }

        return redirect()->route('users.show', $user->id);
    }
}

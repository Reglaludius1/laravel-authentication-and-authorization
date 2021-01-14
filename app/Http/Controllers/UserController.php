<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function posts(Request $request, User $user) {
        $this->authorize('see-owned-posts', $user);

        $posts = Post::all()->where('user_id', $user->id);

        return view('components.posts', ['posts' => $posts, 'user' => $user]);
    }
}

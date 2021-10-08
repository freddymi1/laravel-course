<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(User $user){
        $posts = $user->posts()->with(['user', 'likes'])->paginate(20);
        return view('users.posts.index',[
            'user'=>$user,
            'posts'=>$posts
        ]);
    }
}
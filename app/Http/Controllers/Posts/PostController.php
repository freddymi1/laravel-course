<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }
    public function index(){
        // $posts = Post::orderBy('created_at','desc')->with(['user', 'likes'])->paginate(5);
        $posts = Post::latest()->with(['user', 'likes'])->paginate(5);
        return view('posts.index', [
            'posts'=>$posts
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'body'=>'required'
        ]);

        // Post::creat([
        //     'user_id'=>auth()->id,
        //     'body'=>$request->body
        // ]);
        //OU
        // $request->user()->posts()->create([
        //     'body'=>$request->body
        // ]);
        //OU
        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    public function showPost(Post $post){
        return view('posts.show', [
            'item'=>$post
        ]);
    }

    public function destroy(Post $post){
        // if(!$post->ownedBy(auth()->user())){
        //     dd('no');
        // }
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
}
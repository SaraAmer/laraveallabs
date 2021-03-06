<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::all();
        $allPosts=Post::paginate(15);
        return view('index', ['posts'=> $allPosts]);
    }
    public function create()
    {
        return view('create', ['users' => User::all()]);
    }
    public function edit($postID)
    {
        $post = Post::find($postID);
     
        return view('edit', [
            'post' => $post
            ,
            'users' => User::all()
            ]);
    }
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('show', [
            'post' => $post,
        ]);
    }
    public function store(StorePostRequest  $request)
    {
        $post = new Post;
        
        $file = $request->file('myImg')->storeAs(
            'avatars',
            time().$request->file('myImg')->getClientOriginalName()
        );
        
       
      
        $name=time().$request->file('myImg')->getClientOriginalName();
        
        $post->title = $request->title;
        $post->description=$request->description;
        $post->user_id=$request->user_id;
        $post->myImg=$name;
        $post->save();
        return redirect()->route('posts.index');
        // Post::create($requestData);
        // return redirect()->route('posts.index');
    }
    public function update(UpdatePostRequest $request, $postID)
    {
        $post = Post::find($postID);
        $post->title = $request->title;
        $post->description=$request->description;
        $post->user_id=$request->user_id;
        $post->save();
        return redirect()->route('posts.index');
    }
    public function destroy($postID)
    {
      
        // $post = Post::find($postID);
     
        Post::where('id', $postID)->delete();
        return redirect()->route('posts.index');
    }
}

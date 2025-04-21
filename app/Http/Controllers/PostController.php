<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        
        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('post.index');
    }

    public function edit($id){
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function show($id) {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::find($id);
        $post->update($request->all());

        return redirect()->route('post.index');
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.index');
    }
}

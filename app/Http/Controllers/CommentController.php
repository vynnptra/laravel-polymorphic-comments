<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function createPostComment($id){
        $post = Post::find($id);    
        return view('posts.create-comment', compact('post'));
    }

    public function storePostComment(Request $request, $id){
        $post = Post::find($id);
        $post->comments()->create([
            'body' => $request->body,
        ]);
        return redirect()->route('post.show', $id);
    }

    public function createVideoComment($id){
        $video = Video::find($id);
        return view('video.create-comment', ['id' => $video->id]);
    }

    public function storeVideoComment(Request $request, $id){
        $video = Video::find($id);
        $video->comments()->create([
            'body' => $request->body,
        ]);
        return redirect()->route('video.show', $id);
    }
    
    public function deleteComment($id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }
}

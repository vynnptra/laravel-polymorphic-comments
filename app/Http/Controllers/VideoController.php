<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{public function index()
    {
        $videos = Video::all();
    
        foreach ($videos as $video) {
            $videoUrl = $video->url;
            $videoId = null;
            $host = parse_url($videoUrl, PHP_URL_HOST);
    
            if (str_contains($host, 'youtu.be')) {
                $videoId = ltrim(parse_url($videoUrl, PHP_URL_PATH), '/');
            } elseif (str_contains($host, 'youtube.com')) {
                parse_str(parse_url($videoUrl, PHP_URL_QUERY), $query);
                $videoId = $query['v'] ?? null;
            }

            if ($videoId) {
                $video->thumbnail = 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg';
            } else {
                $video->thumbnail = null; 
            }
        }
    
        return view('video.index', compact('videos'));
    }
    

    public function create(){
        return view('video.create');
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        Video::create($request->all());

        return redirect()->route('video.index');
    }

    public function edit($id){
        $video = Video::find($id);
        return view('video.edit', compact('video'));
    }

    public function show($id){
        $video = Video::find($id);
        $videoUrl = $video->url;
        $videoId = null;
        $host = parse_url($videoUrl, PHP_URL_HOST);

        if (str_contains($host, 'youtu.be')) {
            // Format pendek
            $videoId = ltrim(parse_url($videoUrl, PHP_URL_PATH), '/');
        } elseif (str_contains($host, 'youtube.com')) {
            // Format panjang
            parse_str(parse_url($videoUrl, PHP_URL_QUERY), $query);
            $videoId = $query['v'] ?? null;
        }

        if ($videoId) {
            $video->embed_url = 'https://www.youtube.com/embed/' . $videoId;
        } else {
            $video->embed_url = null;
        }

        return view('video.show', compact('video'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        $video = Video::find($id);
        $video->update($request->all());

        return redirect()->route('video.index');
    }

    public function destroy($id){
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('video.index');
    }
}

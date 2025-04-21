
@extends('layouts.app')


@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-4xl font-bold text-gray-900">Latest Blog Videos</h1>
    <a href="{{ route('video.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700 transition flex items-center space-x-2">
      <i class="fas fa-plus"></i>
      <span>Create</span>
    </a>
  </div>
    <!-- Posts container -->
    <div class="max-w-7xl mx-auto grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
      <!-- Example post card -->
      @if (!$videos->isEmpty())
          
      @foreach ($videos as $video) 
      <article
        class="fade-in-up bg-white rounded-lg shadow-md p-6 flex flex-col justify-between hover:shadow-xl transform hover:scale-[1.02] transition duration-300"
      >
        <div>
          <img src="{{ $video->thumbnail }}" alt="Thumbnail {{ $video->title }}" class="w-full h-auto mb-4 rounded-md shadow">
          <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ Str::limit($video->title, 19) }}</h2>
        </div>
        <footer class="flex flex-col sm:flex-row sm:items-center sm:justify-between text-sm text-gray-500 mb-4">
          <span>{{ $video->created_at->diffForHumans()  }}</span>
        </footer>
        <div class="flex space-x-3">
          <a
            class="flex-1 bg-transparent text-gray-700 border border-gray-700 hover:border-blue-700 rounded-md py-2 text-center font-medium hover:bg-blue-700 hover:text-white transition transform hover:scale-105"
            href="{{ route('video.show', $video->id) }}"
          >
            More
        </a>
          <a
            class="flex-1 bg-transparent text-gray-700 border border-gray-700 rounded-md hover:border-green-700 py-2 text-center font-medium hover:bg-green-700 hover:text-white transition transform hover:scale-105"
            href="{{ route('video.edit', $video->id) }}"
          >
            Edit
          </a>
          <form action="{{ route('video.destroy', $video->id) }}" method="post"  >
            @csrf
            @method("DELETE")
            <button
            type="submit"
              class="flex-1 bg-transparent text-gray-700 border border-gray-700 rounded-md py-2 text-center hover:border-red-700 font-medium hover:bg-red-700 hover:text-white transition transform hover:scale-105 px-6"
              
            >
              Delete
          </button>
          </form>
        </div>
    </article>
    @endforeach
    @else
    <div class=" mx-auto bg-white rounded-lg shadow-md w-[75rem] text-center">
      <p class="text-gray-700 text-lg font-medium">No videos yet</p>
    </div>      
    @endif
  </div>
@endsection
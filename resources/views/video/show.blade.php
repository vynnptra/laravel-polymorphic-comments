@extends('layouts.app')

@section('content')
<main class="flex-1 p-6 overflow-auto max-w-4xl mx-auto w-full">
    <a
      href="{{ route('video.index') }}"
      class="mb-6 bg-blue-600 text-white rounded-md px-4 py-2  font-semibold hover:bg-blue-700 transition"
    >
      &larr; Back
    </a>

    <article class="bg-white rounded-lg shadow-md p-6 mb-8 mt-8">
      <h1 class="text-3xl font-bold mb-4 text-gray-900">{{ $video->title }}</h1>
        <iframe 
        class="w-full h-[26rem] rounded shadow"
        src="{{ $video->embed_url }}" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen>
    </iframe>
    </article>

    <!-- Comments section -->
    <section class="bg-white rounded-lg shadow-md p-6">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold text-gray-900">Comments</h2>
        <a
          class="bg-blue-600 text-white rounded-md px-4 py-2 font-semibold hover:bg-blue-700 transition"
          href="{{ route('video.comment.create', $video->id) }}"
        >
          Create Comment
        </a>
      </div>

      @if ($video->comments->isEmpty())
    <div class="bg-gray-100 rounded-md p-4 mb-4">
        <p class="text-gray-800">No Comments Yet</p>
    </div>
    @else
        @foreach ($video->comments as $comment)
        <div class="bg-white border rounded-md p-4 mb-2 shadow-sm relative group ">
          <div class="absolute top-3 right-3 flex space-x-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <button aria-label="Edit" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">
              <i class="fas fa-pen"></i>
            </button>
            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button aria-label="Delete" class="text-gray-600 hover:text-red-600 transition-colors duration-200" type="submit">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </div>
          <p class="text-gray-800">{{ $comment->body }}</p>
          <p class="text-gray-500 text-sm mt-2">{{ $comment->created_at->diffForHumans() }}</p>
        </div>
        
{{--         
            <div class="bg-white border rounded-md p-4 mb-2 shadow-sm">
                <p class="text-gray-800">{{ $comment->body }}</p>
                <p class="text-gray-500 text-sm mt-2">{{ $comment->created_at->diffForHumans() }}</p>
            </div> --}}
        @endforeach
    @endif
    </section>
  </main>
@endsection
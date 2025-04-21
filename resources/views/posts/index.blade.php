
@extends('layouts.app')


@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-4xl font-bold text-gray-900">Latest Blog Posts</h1>
    <a href="{{ route('post.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700 transition flex items-center space-x-2">
      <i class="fas fa-plus"></i>
      <span>Create</span>
    </a>
  </div>
    <!-- Posts container -->
    <div class="max-w-7xl mx-auto grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
      <!-- Example post card -->
      @if (!$posts->isEmpty())
          
      @foreach ($posts as $post) 
      <article
        class="fade-in-up bg-white rounded-lg shadow-md p-6 flex flex-col justify-between hover:shadow-xl transform hover:scale-[1.02] transition duration-300"
      >
        <div>
          <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ Str::limit($post->title, 39) }}</h2>
          <p class="text-gray-700 mb-4">
           {{ Str::limit($post->content, 70)}}
          </p>
        </div>
        <footer class="flex flex-col sm:flex-row sm:items-center sm:justify-between text-sm text-gray-500 mb-4">
          <span>{{ $post->created_at->diffForHumans()  }}</span>
        </footer>
        <div class="flex space-x-3">
          <a
            class="flex-1 bg-transparent text-gray-700 border border-gray-700 hover:border-blue-700 rounded-md py-2 text-center font-medium hover:bg-blue-700 hover:text-white transition transform hover:scale-105"
            href="{{ route('post.show', $post->id) }}"
          >
            More
        </a>
          <a
            class="flex-1 bg-transparent text-gray-700 border border-gray-700 rounded-md hover:border-green-700 py-2 text-center font-medium hover:bg-green-700 hover:text-white transition transform hover:scale-105"
            href="{{ route('post.edit', $post->id) }}"
          >
            Edit
          </a>
          <form action="{{ route('post.destroy', $post->id) }}" method="post"  >
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
      <p class="text-gray-700 text-lg font-medium">No posts yet</p>
    </div>      
    @endif
  </div>
@endsection
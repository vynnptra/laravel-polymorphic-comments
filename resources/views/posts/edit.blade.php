@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-8 w-full ml-4">
    <h1 class="text-2xl font-semibold mb-6 text-gray-900">Update {{ $post->title }}</h1>
    <form class="space-y-6" action="{{ route('post.update', $post->id) }}" method="post">
        @csrf
        @method('PUT')
      <div>
        <label for="title" class="block text-gray-700 font-medium mb-2">Post Title</label>
        <input
          type="text"
          id="title"
          name="title"
          placeholder="Enter post title"
          class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          required
          value="{{ $post->title }}"
        />
      </div>
      <div>
        <label for="excerpt" class="block text-gray-700 font-medium mb-2">Content</label>
        <textarea
          id="excerpt"
          name="content"
          
          placeholder="Enter a short excerpt"
          class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 "
          required
        > {{ $post->content }} </textarea>
      </div>
      <div class="flex justify-end gap-3">
        <a
        href="{{ route('post.index') }}"
          class="bg-gray-600 text-white rounded-md px-6 py-3 font-semibold hover:bg-gray-700 transition"
        >
          Cancel
      </a>
        <button
          type="submit"
          class="bg-blue-600 text-white rounded-md px-6 py-3 font-semibold hover:bg-blue-700 transition"
        >
          Submit
        </button>
      </div>
    </form>
  </div>
@endsection
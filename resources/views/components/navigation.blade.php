<header class="h-16 bg-white shadow-sm flex-shrink-0"></header>

<div class="flex flex-1 min-h-0">
    \
    <!-- Sidebar --> 
    <aside class="w-64 top-0 pt-24 bg-white shadow-sm flex-shrink-0 flex flex-col items-center py-6 space-y-6 fixed h-full">
      <a href="{{ route('post.index') }}"
          class="px-24 text-center text-gray-700 py-3 rounded-md transition cursor-pointer  font-extrabold
                {{ Route::is('post.*') ? 'bg-blue-600  text-white' : 'hover:bg-blue-500' }}">
          Posts
      </a>

      <a href="{{ route('video.index') }}"
      class="px-24 text-center text-gray-700 py-3 rounded-md transition cursor-pointer  font-extrabold
      {{ Route::is('video.*') ? 'bg-blue-600  text-white' : 'hover:bg-blue-200 hover:text-black' }}">
          Video
      </a>
      </aside>
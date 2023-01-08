<div class="py-2 border-b w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
  <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
    <div class="p-4 flex flex-row items-center justify-between">
      <a href="{{url('/')}}" class="italic text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Shola blog</a>
      <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
          <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
          <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
    <nav :class="{'flex': open, 'hidden': !open}" class="bg-black md:bg-white flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
        @foreach ($categories as $category)
        <a class="{{\Request::is('posts/'.$category->slug) ? 'text-blue-600' : 'md:text-gray-900 text-white'}} px-4 py-2 mt-2 text-lg font-semibold text-white " href="{{route('category.posts', $category->slug)}}">{{$category->name}}</a>
        @endforeach
        @if (!Auth()->check())
        <a class="px-4 py-2 mt-2 text-lg font-semibold " href="{{url('login')}}">
           <button class="text-white md:text-gray-900 px-2 rounded border p-1 border-blue-600 -mt-2 font-semibold">Sign In</button>
        </a>
        <a class="px-4 py-2 mt-2 text-lg font-semibold " href="{{url('register')}}">
           <button class="text-white md:text-gray-900 px-2 rounded border p-1 border-blue-600 -mt-2 font-semibold">Sign Up</button>
        </a>
        @else
        <a class="px-4 py-2 mt-2 text-lg font-semibold " href="{{url('profile/dashboard')}}">
           <button class="md:bg-black px-2 rounded border p-1 text-white -mt-2 font-semibold">Dashboard</button>
        </a>
        @endif    
    </nav>
  </div>
</div> 
<nav class="bg-red-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a class="flex-shrink-0" href="{{ action('ArticlesController@index') }}"><img
                        src="https://statics.gryen.com/gryen_logo_20210201.png" alt="{{ env('APP_NAME') }}"
                        class="h-8 w-8"></a>

                <div class="hidden md:block">
                    <ul class="ml-10 flex items-baseline space-x-4">
                        <li
                            class="text-gray-100 hover:bg-red-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            <a class="" href="{{ action('ArticlesController@index') }}">笔记</a>
                        </li>
                        @if (Auth::check())
                        <li
                            class="text-gray-100 hover:bg-red-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            <a class="" href="{{url('/dashboard')}}">仪表盘</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <button
                    class="bg-red-500 inline-flex items-center justify-center p-2 rounded-md text-red-300 hover:text-white hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-800 focus:ring-white">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="hidden md:hidden">
        <ul class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <li class="text-gray-100 px-3 py-2 rounded-md text-sm font-medium">
                <a href="{{ action('ArticlesController@index') }}">笔记</a>
            </li>
            @if (Auth::check())
            <li class="text-gray-100 px-3 py-2 rounded-md text-sm font-medium"><a href="{{url('/dashboard')}}">仪表盘</a>
            </li>
            <li class="text-gray-100 px-3 py-2 rounded-md text-sm font-medium"><a
                    href="{{url('/articles/create')}}">添加文章</a></li>
            @endif
        </ul>
    </div>
</nav>

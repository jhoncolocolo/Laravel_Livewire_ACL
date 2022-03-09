<nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <div style="-webkit-transform: rotate(-45deg); -moz-transform: rotate(-45deg); -ms-transform: rotate(-45deg); -o-transform: rotate(-45deg); transform: rotate(-45deg); -webkit-transform-origin: 30% 60%; -moz-transform-origin: 30% 60%; -ms-transform-origin: 30% 60%; -o-transform-origin: 30% 60%; transform-origin: 30% 60%; font-size: 20px; width: 70px; position: relative; top: 0px;font-family: cursive;">JECL</div>
        <span class="font-semibold text-xl tracking-tight">{{$title}}</span>
    </div>
    <div class="block lg:hidden">
        <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
          <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
       </button>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        @include("layouts.nav.items")
        <div>
            @if(Route::has('login'))
                @guest
                <a href="{{ route('login') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">Login</a>
                    @if(Route::has('register'))
                <a href="{{ route('register') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">Register</a>
                @endif
            @else
                <div class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">{{Auth::user()->name}}  
                </div>  
                <button class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0" onclick="document.getElementById('logoutform').submit();">Logout</button>
                <form action="{{ route('signout') }}" method="post" id="logoutform">@csrf</form>
                    @endguest
            @endif
        </div>
    </div>
</nav>
<nav class="w3-bar w3-green">
    @auth   
        <a href="{{ route('home.index') }}" class="w3-bar-item w3-button">Home</a>
        <a href="/users"  class="w3-bar-item w3-button">Users    
        </a>   
        <a href="/permissions" class="w3-bar-item w3-button">Permissions    
        </a>   
        <a href="/roles" class="w3-bar-item w3-button">Roles    
        </a>   
        <a href="/role_users" class="w3-bar-item w3-button">Role users    
        </a>   
        <a href="/permission_roles" class="w3-bar-item w3-button">Permission roles    
        </a>   
        <a href="/permission_users" class="w3-bar-item w3-button">Permission users    
        </a>   
        <a href="/languages" class="w3-bar-item w3-button">Languages    
        </a>  
    @endauth
    @if(Route::has('login'))
    <section class="w3-bar-item w3-bar w3-right" style="padding: 0 0 !important;">
            @guest
        <a href="{{ route('login') }}" class="w3-bar-item w3-button">Login</a>
            @if(Route::has('register'))
        <a href="{{ route('register') }}" class="w3-bar-item w3-button">Register</a>
            @endif

            @else
        <a href="#" class="w3-bar-item w3-button">{{Auth::user()->name}}</a>
        <button href="{{ route('register') }}" class="w3-bar-item w3-button w3-orange" onclick="$( '#logoutform' ).submit();">Logout</button>
        <form action="{{ route('signout') }}" method="post" id="logoutform">@csrf</form>
            @endguest
    </section>
    @endif
</nav>

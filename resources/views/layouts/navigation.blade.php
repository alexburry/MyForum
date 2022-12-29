<nav>
<div class="nav-bar">
    <div>
        <div>
            <a href="{{ route('dashboard') }}"" :active="request()->routeIs('dashboard')">Dashboard</a>
        </div>
        <div>
            <a href="{{ route('subforums.index') }}" :active="request()->routeIs('subforums.index')">Subforums</a>
        </div>
    </div>

    <div>
        <div>
            @if (Route::has('login'))
                <div>
                    @auth
                    <div>
                        <a href="{{ route('profile.edit') }}">Profile</a>
                    </div>
                    <div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href={{ route('logout') }} " onclick="event.preventDefault();
                                this.closest('form').submit();">Log Out</a>
                        </form>
                    </div>
                </div>
            @else
                <div>
                <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</div>
</nav>

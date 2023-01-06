<nav class="flex items-center justify-between flex-wrap bg-slate-500 p-6 sm:rounded-lg">
    <div>
        <li class="block mt-4 lg:inline-block lg:mt-0 text-blue-200 hover:text-white mr-4">
            <a href="{{ route('dashboard') }}"" :active="request()->routeIs('dashboard')">Dashboard</a>
        </li>
        <li class="block mt-4 lg:inline-block lg:mt-0 text-blue-200 hover:text-white mr-4">
            <a href="{{ route('subforums.index') }}" :active="request()->routeIs('subforums.index')">Subforums</a>
        </li>
    </div>

    <div>
        <div>
            @if (Route::has('login'))
                <div>
                    @auth
                    <div class="block mt-4 lg:inline-block lg:mt-0 text-blue-200 hover:text-white mr-4">
                        <a href="{{ route('profile.edit') }}">Profile</a>
                    </div>
                    <div class="block mt-4 lg:inline-block lg:mt-0 text-blue-200 hover:text-white mr-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href={{ route('logout') }} " onclick="event.preventDefault();
                                this.closest('form').submit();">Log Out</a>
                        </form>
                    </div>
                </div>
            @else
                <div class="block mt-4 lg:inline-block lg:mt-0 text-blue-200 hover:text-white mr-4">                   
                    <a href="{{ route('login') }}">Log in</a>
                </div>

                <div class="block mt-4 lg:inline-block lg:mt-0 text-blue-200 hover:text-white mr-4">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
                @endauth
                </div>
            @endif
        </div>
    </div>
</nav>

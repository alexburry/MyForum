<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" >
    </head> 
<body>
    <header>
        <div class = "nav">
            @include('layouts.navigation')
        </div>
    </header>
    
    <main>
        @if ($errors->any())
            <div>
                Errors:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif  
        <div>
            @yield('content')
        </div>
    </main>
</body>
</html>

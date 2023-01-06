<!DOCTYPE html>
<html lang = "{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" > --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title')</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}

        {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
        {{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
        <script src="https://cdn.tailwindcss.com"></script>

    </head> 
<body class="bg-sky-200">
    <header>
        <div class = "nav">
            @include('layouts.navigation')
        </div>
    </header>
    
    <main>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
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
        </div>
    </main>
</body>
</html>

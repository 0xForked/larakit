<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.partials.head')
    </head>
    <body>
        <div id="app">
            @if (Request::segment(1) == '/' || Request::segment(1) == 'dashboard')
                @include('layouts.partials.navbar')
            @endif

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>

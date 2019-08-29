<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.partials.head')
    </head>
    <body>
        <div id="app">
            <flash-message message="{{ session('flash') }}"></flash-message>
            @if (Request::segment(1) == '/')
                @include('layouts.partials.navbar')
                <main class="py-4">
                    @yield('content')
                </main>
            @elseif (Request::segment(1) == 'dashboard')
                <div class="mobile-ver">
                    @include('layouts.partials.navbar')
                </div>
                <div class="web-ver">
                    @include('layouts.partials.sidebar')
                </div>
                @yield('content')
            @else
                <div class="mt-5">
                    @yield('content')
                </div>
            @endif
        </div>
    </body>
</html>

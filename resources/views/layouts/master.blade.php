<html>
    <head>
        <title>InWeCryptto - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
        @include("layouts.{$lang}.footer")
    </body>
</html>

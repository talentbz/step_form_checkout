<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        
        @include('front.layouts.header')
    </head>
    
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            @include('front.layouts.menu')
            @yield('content')
        </main>
        <!-- Footer-->
        @include('front.layouts.footer')
    </body>
</html>

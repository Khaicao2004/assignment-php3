<!DOCTYPE html>
<html lang="en">

<head>
    <title>SkyNews</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="/client/images/logo2.png">
    @include('client.layouts.partials.css')

</head>

<body>
    <div class="site-wrap">
        <header class="site-navbar" role="banner">
           @include('client.layouts.partials.header-top')

           @include('client.layouts.partials.header-nav1')
           @include('client.layouts.partials.header-nav2')
           
        </header>
        @yield('content')

        <footer class="site-footer border-top">
            @include('client.layouts.partials.footer')
        </footer>
    </div>

    @include('client.layouts.partials.js')
</body>

</html>

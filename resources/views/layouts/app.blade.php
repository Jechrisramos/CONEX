<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
        <title>@yield('page-title') | {{ config('app.name') }}</title>

        @livewireStyles
    </head>
    <body class="antialiased">
        <!-- Page Heading -->
            @include('partials.header')

        <!-- Page Content -->
        <div class="container-fluid">
            <div class="row">
                <!-- SIDEBAR -->
                @include('partials.sidebar')
                

                <!-- CONTENT -->
                <div class="col-sm-4 col-md-8 col-lg-11">
                    @yield('content')
                </div><!--endofcol-->

            </div><!--endofrow-->
        </div><!-- endofcontainer -->

        <!-- Page Footer -->
        @include('partials.footer')
        @livewireScripts
        <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    </body>
</html> 

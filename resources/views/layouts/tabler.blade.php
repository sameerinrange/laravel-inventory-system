
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{ config('app.name') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    <!-- CSS files -->
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>

    <!-- Custom CSS for specific page.  -->
    @stack('page-styles')
    @livewireStyles
</head>
@php
    $theme = session('theme', 'light'); // Default is light
    $layout = session('layout', 'upper'); // Default is upper navigation
@endphp

<body class="{{ $theme }}">


    <!-- Theme Switcher -->
    <!-- <button onclick="setTheme('light')">Light Mode</button>
<button onclick="setTheme('dark')">Dark Mode</button> -->

<!-- Layout Switcher -->
<!-- <button onclick="setLayout('upper')">Upper Navigation</button>
<button onclick="setLayout('left')">Left Panel</button> -->

<script>
    function setTheme(theme) {
        fetch("{{ route('set.theme') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ theme: theme })
        }).then(() => location.reload());
    }

    function setLayout(layout) {
        fetch("{{ route('set.layout') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ layout: layout })
        }).then(() => location.reload());
    }
</script>

        <div class="page">

            @include('layouts.body.header')

           

            <div class="page-wrapper">

            @if ($layout == 'upper')
                @include('layouts.body.navbar')
            @else
                @include('layouts.body.navbar')
            @endif

            
                 
                <div class="page-wraper-inner">
                    @yield('content')

                    @include('layouts.body.footer')
                </div>

                
            </div>
        </div>

        <!-- Tabler Core -->
        <script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>
        {{--- Page Scripts ---}}
        @stack('page-libraries')
        @stack('page-scripts')
        
        @livewireScripts
    </body>
</html>

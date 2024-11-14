<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- CSS template files -->
    <link href="/student/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="/student/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="/student/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="/student/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="/student/css/demo.min.css?1684106062" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    {{ $style ?? '' }}
</head>

<body class="font-sans antialiased">
    <script src="/student/js/demo-theme.min.js?1684106062"></script>
    <div class="page">
        <x-student.navigation.navbar/>
        <div class="page-wrapper">
            {{ $header ?? '' }}
            <div class="page-body">
                <div class="container-xl">
                    <div class="card">
                        <div class="card-body">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
            <x-student.navigation.footer/>
        </div>
    </div>
    <script src="/student/js/tabler.min.js?1684106062" defer></script>
    <script src="/student/js/demo.min.js?1684106062" defer></script>
    {{ $script ?? '' }}
</body>

</html>

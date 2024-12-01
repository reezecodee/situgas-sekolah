<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    <!-- CSS files -->
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
</head>

<body class=" d-flex flex-column">
    <script src="/student/js/demo-theme.min.js?1684106062"></script>
    <div class="page page-center">
        <div class="container container-normal py-4">
            {{ $slot }}
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="/student/js/tabler.min.js?1684106062" defer></script>
    <script src="/student/js/demo.min.js?1684106062" defer></script>
</body>

</html>

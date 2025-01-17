<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="rating" content="general">
    <meta name="robots" content="@yield('robots')">
    <meta property="og:locale" content="en_US">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:image" content="@yield('image')">
    <meta property="og:type" content="website">
    <meta name="description" property="og:description" content="@yield('description')">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="@yield('image')">
    <meta name="twitter:url" content="{{ request()->url() }}">
    <meta name="token" content="{{ csrf_token() }}">
    <meta itemprop="name" content="@yield('title')">
    <meta itemprop="description" content="@yield('description')">
    <meta itemprop="image" content="@yield('image')">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ getLogo('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ getLogo('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ getLogo('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('i/icons/site.webmanifest') }}">
    <link rel="shortcut icon" href="{{ getLogo('favicon-32x32.png') }}">
    <meta name="msapplication-TileColor" content="#336699">
    <meta name="msapplication-config" content="{{ asset('i/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#336699">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('themes/editorial/css/main.css') }}" />
    @hasSection('canonical')<link rel="canonical" href="@yield('canonical')">@endif
    <script src="{{ asset(mix('dist/js/app.js')) }}"></script>
    @if (env('APP_ENV') !== 'local' && config('settings.analytics_id') !== null)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('settings.analytics_id') }}"></script>
        <script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', '{{ config('settings.analytics_id') }}', {'anonymize_ip': true});</script>
    @endif
</head>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
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
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('i/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('i/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('i/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('i/icons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('i/icons/safari-pinned-tab.svg') }}" color="#336699">
    <link rel="shortcut icon" href="{{ asset('i/icons/favicon.ico') }}">
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
<body class="is-preload">

		<!-- Wrapper -->
        <div id="wrapper">

            <!-- Main -->
            <div id="main">
                <div class="inner">

                    <!-- Header -->
                        <header id="header">
                            <a href="{{ url('') }}" class="logo"><strong>@yield('title')</strong></a>
                            @php
                                $socials = getConfig('socials', true);
                            @endphp
                            <ul class="icons">
                                @if($socials->twitter_url)
                                <li><a href="{{ $socials->twitter_url }}" target="_blank" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                                @endif
                                @if($socials->facebook_url)
                                <li><a href="{{ $socials->facebook_url }}" target="_blank" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                                @endif
                                @if($socials->instagram_url)
                                <li><a href="{{ $socials->instagram_url }}" target="_blank" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                                @endif
                            </ul>
                        </header>

                    @yield('content')

                </div>
            </div>

            <!-- Sidebar -->
            <div id="sidebar">
                <div class="inner">

                    <!-- Search -->
                        <section id="search" class="alt">
                            <form method="GET" action="{{ route('articles') }}">
                                <input type="text" name="query" id="query" placeholder="Search" />
                            </form>
                        </section>

                    <!-- Menu -->
                        <nav id="menu">
                            <header class="major">
                                <h2>Menu</h2>
                            </header>
                            <ul>
                                @foreach (getMenu() as $p)
                                @if ($p->children->count() > 0)
                                <li>
                                    <span class="opener">{{ $p->title }}</span>
                                    <ul>    
                                        @foreach ($p->children as $child)
                                        <li><a href="{{ $child->link }}">{{ $child->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @else
                                <li><a href="{{ $p->link }}">{{ $p->title }}</a></li>
                                @endif
                                @endforeach
                                <li>
                                    <span class="opener">Category</span>
                                    <ul>    
                                        @foreach (getCategories() as $category)
                                        <li><a href="{{ $category->link }}">{{ $category->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @auth
                                <li>
                                <form method="POST" action="{{ route('auth.logout') }}">
                                @csrf
                                    <a href="#" onclick="$(this).closest('form').submit()">{{ __('auth.logout') }}</a>
                                </form>
                                </li>
                                @else
                                <li><a href="{{ route('auth.login') }}">Login</a></li>
                                @endauth
                            </ul>
                        </nav>

                    <!-- Section -->
                        <section>
                            <header class="major">
                                <h2>Get in touch</h2>
                            </header>
                            @php 
                            $footer = getConfig('footer', true);
                            @endphp
                            <p>{{ $footer->desc }}</p>
                            <ul class="contact">
                                <li class="icon solid fa-envelope"><a href="#">{{ $footer->email }}</a></li>
                                <li class="icon solid fa-phone">{{ $footer->phone }}</li>
                                <li class="icon solid fa-home">{{ $footer->address }}</li>
                            </ul>
                        </section>

                    <!-- Footer -->
                        <footer id="footer">
                            <p class="copyright">&copy; {{ config('app.name') }}. All rights reserved.</p>
                        </footer>

                </div>
            </div>

        </div>

		<!-- Scripts -->
        <script src="{{ asset('themes/editorial/js/jquery.min.js') }}"></script>
        <script src="{{ asset('themes/editorial/js/browser.min.js') }}"></script>
        <script src="{{ asset('themes/editorial/js/breakpoints.min.js') }}"></script>
        <script src="{{ asset('themes/editorial/js/util.js') }}"></script>
        <script src="{{ asset('themes/editorial/js/main.js') }}"></script>
@hasSection('scripts')@yield('scripts')@endif
</body>
</html>

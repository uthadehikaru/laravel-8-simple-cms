<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
@include('partials.app.head')
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
                                <input type="text" name="query" id="query" placeholder="@lang('app.search')" />
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
                                    <span class="opener">@lang('app.category')</span>
                                    <ul>    
                                        @foreach (getCategories() as $category)
                                        <li><a href="{{ $category->link }}">{{ $category->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @auth
                                <li><a href="{{ route('admin.dashboard.index') }}">@lang('admin.root')</a></li>
                                @else
                                <li><a href="{{ route('auth.login') }}">Login</a></li>
                                @endauth
                            </ul>
                        </nav>

                    <!-- Section -->
                        <section>
                            <header class="major">
                                <h2>@lang('app.get_in_touch')</h2>
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

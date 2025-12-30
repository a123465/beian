<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', '深圳市波斯圈信息技术服务有限公司')</title>

    @php
        $accent = config('portal.accent', '#0B5FD6');
        $accent2 = config('portal.accent2', '#00C2A8');
        $font = config('portal.font', 'Inter');
    @endphp

    <style>
        :root{
            --accent: {{ $accent }};
            --accent-2: {{ $accent2 }};
        }
    </style>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css'])
    @else
        {{-- 引入 Google 字体（开发时的回退） --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family={{ urlencode($font) }}:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif

    <style>
        /* fallback for inline styles if app.css not built */
    </style>
</head>
<body>
    <div class="site">
        <header class="site-header">
            <div class="container header-inner">
                <a class="brand" href="{{ route('home') }}">{{ config('portal.brand', config('portal.company_name')) }}</a>

                <button class="nav-toggle" aria-expanded="false" aria-label="菜单切换">☰</button>

                <nav class="site-nav" id="site-nav">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">首页</a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">关于我们</a>
                    <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}">服务</a>
                    <a href="{{ route('contact') }}" class="nav-link cta {{ request()->routeIs('contact') ? 'active' : '' }}">联系我们</a>
                </nav>
            </div>
        </header>

        <main class="container main-content">
            @yield('content')
        </main>

        <footer class="site-footer">
                <div class="container footer-inner">
                <div>© {{ date('Y') }} {{ config('portal.company_name') }} @if(config('portal.icp')) · {{ config('portal.icp') }} @endif</div>
                <div>邮箱: {{ config('portal.contact.email_sales') }} · 电话: {{ config('portal.contact.phone') }}</div>
            </div>
        </footer>
    </div>

    <script>
        (function(){
            var btn = document.querySelector('.nav-toggle');
            var nav = document.getElementById('site-nav');
            if(!btn || !nav) return;
            btn.addEventListener('click', function(){
                var open = nav.classList.toggle('open');
                btn.setAttribute('aria-expanded', open ? 'true' : 'false');
            });
        })();
    </script>
</body>
</html>

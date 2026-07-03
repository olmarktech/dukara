<!DOCTYPE html>
<html lang="{{ \App\Facades\GlobalLanguage::user_lang_slug() }}" dir="{{ \App\Facades\GlobalLanguage::user_lang_dir() }}">
<head>
    {!! renderHeadStartHooks() !!}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- SEO and Title --}}
    @if(isset($page_post) && $page_post->id == get_static_option('home_page'))
        <title>{{get_static_option('site_title')}}@if(!empty(get_static_option('site_tag_line'))) - {{get_static_option('site_tag_line')}}@endif</title>
        {!! render_site_seo() !!}
    @else
        @if(!empty(SEOMeta::generate()))
            {!! SEOMeta::generate() !!}
        @else
            <title>@yield('page-title', get_static_option('site_title'))</title>
            <link rel="canonical" href="{{canonical_url()}}"/>
        @endif
        {!! OpenGraph::generate() !!}
        {!! Twitter::generate() !!}
        {!! JsonLd::generate() !!}
    @endif

    {{-- Favicon --}}
    {!! render_favicon_by_id(get_static_option('site_favicon')) !!}

    {{-- Lexend Theme CSS --}}
    <link rel="stylesheet" href="{{ asset('themes/lexend-v4/assets/js/uni-core/css/uni-core.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/lexend-v4/assets/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/lexend-v4/assets/css/unicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/lexend-v4/assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/lexend-v4/assets/css/prettify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/lexend-v4/assets/css/magic-cursor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/lexend-v4/assets/css/theme/main.purge.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/lexend-v4/assets/css/theme/theme-thirteen.purge.css') }}">

    {{-- Additional Styles --}}
    <link rel="stylesheet" href="{{global_asset('assets/common/css/toastr.css')}}">
    @yield('style')

    {!! renderHeadEndHooks() !!}

    @if(get_static_option('site_third_party_tracking_code'))
        <script>{!! get_static_option('site_third_party_tracking_code') !!}</script>
    @endif
</head>

<body class="uni-body panel bg-white text-tertiary-900 dark:bg-gray-900 dark:text-gray-200 overflow-x-hidden disable-cursor">
    {!! renderBodyStartHooks() !!}

    {{-- Include Header --}}
    @include('themes.lexend-v4.layouts.header')

    {{-- Main Content Wrapper --}}
    <div id="wrapper" class="wrap">
        @yield('content')
    </div>

    {{-- Include Footer --}}
    @include('themes.lexend-v4.layouts.footer')

    {{-- Back to Top Button --}}
    <div class="backtotop-wrap position-fixed ltr:end-0 ltr:start-auto rtl:start-0 rtl:end-auto top-auto bottom-0 z-99 m-2 vstack">
        <div class="darkmode-trigger cstack w-40px h-40px rounded-circle text-none bg-gray-100 dark:bg-gray-700 dark:text-white" data-darkmode-toggle="">
            <label class="switch">
                <span class="sr-only">Dark mode toggle</span>
                <input type="checkbox">
                <span class="slider fs-5"></span>
            </label>
        </div>
        <a class="btn btn-sm bg-primary text-white w-40px h-40px rounded-circle" href="#wrapper" data-uc-backtotop>
            <i class="icon-2 unicon-chevron-up"></i>
        </a>
    </div>

    {{-- Lexend Theme JS --}}
    <script src="{{ asset('themes/lexend-v4/assets/js/uni-core/js/uni-core-bundle.min.js') }}"></script>
    <script src="{{ asset('themes/lexend-v4/assets/js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('themes/lexend-v4/assets/js/libs/scrollmagic.min.js') }}"></script>
    <script src="{{ asset('themes/lexend-v4/assets/js/libs/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('themes/lexend-v4/assets/js/libs/anime.min.js') }}"></script>
    <script src="{{ asset('themes/lexend-v4/assets/js/libs/gsap.min.js') }}"></script>
    <script src="{{ asset('themes/lexend-v4/assets/js/core/magic-cursor.js') }}"></script>
    <script src="{{ asset('themes/lexend-v4/assets/js/helpers/data-attr-helper.js') }}"></script>
    <script src="{{ asset('themes/lexend-v4/assets/js/helpers/swiper-helper.js') }}"></script>
    <script src="{{ asset('themes/lexend-v4/assets/js/helpers/anime-helper.js') }}"></script>
    <script src="{{ asset('themes/lexend-v4/assets/js/uikit-components-bs.js') }}"></script>
    
    {{-- Initialize Dark Mode Function --}}
    <script>
        // Initialize isDarkMode as a function that checks dark mode status
        window.isDarkMode = function() {
            return localStorage.getItem('darkMode') === 'true' || 
                   (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches);
        };
        
        // Apply dark mode class on page load
        if (isDarkMode()) {
            document.documentElement.classList.add('dark');
        }
        
        // Make it available globally for compatibility
        var isDarkMode = window.isDarkMode;
    </script>
    
    <script src="{{ asset('themes/lexend-v4/assets/js/app.js') }}"></script>
    
    {{-- Common Scripts --}}
    <script src="{{global_asset('assets/common/js/toastr.min.js')}}"></script>
    
    @yield('scripts')
    @stack('scripts')

    {!! renderBodyEndHooks() !!}
</body>
</html>


{{-- Lexend Header --}}
<header class="uc-header header-thirteen uc-navbar-sticky-wrap z-999" data-uc-sticky="start: 100vh; show-on-up: true; animation: uc-animation-slide-top; sel-target: .uc-navbar-container; cls-active: uc-navbar-sticky; cls-inactive: uc-navbar-transparent; end: !*;">
    <nav class="uc-navbar-container uc-navbar-float ft-tertiary z-1" data-anime="translateY: [-40, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 750; delay: 0;">
        <div class="uc-navbar-main" style="--uc-nav-height: 100px">
            <div class="container">
                <div class="uc-navbar min-h-64px lg:min-h-96px text-dark dark:text-white" data-uc-navbar="animation: uc-animation-slide-top-small; duration: 150;">
                    <div class="uc-navbar-left">
                        <div class="uc-logo ltr:ms-1 rtl:me-1">
                            <a class="panel text-none" href="{{ route('landlord.homepage') }}" style="width: 140px;">
                                @php
                                    $site_logo = get_attachment_image_by_id(get_static_option('site_logo'), 'full', false);
                                    $site_logo_dark = get_attachment_image_by_id(get_static_option('site_logo_dark'), 'full', false);
                                @endphp
                                @if(!empty($site_logo))
                                    <img class="dark:d-none" src="{{ $site_logo['img_url'] ?? '' }}" alt="{{ get_static_option('site_title') }}">
                                @endif
                                @if(!empty($site_logo_dark))
                                    <img class="d-none dark:d-block" src="{{ $site_logo_dark['img_url'] ?? '' }}" alt="{{ get_static_option('site_title') }}">
                                @elseif(!empty($site_logo))
                                    <img class="d-none dark:d-block" src="{{ $site_logo['img_url'] ?? '' }}" alt="{{ get_static_option('site_title') }}">
                                @else
                                    <span class="h4">{{ get_static_option('site_title') }}</span>
                                @endif
                            </a>
                        </div>
                    </div>

                    <div class="uc-navbar-center">
                        <ul class="uc-navbar-nav fw-medium gap-3 xl:gap-5 d-none lg:d-flex" style="--uc-nav-height: 100px">
                            {{-- All Pages Links (excluding Home, Privacy Policy, Terms, and Sample pages) --}}
                            @php
                                $home_page_id = get_static_option('home_page');
                                $all_pages = \App\Models\Page::where('status', 1)
                                    ->where('id', '!=', $home_page_id)
                                    ->where(function($query) {
                                        $query->where('slug', 'not like', '%sample%')
                                              ->where('slug', 'not like', '%privacy%')
                                              ->where('slug', 'not like', '%terms%')
                                              ->where('slug', '!=', 'privacy-policy')
                                              ->where('slug', '!=', 'privacy')
                                              ->where('slug', '!=', 'terms-and-conditions')
                                              ->where('slug', '!=', 'terms')
                                              ->where('slug', '!=', 'terms-of-service')
                                              ->where('slug', '!=', 'sample');
                                    })
                                    ->orderBy('id', 'asc')
                                    ->get();
                            @endphp
                            @foreach($all_pages as $page)
                                <li>
                                    <a href="{{ url('/' . $page->slug) }}" class="text-none {{ request()->is($page->slug) ? 'text-primary' : '' }}">{{ $page->title }}</a>
                                </li>
                            @endforeach
                            {{-- Dynamic Menu from Nazmart (if exists) --}}
                            @if(!empty($primary_menu))
                                {!! render_frontend_menu($primary_menu->id) !!}
                            @endif
                        </ul>
                    </div>

                    <div class="uc-navbar-right">
                        <div class="uc-navbar-item gap-1 d-none lg:d-flex">
                            @if(!auth('web')->check())
                                <a href="{{ route('landlord.user.login') }}" class="btn btn-sm btn-alt-primary rounded-pill px-3">
                                    <span>{{ __('Log in') }}</span>
                                </a>
                                <a href="{{ route('landlord.user.register') }}" class="btn btn-sm btn-primary rounded-pill px-3">
                                    <span>{{ __('Sign up') }}</span>
                                </a>
                            @else
                                <a href="{{ route('landlord.user.home') }}" class="btn btn-sm btn-primary rounded-pill px-3">
                                    <span>{{ __('Dashboard') }}</span>
                                </a>
                            @endif
                        </div>

                        {{-- Mobile Menu Toggle --}}
                        <a class="d-block lg:d-none" href="#uc-menu-panel" data-uc-toggle>
                            <i class="icon-2 unicon-menu"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

{{-- Mobile Menu Panel --}}
<div id="uc-menu-panel" data-uc-offcanvas="overlay: true;">
    <div class="uc-offcanvas-bar bg-white text-dark dark:bg-gray-900 dark:text-white">
        <button class="uc-offcanvas-close rtl:end-auto rtl:start-0 m-1 mt-2 icon-3 btn border-0 dark:text-white" type="button">
            <i class="unicon-close"></i>
        </button>
        <div class="panel">
            <ul class="nav-y gap-narrow fw-medium fs-6" data-uc-nav>
                {{-- All Pages Links (excluding Home, Privacy Policy, Terms, and Sample pages) --}}
                @php
                    $home_page_id = get_static_option('home_page');
                    $all_pages = \App\Models\Page::where('status', 1)
                        ->where('id', '!=', $home_page_id)
                        ->where(function($query) {
                            $query->where('slug', 'not like', '%sample%')
                                  ->where('slug', 'not like', '%privacy%')
                                  ->where('slug', 'not like', '%terms%')
                                  ->where('slug', '!=', 'privacy-policy')
                                  ->where('slug', '!=', 'privacy')
                                  ->where('slug', '!=', 'terms-and-conditions')
                                  ->where('slug', '!=', 'terms')
                                  ->where('slug', '!=', 'terms-of-service')
                                  ->where('slug', '!=', 'sample');
                        })
                        ->orderBy('id', 'asc')
                        ->get();
                @endphp
                @foreach($all_pages as $page)
                    <li>
                        <a href="{{ url('/' . $page->slug) }}" class="text-none {{ request()->is($page->slug) ? 'text-primary' : '' }}">{{ $page->title }}</a>
                    </li>
                @endforeach
                {{-- Login/Signup Links for Mobile --}}
                @if(!auth('web')->check())
                    <li>
                        <a href="{{ route('landlord.user.login') }}" class="text-none">{{ __('Log in') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('landlord.user.register') }}" class="text-none">{{ __('Sign up') }}</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('landlord.user.home') }}" class="text-none">{{ __('Dashboard') }}</a>
                    </li>
                @endif
                {{-- Dynamic Menu from Nazmart (if exists) --}}
                @if(!empty($primary_menu))
                    {!! render_frontend_menu($primary_menu->id) !!}
                @endif
            </ul>
        </div>
    </div>
</div>


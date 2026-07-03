{{-- Lexend Footer --}}
<footer id="uc-footer" class="uc-footer panel overflow-hidden ft-tertiary">
    <div class="footer-outer py-6 lg:py-8 xl:py-9 dark:text-white">
        <div class="uc-footer-content">
            <div class="container">
                <div class="uc-footer-inner vstack gap-4 lg:gap-6 xl:gap-8">
                    <div class="uc-footer-widgets panel">
                        <div class="row child-cols-6 md:child-cols col-match g-4 xl:g-6">
                            <div class="lg:col-4">
                                <div class="panel vstack gap-2">
                                    <div class="uc-footer-logo">
                                        @php
                                            $footer_logo = get_attachment_image_by_id(get_static_option('site_white_logo'), 'full', false);
                                        @endphp
                                        <a class="panel text-none h5 fw-bold text-dark dark:text-white" href="{{ route('landlord.homepage') }}">
                                            @if(!empty($footer_logo))
                                                <img src="{{ $footer_logo['img_url'] ?? '' }}" alt="{{ get_static_option('site_title') }}" style="max-height: 40px;">
                                            @else
                                                {{ get_static_option('site_title') }}
                                            @endif
                                        </a>
                                    </div>
                                    <p class="uc-footer-description fs-6 opacity-70">
                                        {!! get_static_option('site_footer_about_text') ?? __('A professional SaaS platform for your business.') !!}
                                    </p>
                                    @if(!empty(get_static_option('social_facebook')) || !empty(get_static_option('social_twitter')) || !empty(get_static_option('social_instagram')))
                                        <ul class="uc-footer-socials nav-x gap-1 dark:text-white">
                                            @if(!empty(get_static_option('social_facebook')))
                                                <li><a href="{{ get_static_option('social_facebook') }}" target="_blank"><i class="unicon-logo-facebook icon-1"></i></a></li>
                                            @endif
                                            @if(!empty(get_static_option('social_twitter')))
                                                <li><a href="{{ get_static_option('social_twitter') }}" target="_blank"><i class="unicon-logo-x-filled icon-1"></i></a></li>
                                            @endif
                                            @if(!empty(get_static_option('social_instagram')))
                                                <li><a href="{{ get_static_option('social_instagram') }}" target="_blank"><i class="unicon-logo-instagram icon-1"></i></a></li>
                                            @endif
                                            @if(!empty(get_static_option('social_linkedin')))
                                                <li><a href="{{ get_static_option('social_linkedin') }}" target="_blank"><i class="unicon-logo-linkedin icon-1"></i></a></li>
                                            @endif
                                            @if(!empty(get_static_option('social_youtube')))
                                                <li><a href="{{ get_static_option('social_youtube') }}" target="_blank"><i class="unicon-logo-youtube icon-1"></i></a></li>
                                            @endif
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            
                            {{-- Dynamic Footer Widgets --}}
                            <div>
                                <div class="panel vstack gap-2">
                                    <h4 class="h6 lg:h5 m-0 text-dark dark:text-white">{{ __('Company') }}</h4>
                                    <ul class="nav-y gap-1 fw-normal fs-6 opacity-70">
                                        <li><a href="{{ route('landlord.homepage') }}">{{ __('Home') }}</a></li>
                                        <li><a href="#">{{ __('About') }}</a></li>
                                        <li><a href="#">{{ __('Contact') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="panel vstack gap-2">
                                    <h4 class="h6 lg:h5 m-0 text-dark dark:text-white">{{ __('Support') }}</h4>
                                    <ul class="nav-y gap-1 fw-normal fs-6 opacity-70">
                                        <li><a href="#">{{ __('Help Center') }}</a></li>
                                        <li><a href="#">{{ __('Privacy Policy') }}</a></li>
                                        <li><a href="#">{{ __('Terms of Service') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="uc-footer-bottom panel vstack sm:hstack justify-between gap-2 fs-7 opacity-60 dark:border-white border-top pt-4">
                        <div class="vstack sm:hstack items-center gap-1 lg:gap-2 text-center">
                            <p class="opacity-70 dark:text-white">
                                {{ get_static_option('site_footer_copyright_text') ?? __('Copyright © '.date('Y').' '.get_static_option('site_title').'. All Rights Reserved.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


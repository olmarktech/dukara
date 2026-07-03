@extends('themes.lexend-v4.layouts.app')

@section('page-title', __('Login'))

@section('content')

<!-- Section start -->
<div id="sign-in" class="sign-in section panel overflow-hidden bg-secondary dark:bg-gray-900 mt-0">
    <div class="section-outer panel">
        <div class="section-inner panel">
            <div class="panel overflow-hidden">
                <div class="panel row child-cols-12 md:child-cols-6 g-0">
                    <div>
                        <div class="panel overflow-hidden min-h-300px h-100 lg:h-screen" data-anime="translateX: [-24, 0]; opacity: [0, 1]; easing: easeInOutExpo; duration: 750;">
                            <figure class="panel h-100 m-0 rounded">
                                <canvas class="h-100 w-100"></canvas>
                                <img class="media-cover image" src="{{ asset('themes/lexend-v4/assets/images/template/login.webp') }}" alt="Hero login image">
                            </figure>
                            <div class="position-cover text-white vstack justify-end p-4 lg:p-6 xl:py-8">
                                <div class="position-cover bg-gradient-to-t from-black to-transparent opacity-50"></div>
                                <div class="panel z-1">
                                    <div class="vstack gap-3" data-anime="targets: >*; translateY: [-24, 0]; opacity: [0, 1]; easing: easeInOutExpo; duration: 750; delay: anime.stagger(100, {start: 250});">
                                        <p class="fs-5 xl:fs-4 fw-medium">"This software simplifies the website building process, making it a breeze to manage our online presence."</p>
                                        <div class="vstack gap-0">
                                            <p class="fs-6 lg:fs-5 fw-medium">David Handerson</p>
                                            <span class="fs-7 opacity-80">Founder & CEO</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('landlord.homepage') }}" class="position-absolute top-0 ltr:start-0 rtl:end-0 text-none m-4 lg:m-6" data-anime="scale: [0.5, 1]; opacity: [0, 1]; easing: easeInOutExpo; duration: 750; delay: anime.stagger(100, {start: 150});">
                                <img class="w-32px lg:w-40px" src="{{ asset('themes/lexend-v4/assets/images/common/logo-mark.svg') }}" alt="{{ get_static_option('site_title') }}">
                            </a>
                        </div>
                    </div>
                    <div>
                        <div class="panel vstack justify-center h-100 overflow-hidden">
                            <div class="d-none lg:d-block" data-anime="onview: -100; targets: img; scale: [0.8, 1]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 350;">
                                <div class="position-absolute bottom-0 start-0 rotate-45" style="bottom: 15% !important; left: 18% !important;">
                                    <img class="w-32px text-gray-900 dark:text-white" src="{{ asset('themes/lexend-v4/assets/images/template/star-1.svg') }}" alt="star-1" data-uc-svg>
                                </div>
                                <div class="position-absolute top-0 end-0 rotate-45" style="top: 15% !important; right: 18% !important;">
                                    <img class="w-24px text-gray-900 dark:text-white" src="{{ asset('themes/lexend-v4/assets/images/template/star-2.svg') }}" alt="star-2" data-uc-svg>
                                </div>
                                <div class="position-absolute top-0 start-0 translate-middle-y -rotate-12" style="top: 15% !important; left: 10% !important;">
                                    <img class="w-64px d-block dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/template/icon-internet.svg') }}" alt="icon-internet">
                                    <img class="w-64px d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/template/icon-internet-dark.svg') }}" alt="icon-internet-dark">
                                </div>
                                <div class="position-absolute top-0 start-0 translate-middle-y ms-n3" style="top: 65% !important; left: 0% !important;">
                                    <img class="w-64px d-block dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/template/icon-globe.svg') }}" alt="icon-globe">
                                    <img class="w-64px d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/template/icon-globe-dark.svg') }}" alt="icon-globe-dark">
                                </div>
                                <div class="position-absolute top-0 end-0 translate-middle-y rotate-12" style="top: 80% !important; right: 12% !important;">
                                    <img class="w-64px d-block dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/template/icon-diamond.svg') }}" alt="icon-diamond">
                                    <img class="w-64px d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/template/icon-diamond-dark.svg') }}" alt="icon-diamond-dark">
                                </div>
                                <div class="position-absolute top-0 end-0 translate-middle-y -rotate-12 me-n2" style="top: 35% !important;">
                                    <img class="w-64px d-block dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/template/icon-community.svg') }}" alt="icon-community">
                                    <img class="w-64px d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/template/icon-community-dark.svg') }}" alt="icon-community-dark">
                                </div>
                            </div>
                            <div class="panel py-4 px-2">
                                <div class="panel vstack gap-3 w-100 sm:w-350px mx-auto text-center" data-anime="targets: >*; translateY: [24, 0]; opacity: [0, 1]; easing: easeInOutExpo; duration: 750; delay: anime.stagger(100);">
                                    <h1 class="h4 sm:h2">{{ __('Welcome Back') }}</h1>
                                    <div id="msg-wrapper"></div>
                                    
                                    <x-error-msg/>
                                    <x-flash-msg/>

                                    <form class="vstack gap-3" id="login-form" action="" method="POST">
                                        @csrf
                                        
                                        <input class="form-control h-48px w-full bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30 rounded" type="text" name="username" placeholder="{{ __('Username or Email') }}" value="{{ old('username') }}" required>
                                        
                                        <div class="position-relative">
                                            <input class="form-control h-48px w-full bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30 rounded pe-48px" type="password" name="password" id="password" placeholder="{{ __('Password') }}" required>
                                            <span class="position-absolute top-50 end-0 translate-middle-y pe-3 z-1 cursor-pointer toggle-password" style="cursor: pointer; z-index: 10;">
                                                <i class="unicon-eye-slash show-icon"></i>
                                                <i class="unicon-eye hide-icon d-none"></i>
                                            </span>
                                        </div>
                                        
                                        <div class="hstack text-start">
                                            <div class="form-check text-start rtl:text-end">
                                                <input id="uc_form_check_remember" class="form-check-input rounded bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30" type="checkbox" name="remember">
                                                <label for="uc_form_check_remember" class="form-check-label fs-6">
                                                    {{ __('Remember me') }}
                                                </label>
                                            </div>
                                            <a href="{{ route('landlord.user.forget.password') }}" class="uc-link fs-6 ltr:ms-auto rtl:me-auto">
                                                {{ __('Forgot Password?') }}
                                            </a>
                                        </div>
                                        
                                        <button class="btn btn-primary btn-md text-white mt-2 w-full" type="submit" id="login_button">{{ __('Sign In') }}</button>
                                    </form>
                                    
                                    <p>{{ __("Don't have an account?") }} <a class="uc-link" href="{{ route('landlord.user.register') }}">{{ __('Sign up') }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Section end -->

@push('style')
<style>
    /* Hide header on login page */
    #wrapper {
        margin-top: 0 !important;
    }
    
    .sign-in {
        min-height: 100vh;
        display: flex;
        align-items: center;
    }
    .sign-in .section-outer {
        width: 100%;
    }
    .sign-in .form-control {
        border: 1px solid rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    .sign-in .form-control:focus {
        border-color: rgba(var(--main-color-one-rgb, 59, 130, 246), 0.5);
        box-shadow: 0 0 0 3px rgba(var(--main-color-one-rgb, 59, 130, 246), 0.1);
        outline: none;
    }
    .sign-in .dark .form-control {
        background-color: rgba(255, 255, 255, 0);
        border: 1px solid rgba(107, 114, 128, 0.3);
        color: #fff;
    }
    .sign-in .dark .form-control:focus {
        border-color: rgba(var(--main-color-one-rgb, 59, 130, 246), 0.5);
        background-color: rgba(255, 255, 255, 0.05);
    }
    .sign-in .dark .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }
    .sign-in .toggle-password {
        color: #6b7280;
        transition: color 0.3s ease;
    }
    .sign-in .toggle-password:hover {
        color: rgba(var(--main-color-one-rgb, 59, 130, 246), 1);
    }
    .sign-in .dark .toggle-password {
        color: #9ca3af;
    }
    .sign-in .dark .toggle-password:hover {
        color: #fff;
    }
    .sign-in .btn-primary {
        font-weight: 500;
        transition: all 0.3s ease;
    }
    .sign-in .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(var(--main-color-one-rgb, 59, 130, 246), 0.3);
    }
</style>
@endpush

@push('scripts')
<script>
    (function($){
        "use strict";
        
        // Toggle password visibility
        $(document).on('click', '.toggle-password', function() {
            const input = $(this).closest('.position-relative').find('input');
            const showIcon = $(this).find('.show-icon');
            const hideIcon = $(this).find('.hide-icon');
            
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                showIcon.addClass('d-none');
                hideIcon.removeClass('d-none');
            } else {
                input.attr('type', 'password');
                showIcon.removeClass('d-none');
                hideIcon.addClass('d-none');
            }
        });
        
        // Login form submission
        var loginForm = document.getElementById('login-form');
        var loginButton = document.getElementById('login_button');
        
        if (loginForm) {
            loginForm.addEventListener('submit', function (event) {
                event.preventDefault();
                
                loginButton.disabled = true;
                var msgWrap = document.getElementById('msg-wrapper');
                if (msgWrap) msgWrap.innerHTML = '';
                
                loginButton.innerText = "{{ __('Signing in...') }}";
                
                axios({
                    url: "{{ route('landlord.user.ajax.login') }}",
                    method: 'post',
                    responseType: 'json',
                    data: {
                        username: document.querySelector('input[name="username"]').value,
                        password: document.querySelector('input[name="password"]').value,
                        remember: document.querySelector('input[name="remember"]').checked ? 'on' : 'off',
                        _token: '{{ csrf_token() }}'
                    }
                }).then(function (response) {
                    loginButton.innerText = "{{ __('Redirecting...') }}";
                    
                    if (response.data.redirect) {
                        window.location.href = response.data.redirect;
                    } else {
                        window.location.href = '{{ route('landlord.user.home') }}';
                    }
                }).catch(function (error) {
                    loginButton.innerText = "{{ __('Sign In') }}";
                    
                    if (error.response && error.response.status === 422) {
                        var responseData = error.response.data.errors;
                        var child = '<div class="alert alert-danger text-start">';
                        var i = 1;
                        Object.entries(responseData).forEach(function (value) {
                            if (Array.isArray(value[1])) {
                                value[1].forEach(function (msg) {
                                    child += '<div>' + i++ + ". " + msg + '</div>';
                                });
                            } else {
                                child += '<div>' + i++ + ". " + value[1] + '</div>';
                            }
                        });
                        child += '</div>';
                        if (msgWrap) msgWrap.innerHTML = child;
                    } else {
                        var responeMsg = error.response?.data?.message || '{{ __('An error occurred. Please try again.') }}';
                        var child = '<div class="alert alert-danger">' + responeMsg + '</div>';
                        if (msgWrap) msgWrap.innerHTML = child;
                    }
                    
                    loginButton.disabled = false;
                });
            });
        }
    })(jQuery);
</script>
@endpush

@endsection

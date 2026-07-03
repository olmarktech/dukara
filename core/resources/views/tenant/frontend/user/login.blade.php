@extends('tenant.frontend.frontend-page-master')

@section('title')
    {{__('User Login')}}
@endsection

@section('page-title')
    {{__('User Login')}}
@endsection

@section('style')
    <style>
        .login-split-wrapper {
            min-height: calc(100vh - 200px);
            display: flex;
            align-items: stretch;
        }
        .login-image-section {
            position: relative;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: none;
            overflow: hidden;
        }
        @media (min-width: 992px) {
            .login-image-section {
                display: block;
            }
        }
        .login-image-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('{{ asset("themes/lexend-v4/assets/images/template/login.webp") }}') center/cover;
            opacity: 0.3;
        }
        .login-image-overlay {
            position: relative;
            z-index: 1;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 40px;
            color: white;
        }
        .login-image-overlay::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60%;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            z-index: -1;
        }
        .login-form-section {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
            background: #f8f9fa;
        }
        .login-form-wrapper {
            width: 100%;
            max-width: 450px;
        }
        .login-form-card {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .login-title {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
            color: var(--heading-color, #2d3748);
        }
        .login-form-wrapper .form-control {
            height: 48px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 15px;
            transition: all 0.3s;
        }
        .login-form-wrapper .form-control:focus {
            border-color: var(--main-color-one, #667eea);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        .login-form-wrapper .form-group {
            margin-bottom: 20px;
        }
        .login-form-wrapper label {
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--heading-color, #2d3748);
            font-size: 14px;
        }
        .login-remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        .login-btn-wrapper {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }
        .login-btn-wrapper .btn {
            flex: 1;
            height: 48px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 15px;
        }
        .login-signup-link {
            text-align: center;
            margin-top: 25px;
            color: var(--light-color, #718096);
            font-size: 14px;
        }
        .login-signup-link a {
            color: var(--main-color-one, #667eea);
            text-decoration: none;
            font-weight: 500;
        }
        .login-signup-link a:hover {
            text-decoration: underline;
        }
        .sign-in-area-wrapper {
            padding-top: 150px !important;
        }
        @media (max-width: 991px) {
            .sign-in-area-wrapper {
                padding-top: 120px !important;
            }
        }
        @media (max-width: 767px) {
            .sign-in-area-wrapper {
                padding-top: 100px !important;
            }
            .login-form-card {
                padding: 30px 20px;
            }
            .login-title {
                font-size: 28px;
            }
        }
        .testimonial-text {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .testimonial-author {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .testimonial-position {
            font-size: 14px;
            opacity: 0.9;
        }
    </style>
@endsection

@section('content')
    <div class="sign-in-area-wrapper" data-padding-top="150" data-padding-bottom="50">
        <div class="container-fluid p-0">
            <div class="row g-0 login-split-wrapper">
                <!-- Left Side - Image Section -->
                <div class="col-lg-6 login-image-section">
                    <div class="login-image-overlay">
                        <div>
                            <p class="testimonial-text">"This software simplifies the website building process, making it a breeze to manage our online presence."</p>
                            <p class="testimonial-author">David Handerson</p>
                            <p class="testimonial-position">Founder & CEO</p>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side - Form Section -->
                <div class="col-lg-6 login-form-section">
                    <div class="login-form-wrapper">
                        <div class="login-form-card">
                            <h2 class="login-title">{{__('Sign in')}}</h2>
                            
                            <x-error-msg/>
                            <x-flash-msg/>
                            
                            <form id="login_form_order_page" method="POST">
                                @csrf
                                <div class="error-wrap"></div>
                                
                                <div class="form-group">
                                    <label for="username">{{__('Email or Username')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="{{__('Type Your Email or Username')}}" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="password">{{__('Password')}} <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="{{__('Password')}}" required>
                                </div>
                                
                                <div class="login-remember-forgot">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">{{__('Remember Me')}}</label>
                                    </div>
                                    <a href="{{route('tenant.user.forget.password')}}" style="color: var(--main-color-one, #667eea); text-decoration: none; font-size: 14px;">{{__('Forgot Password?')}}</a>
                                </div>
                                
                                <div class="login-btn-wrapper">
                                    <button type="submit" id="login_btn" class="btn btn-primary">{{__('Login')}}</button>
                                    @if(moduleExists('SmsGateway') && get_static_option('otp_login_status'))
                                        <a href="{{route('tenant.user.login.otp')}}" id="otp_login_btn" class="btn btn-outline-primary">{{__('Login with OTP')}}</a>
                                    @endif
                                </div>
                            </form>
                            
                            <div class="login-signup-link">
                                <p class="mb-0">{{__("Do not have an account?")}} <a href="{{route('tenant.user.register')}}">{{__('Sign up')}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
   <x-custom-js.ajax-login/>
@endsection

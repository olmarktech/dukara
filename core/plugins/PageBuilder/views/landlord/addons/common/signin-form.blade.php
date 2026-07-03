@php
    // Sign In Form - Fallback view for non-Lexend themes
    $form_title = $data['form_title'] ?? 'Sign in';
    $email_placeholder = $data['email_placeholder'] ?? 'Your email';
    $password_placeholder = $data['password_placeholder'] ?? 'Password';
    $remember_text = $data['remember_text'] ?? 'Remember me?';
    $forgot_password_text = $data['forgot_password_text'] ?? 'Forgot password';
    $forgot_password_url = $data['forgot_password_url'] ?? '#';
    $button_text = $data['button_text'] ?? 'Log in';
    $signup_text = $data['signup_text'] ?? 'Have no account yet?';
    $signup_url = $data['signup_url'] ?? '#';
    $section_id = $data['section_id'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
@endphp

<section class="signin-form-area section-bg-1" data-padding-top="{{ $padding_top }}" data-padding-bottom="{{ $padding_bottom }}" id="{{ $section_id }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="signin-form-wrapper">
                    <div class="card">
                        <div class="card-body p-4 p-lg-5">
                            <h2 class="text-center mb-4">{{ $form_title }}</h2>
                            
                            <div class="social-login mb-4">
                                <div class="row g-2">
                                    <div class="col-6">
                                        <a href="#github" class="btn btn-dark btn-block w-100">
                                            <i class="icon unicon-logo-github"></i> GitHub
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#facebook" class="btn btn-primary btn-block w-100">
                                            <i class="icon unicon-logo-facebook"></i> Facebook
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="divider text-center my-3">
                                <span>Or</span>
                            </div>
                            
                            <form id="landlord-signin-form" action="{{ route('landlord.user.login') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="{{ $email_placeholder }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="{{ $password_placeholder }}" required>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                        <label class="form-check-label" for="remember_me">{{ $remember_text }}</label>
                                    </div>
                                    @if($forgot_password_text && $forgot_password_url)
                                        <a href="{{ $forgot_password_url }}">{{ $forgot_password_text }}</a>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary btn-block w-100">{{ $button_text }}</button>
                                <div class="form-message-show mt-3"></div>
                            </form>
                            
                            <p class="text-center mt-4">
                                {{ $signup_text }} <a href="{{ $signup_url }}">Sign up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


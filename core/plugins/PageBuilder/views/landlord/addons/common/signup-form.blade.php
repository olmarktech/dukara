@php
    // Sign Up Form - Fallback view for non-Lexend themes
    $form_title = $data['form_title'] ?? 'Create an account';
    $email_placeholder = $data['email_placeholder'] ?? 'Your email';
    $terms_text = $data['terms_text'] ?? 'I read and accept the';
    $terms_url = $data['terms_url'] ?? '#';
    $button_text = $data['button_text'] ?? 'Create my account';
    $signin_text = $data['signin_text'] ?? 'Already have an account?';
    $signin_url = $data['signin_url'] ?? '#';
    $section_id = $data['section_id'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
@endphp

<section class="signup-form-area section-bg-1" data-padding-top="{{ $padding_top }}" data-padding-bottom="{{ $padding_bottom }}" id="{{ $section_id }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="signup-form-wrapper">
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
                            
                            <form id="landlord-signup-form" action="{{ route('landlord.user.register') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="{{ $email_placeholder }}" required>
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="terms_check" name="terms" required>
                                    <label class="form-check-label" for="terms_check">
                                        {{ $terms_text }} <a href="{{ $terms_url }}">terms of use</a>.
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block w-100">{{ $button_text }}</button>
                                <div class="form-message-show mt-3"></div>
                            </form>
                            
                            <p class="text-center mt-4">
                                {{ $signin_text }} <a href="{{ $signin_url }}">Sign in</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@php
    // Contact Hero Header - EXACT from page-contact.html line 726-787
    $title = $data['title'] ?? "Let's get in touch.";
    $subtitle = $data['subtitle'] ?? '';
    $form_description = $data['form_description'] ?? '';
    $email_text = $data['email_text'] ?? '';
    $email_address = $data['email_address'] ?? '';
    $background_image = $data['background_image'] ?? '';
    $testimonial_text = $data['testimonial_text'] ?? '';
    $testimonial_name = $data['testimonial_name'] ?? '';
    $testimonial_position = $data['testimonial_position'] ?? '';
@endphp

<!-- Section start -->
<div id="hero_header" class="hero-header section panel overflow-hidden">
    <div class="position-absolute top-0 start-0 end-0 min-h-screen overflow-hidden d-none lg:d-block" data-anime="targets: >*; scale: [0, 1]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 750});">
        <div class="position-absolute top-0 start-0 rotate-45" style="top: 30% !important; left: 18% !important;">
            <img class="w-32px text-gray-900 dark:text-white" src="{{ asset('themes/lexend-v4/assets/images/template/star-1.svg') }}" alt="star-1" data-uc-svg>
        </div>
        <div class="position-absolute top-0 end-0 rotate-45" style="top: 15% !important; right: 18% !important;">
            <img class="w-24px text-gray-900 dark:text-white" src="{{ asset('themes/lexend-v4/assets/images/template/star-2.svg') }}" alt="star-2" data-uc-svg>
        </div>
    </div>
    <div class="section-outer panel pt-9 lg:pt-10 pb-6 sm:pb-8 lg:pb-9">
        <div class="container max-w-xl">
            <div class="section-inner panel mt-2 sm:mt-4 lg:mt-0" data-anime="targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                <div class="vstack items-center gap-2 lg:gap-4 mb-4 sm:mb-6 lg:mb-8 max-w-750px mx-auto text-center">
                    <h1 class="h2 sm:h1 lg:display-6 xl:display-5 m-0">{{ $title }}</h1>
                    @if($subtitle)
                        <p class="fs-6 sm:fs-5 text-dark dark:text-white text-opacity-70">{{ $subtitle }}</p>
                    @endif
                </div>
                <div class="panel rounded-3 overflow-hidden bg-secondary dark:bg-gray-800">
                    <div class="panel row child-cols-12 lg:child-cols-6 g-0">
                        <div class="order-1 lg:order-0">
                            <div class="panel overflow-hidden rounded-3 h-100 min-h-350px">
                                @if($background_image)
                                    <figure class="panel h-100 m-0 rounded">
                                        <canvas class="h-100 w-100"></canvas>
                                        @php
                                            $bg_img = get_attachment_image_by_id($background_image, 'full', false);
                                        @endphp
                                        @if(!empty($bg_img['img_url']))
                                            <img src="{{ $bg_img['img_url'] }}" alt="{{ $bg_img['img_alt'] ?? 'Contact' }}" class="media-cover image">
                                        @endif
                                    </figure>
                                @endif
                                @if($testimonial_text || $testimonial_name)
                                    <div class="position-cover text-white vstack justify-end p-4 lg:p-6 xl:p-9">
                                        <div class="position-cover bg-gradient-to-t from-black to-transparent opacity-50"></div>
                                        <div class="panel z-1">
                                            <div class="vstack gap-3">
                                                @if($testimonial_text)
                                                    <p class="fs-5 xl:fs-4 fw-medium">"{{ $testimonial_text }}"</p>
                                                @endif
                                                @if($testimonial_name)
                                                    <div class="vstack gap-0">
                                                        <p class="fs-6 lg:fs-5 fw-medium">{{ $testimonial_name }}</p>
                                                        @if($testimonial_position)
                                                            <span class="fs-7 opacity-80">{{ $testimonial_position }}</span>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="order-0 lg:order-1">
                            <form class="vstack gap-2 p-3 sm:p-6 xl:p-8" id="landlord-contact-form" action="#">
                                @if($form_description)
                                    <p class="fs-6 text-dark dark:text-white text-opacity-70 mb-2">{{ $form_description }}</p>
                                @endif
                                <div class="row child-cols-12 sm:child-cols-6 g-2">
                                    <div>
                                        <input class="form-control h-48px w-full bg-white dark:border-white dark:bg-opacity-10 dark:border-opacity-0 dark:text-white" type="text" name="name" placeholder="Full name" required>
                                    </div>
                                    <div>
                                        <input class="form-control h-48px w-full bg-white dark:border-white dark:bg-opacity-10 dark:border-opacity-0 dark:text-white" type="email" name="email" placeholder="Your email" required>
                                    </div>
                                </div>
                                <input class="form-control h-48px w-full bg-white dark:border-white dark:bg-opacity-10 dark:border-opacity-0 dark:text-white" type="text" name="subject" placeholder="Subject">
                                <textarea class="form-control min-h-150px w-full bg-white dark:border-white dark:bg-opacity-10 dark:border-opacity-0 dark:text-white" name="message" placeholder="Your message.." required></textarea>
                                <button class="btn btn-primary btn-md text-white mt-2" type="submit">Send message</button>
                                @if($email_text && $email_address)
                                    <p class="text-center">{{ $email_text }} <a class="uc-link" href="mailto:{{ $email_address }}">email</a>.</p>
                                @endif
                                <div class="form-message-show mt-2"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

<script>
    // Contact form handling - moved inline to avoid @push/@endpush issues
    (function($){
        "use strict";
        
        $(document).on('submit', '#landlord-contact-form', function(e){
            e.preventDefault();
            var form = $(this);
            var formData = new FormData(this);
            var submitBtn = form.find('button[type="submit"]');
            var originalText = submitBtn.text();
            
            submitBtn.prop('disabled', true).text('Sending...');
            
            $.ajax({
                url: "{{ route('landlord.frontend.contact.message') }}",
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response){
                    form.find('.form-message-show').html('<div class="alert alert-success">' + (response.msg || 'Message sent successfully!') + '</div>');
                    form[0].reset();
                    submitBtn.prop('disabled', false).text(originalText);
                },
                error: function(xhr){
                    var errorMsg = 'An error occurred. Please try again.';
                    if(xhr.responseJSON && xhr.responseJSON.msg){
                        errorMsg = xhr.responseJSON.msg;
                    }
                    form.find('.form-message-show').html('<div class="alert alert-danger">' + errorMsg + '</div>');
                    submitBtn.prop('disabled', false).text(originalText);
                }
            });
        });
    })(jQuery);
</script>


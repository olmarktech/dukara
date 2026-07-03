@php
    // Blog Newsletter - EXACT from blog.html line 967-995
    $title = $data['title'] ?? 'Get the latest updates';
    $description = $data['description'] ?? '';
    $input_placeholder = $data['input_placeholder'] ?? 'Your email address';
    $button_text = $data['button_text'] ?? 'Subscribe';
    $disclaimer_text = $data['disclaimer_text'] ?? "Don't worry we don't spam.";
@endphp

<!-- Newsletter -->
<div id="blog_newsletter" class="blog-newsletter section panel overflow-hidden">
    <div class="section-outer panel pb-4 lg:pb-6 xl:pb-9">
        <div class="container max-w-xl">
            <div class="section-inner panel p-3 py-6 lg:p-6 xl:p-8 rounded-2 bg-secondary dark:bg-gray-800 overflow-hidden">
                <div class="row child-cols-12 md:child-cols g-6 justify-between items-center" data-uc-grid>
                    <div>
                        <div class="vstack gap-2 max-w-500px xl:max-w-600px">
                            <h2 class="h4 md:h3 lg:h2 m-0">{{ $title }}</h2>
                            @if($description)
                                <p class="fs-6 lg:fs-5">{{ $description }}</p>
                            @endif
                            <form class="row child-cols g-1 mt-1 xl:mt-2" action="#" id="landlord-newsletter-form">
                                <div>
                                    <input class="form-control h-48px xl:h-56px w-full bg-white dark:border-white dark:bg-opacity-10 dark:border-opacity-0 dark:text-white" type="email" name="email" placeholder="{{ $input_placeholder }}" required>
                                </div>
                                <div class="col-12 sm:col-auto">
                                    <button type="submit" class="btn btn-md h-48px xl:h-56px w-100 lg:min-w-150px xl:min-w-200px btn-primary text-white">{{ $button_text }}</button>
                                </div>
                            </form>
                            @if($disclaimer_text)
                                <p class="fs-7 text-dark dark:text-white text-opacity-70">{{ $disclaimer_text }}</p>
                            @endif
                            <div class="form-message-show mt-2"></div>
                        </div>
                    </div>
                    <div class="md:col-auto d-none md:d-block">
                        <img class="w-250px lg:w-300px xl:w-400px d-block dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/template/newsletter.svg') }}" alt="newsletter">
                        <img class="w-250px lg:w-300px xl:w-400px d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/template/newsletter-dark.svg') }}" alt="newsletter-dark">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


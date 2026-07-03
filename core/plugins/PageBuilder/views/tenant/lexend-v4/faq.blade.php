@php
    $heading = $data['heading'] ?? '';
    $faqs = $data['faqs'] ?? [];
    $button_text = $data['button_text'] ?? '';
    $button_url = $data['button_url'] ?? '';
    $padding_top = $data['padding_top'] ?? '100px';
    $padding_bottom = $data['padding_bottom'] ?? '100px';
@endphp
<!-- Section start -->
<div id="faq" class="faq section panel" style="padding-top: {{ $padding_top }}; padding-bottom: {{ $padding_bottom }};">
    <div class="section-outer panel py-6 sm:py-8 xl:py-10">
        <div class="container lg:max-w-lg">
            <div class="section-inner panel" data-anime="onview: -200; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                @if($heading)
                    <div class="section-heading panel vstack items-center gap-2 xl:gap-3 mb-4 sm:mb-6 xl:mb-9 max-w-700px mx-auto text-center">
                        <h2 class="h3 sm:h2 xl:h1 m-0">{{ $heading }}</h2>
                    </div>
                @endif
                <div class="section-content panel">
                    <ul class="uc-accordion gap-1 max-w-md xl:max-w-lg mx-auto" data-uc-accordion="targets: > li; multiple: false;">
                        @if(!empty($faqs))
                            @foreach($faqs as $index => $faq)
                                <li class="panel p-2 md:p-3 lg:p-4 bg-secondary dark:bg-gray-800 rounded-2 {{ $faq['is_open'] ? 'uc-open' : '' }}">
                                    @if(!empty($faq['question']))
                                        <a class="uc-accordion-title h6 md:h5 lg:h5 fw-bold ltr:pe-4 rtl:ps-4" href="#">{{ $faq['question'] }}</a>
                                    @endif
                                    @if(!empty($faq['answer']))
                                        <div class="uc-accordion-content lg:fs-5 opacity-70">
                                            <p>{{ $faq['answer'] }}</p>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        @else
                            {{-- Default FAQs --}}
                            <li class="panel p-2 md:p-3 lg:p-4 bg-secondary dark:bg-gray-800 rounded-2 uc-open">
                                <a class="uc-accordion-title h6 md:h5 lg:h5 fw-bold ltr:pe-4 rtl:ps-4" href="#">Do I need to know about how to code?</a>
                                <div class="uc-accordion-content lg:fs-5 opacity-70">
                                    <p>Yes, you need to have a fair amount of knowledge in dealing with HTML/CSS as well as JavaScript in order to be able to use Lexend.</p>
                                </div>
                            </li>
                            <li class="panel p-2 md:p-3 lg:p-4 bg-secondary dark:bg-gray-800 rounded-2">
                                <a class="uc-accordion-title h6 md:h5 lg:h5 fw-bold ltr:pe-4 rtl:ps-4" href="#">Can I use it for commercial projects?</a>
                                <div class="uc-accordion-content lg:fs-5 opacity-70">
                                    <p>Feel free to do so. Lexend does exist to evolve every commercial project. You can also use it to build stunning websites for your own clients (we won't breathe a word).</p>
                                </div>
                            </li>
                            <li class="panel p-2 md:p-3 lg:p-4 bg-secondary dark:bg-gray-800 rounded-2">
                                <a class="uc-accordion-title h6 md:h5 lg:h5 fw-bold ltr:pe-4 rtl:ps-4" href="#">Can I use it for multiple projects?</a>
                                <div class="uc-accordion-content lg:fs-5 opacity-70">
                                    <p>Definitely! Please use it however you like; we don't limit it.</p>
                                </div>
                            </li>
                            <li class="panel p-2 md:p-3 lg:p-4 bg-secondary dark:bg-gray-800 rounded-2">
                                <a class="uc-accordion-title h6 md:h5 lg:h5 fw-bold ltr:pe-4 rtl:ps-4" href="#">Can I use it to create and sell a product?</a>
                                <div class="uc-accordion-content lg:fs-5 opacity-70">
                                    <p>Do not ever consider doing it.</p>
                                </div>
                            </li>
                            <li class="panel p-2 md:p-3 lg:p-4 bg-secondary dark:bg-gray-800 rounded-2">
                                <a class="uc-accordion-title h6 md:h5 lg:h5 fw-bold ltr:pe-4 rtl:ps-4" href="#">What is your refund policy?</a>
                                <div class="uc-accordion-content lg:fs-5 opacity-70">
                                    <p>We understand the importance of customer satisfaction and we strive to provide the best products and services. However, please note that due to the nature of our products and services, we do not offer refunds after a purchase has been made.</p>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
                @if($button_text && $button_url)
                    <div class="section-footer panel vstack gap-2 items-center mt-6 sm:mt-8 xl:mt-9">
                        <a href="{{ $button_url }}" class="btn btn-md lg:btn-lg btn-outline-dark fs-6 px-4 dark:text-white dark:hover:text-dark dark:hover:bg-white border rounded-pill">
                            <span>{{ $button_text }}</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Section end -->




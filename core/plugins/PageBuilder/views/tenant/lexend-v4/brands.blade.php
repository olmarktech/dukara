@php
    $brands = $data['brands'] ?? [];
    $padding_top = $data['padding_top'] ?? '40px';
    $padding_bottom = $data['padding_bottom'] ?? '40px';
@endphp
<!-- Section start -->
<div id="brands" class="brands section panel overflow-hidden" style="padding-top: {{ $padding_top }}; padding-bottom: {{ $padding_bottom }};">
    <div class="section-outer panel pt-6 sm:pt-8 xl:pt-9 lg:mx-2 bg-secondary dark:bg-gray-800">
        <div class="container">
            <div class="section-inner panel text-center xl:mx-9" data-anime="onview: -200; translateY: [-16, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: 350;">
                <div class="brands panel">
                    <div class="row child-cols-4 sm:child-cols items-center justify-center text-center g-2 sm:g-6 xl:g-9">
                        @if(!empty($brands))
                            @foreach($brands as $brand)
                                <div>
                                    @if(!empty($brand['brand_image']))
                                        @php
                                            $brand_img = get_attachment_image_by_id($brand['brand_image']);
                                        @endphp
                                        <img class="dark:d-none" src="{{ $brand_img['img_url'] ?? '' }}" alt="{{ $brand['brand_alt'] ?? 'Brand' }}">
                                        <img class="d-none dark:d-block" src="{{ $brand_img['img_url'] ?? '' }}" alt="{{ $brand['brand_alt'] ?? 'Brand' }}">
                                    @else
                                        <img class="dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/brands/brand-09.svg') }}" alt="Brand">
                                        <img class="d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/brands/brand-09-dark.svg') }}" alt="Brand">
                                    @endif
                                </div>
                            @endforeach
                        @else
                            {{-- Default brands if none configured --}}
                            <div>
                                <img class="dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/brands/brand-09.svg') }}" alt="Hello">
                                <img class="d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/brands/brand-09-dark.svg') }}" alt="Hello">
                            </div>
                            <div>
                                <img class="dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/brands/brand-05.svg') }}" alt="Hello">
                                <img class="d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/brands/brand-05-dark.svg') }}" alt="Hello">
                            </div>
                            <div>
                                <img class="dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/brands/brand-10.svg') }}" alt="Hello">
                                <img class="d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/brands/brand-10-dark.svg') }}" alt="Hello">
                            </div>
                            <div>
                                <img class="dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/brands/brand-11.svg') }}" alt="Hello">
                                <img class="d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/brands/brand-11-dark.svg') }}" alt="Hello">
                            </div>
                            <div>
                                <img class="dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/brands/brand-12.svg') }}" alt="Hello">
                                <img class="d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/brands/brand-12-dark.svg') }}" alt="Hello">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->




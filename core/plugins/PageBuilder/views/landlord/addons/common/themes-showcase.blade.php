@php
    $title = $data['title'] ?? 'Amazing Themes';
    $subtitle = $data['subtitle'] ?? '';
    $view_button_text = $data['view_button_text'] ?? 'View Theme';
    $section_id = $data['section_id'] ?? '';
    
    // Get all themes using helper function
    $all_themes = getAllThemeData();
@endphp

<!-- Section start -->
<div id="{{ $section_id ?: 'themes_showcase' }}" class="themes-showcase section panel overflow-hidden">
    <div class="section-outer panel pt-9 lg:pt-10 pb-6 xl:pb-9">
        <div class="container max-w-lg">
            <div class="section-inner panel mt-2 sm:mt-4 lg:mt-0">
                {{-- Header --}}
                <div class="panel vstack items-center gap-3 lg:gap-4 mb-6 sm:mb-8 lg:mb-9 max-w-650px mx-auto text-center">
                    @if($title)
                        <h1 class="h2 sm:h1 lg:display-6 xl:display-5 m-0">{{ $title }}</h1>
                    @endif
                    @if($subtitle)
                        <p class="fs-6 sm:fs-5 text-dark dark:text-white text-opacity-70">{{ $subtitle }}</p>
                    @endif
                </div>
                
                {{-- Themes List - Sticky Scene Layout --}}
                <div class="sticky-scene panel vstack gap-4 sm:gap-6 xl:gap-8">
                    @foreach($all_themes as $theme)
                        @php
                            $theme_slug = $theme->slug;
                            $theme_data = getIndividualThemeDetails($theme_slug);
                            $theme_image = loadScreenshot($theme_slug);
                            
                            $theme_custom_name = get_static_option_central($theme_data['slug'].'_theme_name');
                            $theme_custom_url = get_static_option_central($theme_data['slug'].'_theme_url');
                            $custom_theme_image = get_static_option_central($theme_data['slug'].'_theme_image');
                            
                            $final_image = !empty($custom_theme_image) ? $custom_theme_image : $theme_image;
                            $final_name = !empty($theme_custom_name) ? $theme_custom_name : $theme_data['name'];
                            $final_url = !empty($theme_custom_url) ? $theme_custom_url : url('/theme-preview/' . $theme_slug);
                        @endphp
                        <div class="feature-item panel px-3 lg:px-4 py-4 rounded-2 bg-secondary dark:bg-gray-800">
                            <div class="row child-cols col-match justify-between g-4 lg:g-8 xl:g-10">
                                {{-- Theme Screenshot --}}
                                <div class="order-0 lg:order-{{ $loop->index % 2 == 0 ? '1' : '0' }}">
                                    <div class="panel w-100 rounded lg:rounded-2 overflow-hidden">
                                        <a href="{{ $final_url }}" target="_blank">
                                            <img src="{{ $final_image }}" alt="{{ $final_name }}" class="w-100">
                                        </a>
                                    </div>
                                </div>
                                
                                {{-- Theme Info --}}
                                <div class="order-1 lg:order-{{ $loop->index % 2 == 0 ? '0' : '1' }} col-12 sm:col-5">
                                    <div class="panel vstack justify-center gap-4 h-100">
                                        <div>
                                            <div class="panel vstack gap-2">
                                                <span class="fs-6 fw-bold m-0 text-primary">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}.</span>
                                                <h3 class="h4 lg:h2 m-0">{{ $final_name }}</h3>
                                                @if(!empty($theme_data['description']))
                                                    <p class="fs-6 lg:fs-5 opacity-70 dark:opacity-80">{{ $theme_data['description'] }}</p>
                                                @endif
                                                <a href="{{ $final_url }}" target="_blank" class="uc-link fw-bold hstack gap-narrow mt-2">
                                                    <span>{{ $view_button_text }}</span>
                                                    <i class="position-relative icon icon-1 unicon-arrow-right rtl:rotate-180 translate-y-px"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Section end -->

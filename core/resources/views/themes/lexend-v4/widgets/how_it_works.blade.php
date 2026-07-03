@php
    $title = $data['title'] ?? '';
    $subtitle = $data['subtitle'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
    $section_id = $data['section_id'] ?? '';
    
    if (str_contains($title, '{h}') && str_contains($title, '{/h}')) {
        $text = explode('{h}', $title);
        $highlighted_word = explode('{/h}', $text[1])[0];
        $highlighted_text = '<span class="text-primary dark:text-quaternary">'. $highlighted_word .'</span>';
        $final_title = str_replace('{h}'.$highlighted_word.'{/h}', $highlighted_text, $title);
    } else {
        $final_title = $title;
    }
@endphp

<div id="{{ $section_id }}" class="how-it-works section panel overflow-hidden" style="padding-top: {{ $padding_top }}px; padding-bottom: {{ $padding_bottom }}px;">
    <div class="container">
        <div class="panel vstack items-center gap-2 lg:gap-4 mb-4 sm:mb-6 max-w-700px mx-auto text-center">
            @if($title)
                <h2 class="h3 lg:h2 m-0">{!! $final_title !!}</h2>
            @endif
            @if($subtitle)
                <p class="fs-6 xl:fs-5 opacity-70">{{ $subtitle }}</p>
            @endif
        </div>

        @if(array_key_exists('repeater_title_', $data['repeater_data']))
            <div class="row child-cols-12 sm:child-cols-6 lg:child-cols-4 g-4">
                @foreach($data['repeater_data']['repeater_title_'] as $key => $info)
                    <div>
                        <div class="panel vstack gap-2 text-center">
                            @if(!empty($data['repeater_data']['repeater_image_'][$key]))
                                <div class="panel mx-auto">
                                    {!! render_image_markup_by_attachment_id($data['repeater_data']['repeater_image_'][$key], '', 'full', false) !!}
                                </div>
                            @endif
                            <h3 class="h6 lg:h5 m-0 dark:text-white">{{ $data['repeater_data']['repeater_title_'][$key] }}</h3>
                            @if(!empty($data['repeater_data']['repeater_subtitle_'][$key]))
                                <p class="fs-6 opacity-70">{{ $data['repeater_data']['repeater_subtitle_'][$key] }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>


{{-- Lexend v4 Breadcrumb Area - Empty by default, only shows if page has breadcrumb enabled --}}
@if((in_array(request()->route()->getName(),['landlord.homepage','landlord.dynamic.page']) && isset($page_post) && $page_post->breadcrumb == 1 ))
    {{-- Breadcrumb can be added here if needed in future --}}
@endif


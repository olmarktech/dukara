@php
    // Pre-render PageBuilder content BEFORE entering sections to avoid section stack corruption
    $pageBuilderOutput = '';
    if (isset($page_post) && $page_post && $page_post->page_builder == 1) {
        $pageBuilderOutput = \Plugins\PageBuilder\PageBuilderSetup::render_frontend_pagebuilder_content_for_dynamic_page('dynamic_page', $page_post->id);
        // Sanitize any stray Blade directives
        $pageBuilderOutput = preg_replace('/@endsection\s*/', '', $pageBuilderOutput);
        $pageBuilderOutput = preg_replace('/@section\s*\([^)]+\)\s*/', '', $pageBuilderOutput);
    }
@endphp

@extends('themes.lexend-v4.layouts.app')

@section('page-title', $page_post->title ?? '')

@section('content')
    {{-- Render Page Builder Content --}}
    @if(isset($page_post) && $page_post && $page_post->page_builder == 1)
        @if(isset($page_post->visibility) && $page_post->visibility == 1)
            @if(auth('web')->check())
                {{-- Output pre-rendered PageBuilder content --}}
                {!! $pageBuilderOutput !!}
            @else
                <div class="section panel overflow-hidden">
                    <div class="section-outer panel py-6 lg:py-9">
                        <div class="container max-w-xl">
                            <div class="alert alert-warning text-center">
                                <p><a class="uc-link text-primary" href="{{route('landlord.user.login')}}">{{__('Login')}}</a> {{__('to see this page')}} </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @else
            {{-- Output pre-rendered PageBuilder content --}}
            {!! $pageBuilderOutput !!}
        @endif
    @elseif(isset($page_post) && $page_post)
        {{-- Regular Page Content --}}
        <div class="section panel overflow-hidden">
            <div class="section-outer panel py-6 lg:py-9">
                <div class="container max-w-xl">
                    <div class="section-inner panel">
                        @if(isset($page_post->visibility) && $page_post->visibility == 1)
                            @if(auth('web')->check())
                                <div class="dynamic-page-content-wrap">
                                    {!! $page_post->page_content ?? '' !!}
                                </div>
                            @else
                                <div class="alert alert-warning text-center">
                                    <p><a class="uc-link text-primary" href="{{route('landlord.user.login')}}">{{__('Login')}}</a> {{__('to see this page')}} </p>
                                </div>
                            @endif
                        @else
                            <div class="dynamic-page-content-wrap">
                                {!! $page_post->page_content ?? '' !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(isset($page_post) && Auth::guard('admin')->user())
        @include('tenant.frontend.partials.inpage-edit',['page_post' => $page_post])
    @endif
@endsection


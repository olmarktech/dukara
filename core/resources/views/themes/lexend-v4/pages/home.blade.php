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

@section('page-title', get_static_option('site_title'))

@section('content')
    {{-- Check for existing page builder content first --}}
    @if(isset($page_post) && $page_post && $page_post->page_builder == 1)
        {{-- Output pre-rendered PageBuilder content --}}
        {!! $pageBuilderOutput !!}
    @else
        {{-- Show setup message when no page builder content exists --}}
        <div class="container py-5">
            <div class="alert alert-info text-center">
                <h4>🎨 Lexend-v4 Theme Homepage</h4>
                <p><strong>Status:</strong> Page builder widgets are created but not yet configured.</p>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <h5>✅ Available Widgets:</h5>
                        <ul class="list-unstyled text-start">
                            <li>🎯 Hero Header (Index-13)</li>
                            <li>🏢 Brands Section</li>
                            <li>⭐ Main Features</li>
                            <li>🔑 Key Features</li>
                            <li>💰 Pricing Plans</li>
                            <li>👥 Client Testimonials</li>
                            <li>❓ FAQ Section</li>
                            <li>📝 Blog Posts</li>
                            <li>📢 CTA Section</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5>🚀 To Add Content:</h5>
                        <ol class="text-start">
                            <li>Login to admin panel</li>
                            <li>Go to Pages → Page Builder</li>
                            <li>Select homepage to edit</li>
                            <li>Add desired widgets</li>
                            <li>Configure content & save</li>
                        </ol>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="/admin" class="btn btn-primary btn-lg me-2">Go to Admin Panel</a>
                    <span class="text-muted">Login required to configure homepage</span>
                </div>
            </div>
        </div>
    @endif
@endsection

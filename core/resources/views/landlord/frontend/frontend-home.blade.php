@php
    $pageBuilderContent = isset($page_post) 
        ? \Plugins\PageBuilder\PageBuilderSetup::render_frontend_pagebuilder_content_for_dynamic_page('dynamic_page', $page_post->id)
        : '';
@endphp
@extends('landlord.frontend.frontend-page-master')
@section('content')
    {!! $pageBuilderContent !!}
@endsection

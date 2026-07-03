@extends(route_prefix().'admin.admin-master')
@section('title') {{__('Edit With Page Builder')}} @endsection
@section('style')
    <x-media-upload.css/>
    <x-summernote.css/>
    <x-pagebuilder::css/>
    <link rel="stylesheet" href="{{global_asset('assets/common/css/fontawesome-iconpicker.min.css')}}">
    <link href="{{ global_asset('assets/landlord/admin/css/nice-select.css') }}" rel="stylesheet">

    <style>
        .attachment-preview {
            overflow: hidden;
        }
        .attachment-preview .thumbnail .centered {
            position: absolute;
            top: 0;
            left: 0;
            transform: translate(50%, 50%);
            width: 100%;
            height: 100%;
        }
        .attachment-preview .thumbnail .centered img {
            object-fit: contain;
        }
        
        /* Page Builder Sticky Drop Zone */
        .page-builder-left-col .card {
            position: sticky;
            top: 80px;
            max-height: calc(100vh - 120px);
            overflow-y: auto;
        }
        
        /* Widgets List Scrollable */
        .page-builder-right-col .all-addons-wrapper {
            max-height: calc(100vh - 250px);
            overflow-y: auto;
            padding-right: 5px;
        }
        
        /* Custom scrollbar for widgets list */
        .page-builder-right-col .all-addons-wrapper::-webkit-scrollbar {
            width: 6px;
        }
        .page-builder-right-col .all-addons-wrapper::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }
        .page-builder-right-col .all-addons-wrapper::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 3px;
        }
        .page-builder-right-col .all-addons-wrapper::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        
        /* Widgets list sticky header */
        .page-builder-right-col .search-wrap {
            position: sticky;
            top: 0;
            background: #fff;
            z-index: 10;
            padding-bottom: 10px;
            margin-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
    </style>
@endsection
@section('content')
    <div class="col-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <x-admin.header-wrapper>
                    <x-slot name="left">
                        <h4 class="card-title mb-4">{{$page->title}} <br> <small class="text-small">{{__('Edit With Page Builder')}}</small></h4>
                    </x-slot>
                    <x-slot name="right" class="d-flex">
                        <x-link-with-popover url="{{route(route_prefix().'admin.pages')}}" extraclass="ml-3">
                            {{__('All Pages')}}
                        </x-link-with-popover>
                        <x-link-with-popover  class="info" target="_blank" url="{{route(route_prefix().'dynamic.page', $page->slug)}}" popover="{{__('view item in frontend')}}">
                            <i class="mdi mdi-eye"></i>
                        </x-link-with-popover>
                        <x-link-with-popover url="{{route(route_prefix().'admin.pages.edit', $page->id)}}">
                            <i class="mdi mdi-pencil"></i>
                        </x-link-with-popover>

                    </x-slot>
                </x-admin.header-wrapper>

            </div>
        </div>
    </div>
   <div class="row g-4">
       <div class="col-lg-8 page-builder-left-col">
           <div class="card">
               <div class="card-body">
                   <x-pagebuilder::draggable location="dynamic_page" :page="$page"/>
               </div>
           </div>
       </div>
       <div class="col-lg-4 page-builder-right-col">
           <div class="card">
               <div class="card-body">
                   <h5 class="card-title mb-3">{{__('Available Widgets')}}</h5>
                   <x-pagebuilder::widgets type="landlord"/>
               </div>
           </div>
       </div>
   </div>
    <x-media-upload.markup/>
@endsection

@section('scripts')
    <script src="{{global_asset('assets/common/js/fontawesome-iconpicker.min.js')}}"></script>
    <script src="{{global_asset('assets/common/js/jquery.nice-select.min.js')}}"></script>
    <x-media-upload.js/>
    <x-summernote.js/>
    <x-pagebuilder::js/>
    <x-pagebuilder::script :page="$page"/>
    <script>
        $(document).ready(function(){

        });
    </script>
@endsection

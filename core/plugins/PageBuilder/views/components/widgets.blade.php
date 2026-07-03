<div class="search-wrap">
    <div class="form-group">
        <input type="text" class="form-control" id="search_addon_field" placeholder="{{__('Search Addon...')}}" name="s">
    </div>
    <div class="widget-filter-buttons mt-2 mb-2" style="display: flex; flex-wrap: wrap; gap: 5px;">
        <button type="button" class="btn btn-sm btn-outline-primary widget-filter active" data-filter="all">{{__('All')}}</button>
        <button type="button" class="btn btn-sm btn-outline-success widget-filter" data-filter="home">{{__('Home')}}</button>
        <button type="button" class="btn btn-sm btn-outline-info widget-filter" data-filter="about">{{__('About')}}</button>
        <button type="button" class="btn btn-sm btn-outline-warning widget-filter" data-filter="blog">{{__('Blog')}}</button>
        <button type="button" class="btn btn-sm btn-outline-secondary widget-filter" data-filter="contact">{{__('Contact')}}</button>
    </div>
</div>
<div class="all-addons-wrapper">
    <ul id="sortable_02" class="available-form-field all-widgets sortable_02">
        @if(isset($type) && $type === 'tenant')
            {!! \Plugins\PageBuilder\PageBuilderSetup::get_tenant_admin_panel_widgets() !!}
        @else
            {!! \Plugins\PageBuilder\PageBuilderSetup::get_admin_panel_widgets() !!}
        @endif
    </ul>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Widget filter buttons
    const filterButtons = document.querySelectorAll('.widget-filter');
    const widgets = document.querySelectorAll('.all-widgets .draggable-list-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active button
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const filter = this.dataset.filter.toLowerCase();
            
            widgets.forEach(widget => {
                const title = widget.textContent.toLowerCase();
                if (filter === 'all') {
                    widget.style.display = '';
                } else if (title.includes(filter) || title.includes(filter.replace('home', 'page'))) {
                    widget.style.display = '';
                } else {
                    widget.style.display = 'none';
                }
            });
        });
    });
});
</script>

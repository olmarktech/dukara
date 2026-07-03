<footer class="footer">
    <div class="container-fluid d-flex justify-content-between">
        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">
            <?php echo get_footer_copyright_text(); ?>

        </span>
        <span
            class="float-none float-sm-end mt-1 mt-sm-0 text-end"> v- <strong><?php echo e(get_static_option_central('get_script_version')); ?></strong></span>
    </div>
</footer>
</div>
</div>
</div>

<script src="<?php echo e(global_asset('assets/landlord/admin/js/vendor.bundle.base.js')); ?>"></script>
<script src="<?php echo e(global_asset('assets/landlord/admin/js/hoverable-collapse.js')); ?>"></script>
<script src="<?php echo e(global_asset('assets/landlord/admin/js/off-canvas.js')); ?>"></script>
<script src="<?php echo e(global_asset('assets/landlord/admin/js/misc.js')); ?>"></script>
<script src="<?php echo e(global_asset('assets/landlord/common/js/axios.min.js')); ?>"></script>
<script src="<?php echo e(global_asset('assets/landlord/common/js/sweetalert2.js')); ?>"></script>
<script src="<?php echo e(global_asset('assets/common/js/flatpickr.js')); ?>"></script>
<?php if (isset($component)) { $__componentOriginal30bb559a33b9a95b079bbaf738e327d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal30bb559a33b9a95b079bbaf738e327d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flatpicker.flatpickr-locale','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flatpicker.flatpickr-locale'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal30bb559a33b9a95b079bbaf738e327d7)): ?>
<?php $attributes = $__attributesOriginal30bb559a33b9a95b079bbaf738e327d7; ?>
<?php unset($__attributesOriginal30bb559a33b9a95b079bbaf738e327d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal30bb559a33b9a95b079bbaf738e327d7)): ?>
<?php $component = $__componentOriginal30bb559a33b9a95b079bbaf738e327d7; ?>
<?php unset($__componentOriginal30bb559a33b9a95b079bbaf738e327d7); ?>
<?php endif; ?>
<script src="<?php echo e(global_asset('assets/common/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(global_asset('assets/common/js/toastr.min.js')); ?>"></script>
<script src="<?php echo e(global_asset('assets/common/js/fontawesome-iconpicker.min.js')); ?>"></script>
<script src="<?php echo e(global_asset('assets/landlord/admin/js/jquery.nice-select.min.js')); ?>"></script>
<script>
    function translatedDataTable() {
        return {
            "decimal": "",
            "emptyTable": "<?php echo e(__('No data available in table')); ?>",
            "info": "<?php echo e(__('Showing')); ?> _START_ <?php echo e(__('to')); ?> _END_ <?php echo e(__('of')); ?> _TOTAL_ <?php echo e(__('entries')); ?>",
            "infoEmpty": "<?php echo e(__('Showing')); ?> 0 <?php echo e(__('to')); ?> 0 <?php echo e(__('of')); ?> 0 <?php echo e(__('entries')); ?>",
            "infoFiltered": "(<?php echo e(__('filtered from')); ?> _MAX_ <?php echo e(__('total entries')); ?>)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "<?php echo e(__('Show')); ?> _MENU_ <?php echo e(__('entries')); ?>",
            "loadingRecords": "<?php echo e(__('Loading...')); ?>",
            "processing": "",
            "search": "<?php echo e(__('Search:')); ?>",
            "zeroRecords": "<?php echo e(__('No matching records found')); ?>",
            "paginate": {
                "first": "<?php echo e(__('First')); ?>",
                "last": "<?php echo e(__('Last')); ?>",
                "next": "<?php echo e(__('Next')); ?>",
                "previous": "<?php echo e(__('Previous')); ?>"
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }
    }

    (function ($) {
        "use strict";

        $(document).ready(function ($) {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })

            $("body").tooltip({selector: '[data-bs-toggle=tooltip]'});
            $('select.select2').select2();

            $(document).on('click', '.swal_delete_button', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: '<?php echo e(__("Are you sure?")); ?>',
                    text: '<?php echo e(__("You would not be able to revert this item!")); ?>',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#1F51FF',
                    cancelButtonColor: '#D2042D',
                    confirmButtonText: "<?php echo e(__('Yes, Accept it!')); ?>",
                    cancelButtonText: "<?php echo e(__('Cancel')); ?>",

                }).then((result) => {
                    if (result.isConfirmed) {
                        let el = $(this);
                        el.removeClass('swal_delete_button btn-danger');
                        el.addClass('btn-secondary');

                        $(this).next().find('.swal_form_submit_btn').trigger('click');
                    }
                });
            });

            $(document).on('click', '.swal_change_language_button', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: '<?php echo e(__("Are you sure to make this language as a default language?")); ?>',
                    text: '<?php echo e(__("Languages will be turn changed as default")); ?>',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#1F51FF',
                    cancelButtonColor: '#D2042D',
                    confirmButtonText: "<?php echo e(__('Yes, Accept it!')); ?>",
                    cancelButtonText: "<?php echo e(__('Cancel')); ?>",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).next().find('.swal_form_submit_btn').trigger('click');
                    }
                });
            });

            $(document).on('click', '.swal_change_approve_payment_button', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: '<?php echo e(__("Are you sure to approve this payment?")); ?>',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#00ce90',
                    cancelButtonColor: '#D2042D',
                    confirmButtonText: "<?php echo e(__('Yes, Accept it!')); ?>",
                    cancelButtonText: "<?php echo e(__('Cancel')); ?>",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).next().find('.swal_form_submit_btn').trigger('click');
                    }
                });
            });

            $(document).on('click', '.close', function (e) {
                $('.alert').hide();
            });

            // search bar ==== filtering menu and sub menu
            $(document).ready(function () {
                const $search = $('#menuSearch');
                const $noResults = $('#noResults');

                // Selector map
                const selectors = {
                    item: '.nav-item, .menu-item',
                    title: '.menu-title, .menu-section',
                    submenu: '.sub-menu, .collapse > ul.nav', // tenant submenu is inside collapse > ul.nav
                    collapse: '.collapse, .menu-sub-dropdown'
                };

                $search.on('input', function () {
                    const term = $(this).val().toLowerCase().trim();
                    let hasAnyMatch = false;

                    if (!term) {
                        $(selectors.item).show();
                        $(selectors.collapse).removeClass('show');
                        $noResults.addClass('d-none');
                        return;
                    }

                    $(selectors.item).each(function () {
                        const $item = $(this);

                        if ($item.find('#menuSearch').length) return;

                        const $title = $item.find(selectors.title).first();
                        if (!$title.length) return;

                        const text = $title.text().toLowerCase();
                        const isMatch = text.includes(term);

                        const $submenu = $item.children(selectors.collapse).find('ul.nav').first();
                        const hasChildren = $submenu.length && $submenu.find(selectors.item).length > 0;

                        if (hasChildren) {
                            let childHasMatch = false;

                            $submenu.find(selectors.item).each(function () {
                                const $child = $(this);
                                const childText = $child.find(selectors.title).first().text().toLowerCase();

                                if (childText.includes(term)) {
                                    $child.show();
                                    childHasMatch = true;
                                    hasAnyMatch = true;
                                } else {
                                    $child.hide();
                                }
                            });

                            if (isMatch || childHasMatch) {
                                $item.show().children(selectors.collapse).addClass('show');
                                hasAnyMatch = true;
                            } else {
                                $item.hide();
                            }
                        } else {
                            if (isMatch) {
                                $item.show();
                                hasAnyMatch = true;
                            } else {
                                $item.hide();
                            }
                        }
                    });

                    if (!hasAnyMatch) {
                        $noResults.removeClass('d-none');
                    } else {
                        $noResults.addClass('d-none');
                    }
                });

                $search.on('keydown', function (e) {
                    if (e.key === 'Escape') {
                        $(this).val('').trigger('input');
                    }
                });
            });
        });
    })(jQuery);
</script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/landlord/admin/partials/footer.blade.php ENDPATH**/ ?>
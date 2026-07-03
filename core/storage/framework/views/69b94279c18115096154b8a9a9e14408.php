<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="<?php echo e(route('landlord.admin.home')); ?>">
            <?php
                $logo_type = !empty(get_static_option('dark_mode_for_admin_panel')) ? 'site_white_logo' : 'site_logo';
            ?>
            <?php echo render_image_markup_by_attachment_id(get_static_option($logo_type)); ?>


        </a>
        <a class="navbar-brand brand-logo-mini" href="<?php echo e(route('landlord.admin.home')); ?>">
            <?php echo render_image_markup_by_attachment_id(get_static_option('site_favicon')); ?>

        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <div class="align-self-center d-flex gap-3">
            <button class="navbar-toggler navbar-toggler " type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>



        </div>

        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <div class="nav-profile-img">
                        <?php
                            if (auth('admin')->user()->image != null)
                            {
                                $image_id = auth('admin')->user()->image;
                            } else {
                                $image_id = get_static_option('placeholder_image');
                            }
                        ?>

                        <?php if($image_id != null): ?>
                            <?php echo render_image_markup_by_attachment_id($image_id,'','full',true); ?>

                        <?php else: ?>
                            <img src="<?php echo e(asset('assets/landlord/uploads/media-uploader/no-image.jpg')); ?>" alt="">
                        <?php endif; ?>
                        <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black"><?php echo e(auth('admin')->user()->name); ?></p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="<?php echo e(route('landlord.admin.tenant.activity.log')); ?>">
                        <i class="mdi mdi-cached me-2 text-success"></i> <?php echo e(__('Activity Log')); ?>

                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo e(route('landlord.admin.edit.profile')); ?>">
                        <i class="mdi mdi-account-settings me-2 text-success"></i> <?php echo e(__('Edit Profile')); ?>

                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo e(route('landlord.admin.change.password')); ?>">
                        <i class="mdi mdi-key me-2 text-success"></i> <?php echo e(__('Change Password')); ?>

                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"
                       onclick="event.preventDefault();
                           document.getElementById('tenanat_logout_submit_btn').dispatchEvent(new MouseEvent('click'));">
                        <i class="mdi mdi-logout me-2 text-primary"></i>
                        <?php echo e(__('Signout')); ?>

                        <form id="logout-form" action="<?php echo e(route('landlord.admin.logout')); ?>" method="POST"
                              class="d-none">
                            <?php echo csrf_field(); ?>
                            <button class="d-none" type="submit" id="tenanat_logout_submit_btn"></button>
                        </form>
                    </a>
                </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
                <a class="nav-link">
                    <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                </a>
            </li>


            <?php if(isPluginActive('Blog')): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-bell"></i>
                        <?php
                            $comments = $new_comments->where('status', 'unread')?->count();
                        ?>
                        <?php if($comments > 0): ?>
                            <span class="count-symbol bg-warning"></span>
                        <?php endif; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                         aria-labelledby="messageDropdown">

                        <h6 class="p-3 mb-0"><?php echo e($comments. ' '.  __('Unread Comments')); ?>  </h6>
                        <div class="dropdown-divider"></div>

                        <?php $__currentLoopData = $new_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="dropdown-item preview-item"
                               href="<?php echo e(route(route_prefix().'admin.blog.comments.view', $comment->blog_id)); ?>">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="mdi mdi-bell text-white"></i>
                                    </div>
                                </div>

                                <div
                                    class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject mb-1 font-weight-normal"><?php echo e(__('You have new comment in your blog' )); ?>

                                        <strong><?php echo e(Str::words($comment->blog?->title)); ?></strong></h6>
                                    <p class="text-gray mb-0"> <?php echo e($comment->created_at->diffForHumans() . ' '); ?>  <?php if($comment->status == 'unread'): ?>
                                            <small class="mt-1 text-danger"><?php echo e('('.__('New' .')')); ?></small>
                                        <?php endif; ?></p>
                                </div>
                                <div class="dropdown-divider"></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <h6 class="p-3 mb-0 text-center"><a
                                        href="<?php echo e(route(route_prefix().'admin.blog')); ?>"><?php echo e(__('See All')); ?></a>
                                </h6>
                            </a>
                    </div>

                </li>
            <?php endif; ?>


            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-email-outline"></i>
                    <?php if($new_message): ?>
                        <span class="count-symbol bg-warning"></span>
                    <?php endif; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                     aria-labelledby="messageDropdown">

                    <h6 class="p-3 mb-0"><?php echo e($new_message. ' '.  __('Messages')); ?>  </h6>
                    <div class="dropdown-divider"></div>

                    <?php $__currentLoopData = $all_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <a class="dropdown-item preview-item"
                           href="<?php echo e(route(route_prefix().'admin.contact.message.view', $message->id)); ?>">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="las la-envelope"></i>
                                </div>
                            </div>
                            <?php
                                $fields = json_decode($message->fields,true);
                            ?>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject mb-1 font-weight-normal"><?php echo e(__('You have message from').' '); ?>

                                    <strong><?php echo e(optional($message->form)->title); ?></strong></h6>
                                <p class="text-gray mb-0"> <?php echo e($message->created_at->diffForHumans() . ' '); ?>  <?php if($message->status === 1): ?>
                                        <small class="mt-1 text-danger"><?php echo e('('.__('New' .')')); ?></small>
                                    <?php endif; ?></p>
                            </div>
                            <div class="dropdown-divider"></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <h6 class="p-3 mb-0 text-center"><a
                                    href="<?php echo e(route(route_prefix().'admin.contact.message.all')); ?>"><?php echo e(__('Seel All')); ?></a>
                            </h6>
                        </a>
                </div>
            </li>

            <?php $healthHelper = app('App\Helpers\SiteHealthHelper'); ?>

            <li class="nav-item nav-logout d-none d-lg-block mx-2">
                <a class="btn <?php echo e($healthHelper->getWarning() ? 'btn-danger site-health-btn' : 'btn-success'); ?> btn-icon-text"
                   href="<?php echo e(route('landlord.admin.health') ?? ''); ?>">
                    <i class="mdi mdi-stethoscope"></i> <?php echo e(__('Health')); ?>

                </a>
            </li>

            <li class="nav-item nav-logout d-none d-lg-block">
                <a class="btn btn-outline-danger btn-icon-text" href="<?php echo e(route('landlord.homepage')); ?>" target="_blank">
                    <i class="mdi mdi-upload btn-icon-prepend"></i> <?php echo e(__('Visit Site')); ?>

                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
<?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/landlord/admin/partials/topbar.blade.php ENDPATH**/ ?>
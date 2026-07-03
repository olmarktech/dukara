<?php $__env->startSection('title'); ?> <?php echo e(__('Edit Profile')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginal7fac50de8732a105d465a52d4f15962a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7fac50de8732a105d465a52d4f15962a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media-upload.css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('media-upload.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7fac50de8732a105d465a52d4f15962a)): ?>
<?php $attributes = $__attributesOriginal7fac50de8732a105d465a52d4f15962a; ?>
<?php unset($__attributesOriginal7fac50de8732a105d465a52d4f15962a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7fac50de8732a105d465a52d4f15962a)): ?>
<?php $component = $__componentOriginal7fac50de8732a105d465a52d4f15962a; ?>
<?php unset($__componentOriginal7fac50de8732a105d465a52d4f15962a); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5"><?php echo e(__('Edit Profile')); ?></h4>

                <?php if (isset($component)) { $__componentOriginal8b6fcedff2ec1fbf29bfef12ce3dc2e6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b6fcedff2ec1fbf29bfef12ce3dc2e6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.error-msg','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('error-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8b6fcedff2ec1fbf29bfef12ce3dc2e6)): ?>
<?php $attributes = $__attributesOriginal8b6fcedff2ec1fbf29bfef12ce3dc2e6; ?>
<?php unset($__attributesOriginal8b6fcedff2ec1fbf29bfef12ce3dc2e6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8b6fcedff2ec1fbf29bfef12ce3dc2e6)): ?>
<?php $component = $__componentOriginal8b6fcedff2ec1fbf29bfef12ce3dc2e6; ?>
<?php unset($__componentOriginal8b6fcedff2ec1fbf29bfef12ce3dc2e6); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalef2154c4b1054a3a28aacfea8e05a555 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalef2154c4b1054a3a28aacfea8e05a555 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flash-msg','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flash-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalef2154c4b1054a3a28aacfea8e05a555)): ?>
<?php $attributes = $__attributesOriginalef2154c4b1054a3a28aacfea8e05a555; ?>
<?php unset($__attributesOriginalef2154c4b1054a3a28aacfea8e05a555); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalef2154c4b1054a3a28aacfea8e05a555)): ?>
<?php $component = $__componentOriginalef2154c4b1054a3a28aacfea8e05a555; ?>
<?php unset($__componentOriginalef2154c4b1054a3a28aacfea8e05a555); ?>
<?php endif; ?>

                <form class="forms-sample" method="post"
                      action="<?php echo e(route(route_prefix().'admin.edit.profile')); ?>"
                >
                    <?php echo csrf_field(); ?>
                    <?php if (isset($component)) { $__componentOriginal6da8ce6af6b5496547056e4107843dfe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6da8ce6af6b5496547056e4107843dfe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.fields.input','data' => ['label' => __('Name'),'name' => 'name','value' => auth('admin')->user()->name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('fields.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Name')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('name'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(auth('admin')->user()->name)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6da8ce6af6b5496547056e4107843dfe)): ?>
<?php $attributes = $__attributesOriginal6da8ce6af6b5496547056e4107843dfe; ?>
<?php unset($__attributesOriginal6da8ce6af6b5496547056e4107843dfe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6da8ce6af6b5496547056e4107843dfe)): ?>
<?php $component = $__componentOriginal6da8ce6af6b5496547056e4107843dfe; ?>
<?php unset($__componentOriginal6da8ce6af6b5496547056e4107843dfe); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal6da8ce6af6b5496547056e4107843dfe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6da8ce6af6b5496547056e4107843dfe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.fields.input','data' => ['label' => __('Email'),'name' => 'email','type' => 'email','value' => auth('admin')->user()->email]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('fields.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Email')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('email'),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('email'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(auth('admin')->user()->email)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6da8ce6af6b5496547056e4107843dfe)): ?>
<?php $attributes = $__attributesOriginal6da8ce6af6b5496547056e4107843dfe; ?>
<?php unset($__attributesOriginal6da8ce6af6b5496547056e4107843dfe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6da8ce6af6b5496547056e4107843dfe)): ?>
<?php $component = $__componentOriginal6da8ce6af6b5496547056e4107843dfe; ?>
<?php unset($__componentOriginal6da8ce6af6b5496547056e4107843dfe); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal6da8ce6af6b5496547056e4107843dfe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6da8ce6af6b5496547056e4107843dfe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.fields.input','data' => ['label' => __('Mobile'),'name' => 'mobile','value' => auth('admin')->user()->mobile]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('fields.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Mobile')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('mobile'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(auth('admin')->user()->mobile)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6da8ce6af6b5496547056e4107843dfe)): ?>
<?php $attributes = $__attributesOriginal6da8ce6af6b5496547056e4107843dfe; ?>
<?php unset($__attributesOriginal6da8ce6af6b5496547056e4107843dfe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6da8ce6af6b5496547056e4107843dfe)): ?>
<?php $component = $__componentOriginal6da8ce6af6b5496547056e4107843dfe; ?>
<?php unset($__componentOriginal6da8ce6af6b5496547056e4107843dfe); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalf720c0d41d4f37ace65165768a4b0bbb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf720c0d41d4f37ace65165768a4b0bbb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.fields.media-upload','data' => ['name' => 'image','title' => ''.e(__('Image')).'','id' => auth('admin')->user()->image]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('fields.media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'image','title' => ''.e(__('Image')).'','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(auth('admin')->user()->image)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf720c0d41d4f37ace65165768a4b0bbb)): ?>
<?php $attributes = $__attributesOriginalf720c0d41d4f37ace65165768a4b0bbb; ?>
<?php unset($__attributesOriginalf720c0d41d4f37ace65165768a4b0bbb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf720c0d41d4f37ace65165768a4b0bbb)): ?>
<?php $component = $__componentOriginalf720c0d41d4f37ace65165768a4b0bbb; ?>
<?php unset($__componentOriginalf720c0d41d4f37ace65165768a4b0bbb); ?>
<?php endif; ?>

                    <button type="submit" class="btn btn-gradient-primary me-2"><?php echo e(__('Save Changes')); ?></button>
                </form>
            </div>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginal633179910e77a57ad00e144f8f7d5146 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal633179910e77a57ad00e144f8f7d5146 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media-upload.markup','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('media-upload.markup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal633179910e77a57ad00e144f8f7d5146)): ?>
<?php $attributes = $__attributesOriginal633179910e77a57ad00e144f8f7d5146; ?>
<?php unset($__attributesOriginal633179910e77a57ad00e144f8f7d5146); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal633179910e77a57ad00e144f8f7d5146)): ?>
<?php $component = $__componentOriginal633179910e77a57ad00e144f8f7d5146; ?>
<?php unset($__componentOriginal633179910e77a57ad00e144f8f7d5146); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php if (isset($component)) { $__componentOriginalc307213ef58c3cc9572bb8dff626eab8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc307213ef58c3cc9572bb8dff626eab8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media-upload.js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('media-upload.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc307213ef58c3cc9572bb8dff626eab8)): ?>
<?php $attributes = $__attributesOriginalc307213ef58c3cc9572bb8dff626eab8; ?>
<?php unset($__attributesOriginalc307213ef58c3cc9572bb8dff626eab8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc307213ef58c3cc9572bb8dff626eab8)): ?>
<?php $component = $__componentOriginalc307213ef58c3cc9572bb8dff626eab8; ?>
<?php unset($__componentOriginalc307213ef58c3cc9572bb8dff626eab8); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make(route_prefix().'.admin.admin-master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/landlord/admin/auth/edit-profile.blade.php ENDPATH**/ ?>
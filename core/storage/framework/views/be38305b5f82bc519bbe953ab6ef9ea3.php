<?php $__env->startSection('title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(global_asset('assets/landlord/admin/css/update-info.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $healthHelper = app('App\Helpers\SiteHealthHelper'); ?>

    <?php if(!tenant() && $healthHelper->getIssues() > 0): ?>
        <div class="alert alert-danger bg-white rounded">
            <p><strong class="text-danger"> <?php echo e($healthHelper->issueMessage()); ?> </strong></p>
            <p><?php echo e(__('If all necessary server values are not configured correctly, it may affect the system’s functionality.')); ?>

                <a class="text-decoration-none" href="<?php echo e($healthHelper->getReadMore()['route']); ?>"><?php echo e($healthHelper->getReadMore()['text']); ?></a></p>
        </div>
    <?php endif; ?>

    <div class="col-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-xl-4 col-md-6 stretch-card">
                        <div class="card bg-gradient-danger card-img-holder text-white">
                            <div class="card-body">
                                <img src="<?php echo e(global_asset('assets/landlord/admin/images/circle.png')); ?>"
                                     class="card-img-absolute" alt="circle-image">
                                <h4 class="font-weight-bold mb-3"><?php echo e(__('Total Admins')); ?><i
                                            class="las la-user-shield mdi-24px float-right"></i>
                                </h4>
                                <h1 class="mb-5"><?php echo e($total_admin); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 stretch-card">
                        <div class="card bg-gradient-info card-img-holder text-white">
                            <div class="card-body">
                                <img src="<?php echo e(global_asset('assets/landlord/admin/images/circle.png')); ?>"
                                     class="card-img-absolute" alt="circle-image">
                                <h4 class="font-weight-bold mb-3"><?php echo e(__('Total Users')); ?><i
                                            class="las la-user-shield mdi-24px float-right"></i>
                                </h4>
                                <h1 class="mb-5"><?php echo e($total_user); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 stretch-card">
                        <div class="card bg-gradient-success card-img-holder text-white">
                            <div class="card-body">
                                <img src="<?php echo e(global_asset('assets/landlord/admin/images/circle.png')); ?>"
                                     class="card-img-absolute" alt="circle-image">
                                <h4 class="font-weight-bold mb-3"><?php echo e(__('Total Shops')); ?>

                                    <i class="mdi mdi-store mdi-24px float-right"></i>
                                </h4>
                                <h1 class="mb-5"><?php echo e($all_tenants); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 stretch-card">
                        <div class="card bg-gradient-info card-img-holder text-white">
                            <div class="card-body">
                                <img src="<?php echo e(global_asset('assets/landlord/admin/images/circle.png')); ?>"
                                     class="card-img-absolute" alt="circle-image">
                                <h4 class="font-weight-bold mb-3"><?php echo e(__('Total Testimonial')); ?> <i
                                            class="mdi mdi-diamond mdi-24px float-right"></i>
                                </h4>
                                <h1 class="mb-5"><?php echo e($total_testimonial); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 stretch-card">
                        <div class="card bg-gradient-primary card-img-holder text-white">
                            <div class="card-body">
                                <img src="<?php echo e(global_asset('assets/landlord/admin/images/circle.png')); ?>"
                                     class="card-img-absolute" alt="circle-image">
                                <h4 class="font-weight-bold mb-3"><?php echo e(__('Total Price Plan')); ?><i
                                            class="mdi mdi-diamond mdi-24px float-right"></i>
                                </h4>
                                <h1 class="mb-5"><?php echo e($total_price_plan); ?></h1>
                            </div>
                        </div>
                    </div>
                    <?php
                        $themes = getAllThemeSlug();
                    ?>
                    <div class="col-xl-4 col-md-6 stretch-card mt-3">
                        <div class="card bg-gradient-warning card-img-holder text-white">
                            <div class="card-body">
                                <img src="<?php echo e(global_asset('assets/landlord/admin/images/circle.png')); ?>"
                                     class="card-img-absolute" alt="circle-image">
                                <h4 class="font-weight-bold mb-3"><?php echo e(__('Total Theme')); ?> <i
                                            class="mdi mdi-diamond mdi-24px float-right"></i>
                                </h4>
                                <h1 class="mb-5"><?php echo e(count($themes)); ?></h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-6 col-sm-12 mt-5">
                        <div class="chart-wrapper margin-top-40">
                            <h2 class="chart-title"><?php echo e(__("Amount Per Month In")); ?> <?php echo e(date('Y')); ?></h2>
                            <canvas id="monthlyRaised" class="monthlyRaised"></canvas>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-sm-12 mt-5">
                        <div class="chart-wrapper margin-top-40">
                            <h2 class="chart-title"><?php echo e(__("Amount Per Day In Last 30Days")); ?></h2>
                            <div>
                                <canvas id="monthlyRaisedPerDay" class="monthlyRaisedPerDay"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-5">
                        <div class="recent_order_logs_wrap">
                            <h3 class=" text-center mb-4"><?php echo e(__('Recent Order Logs')); ?></h3>
                            <div class="recent_order_logs">
                                <table class="table table-bordered">
                                    <thead class="text-white" style="background-color: #b66dff">
                                    <tr>
                                        <th> <?php echo e(__('ID')); ?> </th>
                                        <th> <?php echo e(__('Order ID')); ?></th>
                                        <th> <?php echo e(__('User Name')); ?></th>
                                        <th> <?php echo e(__('Package Name')); ?></th>
                                        <th> <?php echo e(__('Price')); ?> </th>
                                        <th> <?php echo e(__('Subdomain')); ?> </th>
                                        <th> <?php echo e(__('Payment Status')); ?> </th>
                                        <th> <?php echo e(__('Order Status')); ?> </th>
                                        <th> <?php echo e(__('Created At')); ?> </th>
                                        <th> <?php echo e(__('Renewed At')); ?> </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $recent_order_logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key + 1); ?></td>
                                            <td><?php echo e($data->id ?? ''); ?></td>
                                            <td><?php echo e($data->name); ?></td>
                                            <td> <?php echo e($data->package_name); ?></td>
                                            <td><?php echo e(amount_with_currency_symbol($data->package_price)); ?></td>
                                            <td><?php echo e($data->tenant_id); ?></td>
                                            <?php
                                                $status = ['pending' => 'text-warning', 'complete' => 'text-success'];
                                            ?>
                                            <td class="<?php echo e($status[$data->payment_status]); ?> text-capitalize"><?php echo e($data->payment_status); ?></td>
                                            <td class="<?php echo e($data->status != 'trial' ? $status[$data->payment_status] : 'text-primary'); ?> text-capitalize"><?php echo e($data->status); ?></td>
                                            <td><?php echo e($data->created_at?->diffForHumans()); ?></td>
                                            <td><?php echo e($data->updated_at?->diffForHumans()); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->renderWhen(count($update_info) > 0,'landlord.admin.partials.update-info', $update_info, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1])); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/landlord/admin/js/update-info.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/common/js/chart.js')); ?>"></script>
    <script>
        $.ajax({
            url: '<?php echo e(route('landlord.admin.home.chart.data.month')); ?>',
            type: 'POST',
            async: false,
            data: {
                _token: "<?php echo e(csrf_token()); ?>"
            },
            success: function (data) {
                labels = data.labels;
                chartdata = data.data;
                new Chart(
                    document.getElementById('monthlyRaised'),
                    {
                        type: 'bar',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: '<?php echo e(__('Amount Received')); ?>',
                                backgroundColor: '#039cda',
                                borderColor: '#039cda',
                                data: chartdata,
                                barThickness: 15,
                                hoverBackgroundColor: '#fc3c68',
                                borderRadius: 5,
                                hoverBorderColor: '#fc3c68',
                                minBarLength: 50,
                                indexAxis: "x",
                                pointStyle: 'star',
                            }],
                        }
                    }
                );
            }
        });
        $.ajax({
            url: '<?php echo e(route('landlord.admin.home.chart.data.by.day')); ?>',
            type: 'POST',
            async: false,
            data: {
                _token: "<?php echo e(csrf_token()); ?>"
            },
            success: function (data) {
                labels = data.labels;
                chartdata = data.data;
                new Chart(
                    document.getElementById('monthlyRaisedPerDay'),
                    {
                        type: 'bar',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: '<?php echo e(__('Amount Received')); ?>',
                                backgroundColor: '#F86048',
                                borderColor: '#fd861d',
                                data: data.data,
                            }]
                        }
                    }
                );
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('landlord.admin.admin-master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/landlord/admin/admin-home.blade.php ENDPATH**/ ?>
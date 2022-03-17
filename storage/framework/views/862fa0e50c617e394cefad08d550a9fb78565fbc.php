

<?php $__env->startSection('title'); ?> Order List <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <main class="flex-shrink-0">
        <!-- Page Content-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="fw-bolder">Admin order overview dashboard</h1>
                    <!-- <a href="logout.html">Logout</a> -->
                </div>
                <div class="row gx-5">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Order Number</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Moving Date</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Order Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                            <th scope="row"><a href="<?php echo e(route('admin.order.detail', ['id' => $row->id])); ?>"><?php echo e($row->order_id); ?></a></th>
                            <td><?php echo e(date("m.d.Y", strtotime($row->created_at))); ?></td>
                            <td><?php echo e($row->date); ?></td>
                            <td><?php echo e($row->first_name); ?> <?php echo e($row->last_name); ?></td>
                            <td>Payment completed</td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td align="center" colspan="5">There are no any data.</p>
                            </tr>
                            <?php endif; ?>  
                        </tbody>
                        </table>
                </div>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\work\xampp\htdocs\Laravel\payment\resources\views/admin/pages/order/index.blade.php ENDPATH**/ ?>
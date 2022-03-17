<?php $__env->startSection('title'); ?> Modern Business - Start Bootstrap Template <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">
<style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <link href="<?php echo e(URL::asset('/assets/front/form-validation.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your order</span>
          <span class="badge bg-primary rounded-pill">1</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">No-parking zone basic</h6>
              <small class="text-muted">basic no parking zone</small>
            </div>
            <span class="text-muted">89,00 €</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><strong>Total</strong></h6>
              <small class="text-muted" style="font-size: 0.6rem; text-align: end;">contains 14,21 € VAT (19%)</small>
            </div>
            <input type="hidden" name="total_price" class="total-value" value="89">
            <strong class="total">89,00 €</strong>
        </ul>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">No Parking Zone Details</h4>
        <form class="needs-validation" action="<?php echo e(route('front.checkout_post_1')); ?>" method="POST" novalidate>
          <?php echo csrf_field(); ?>
          <div class="row g-3">
            <div class="col-12">
              <label for="installationdate" class="form-label">Date of the move</label>
              <input type="text" class="form-control" id="address" value="<?php echo e($order->date ?? ''); ?>"  placeholder="12.12.2022" name="date" required>
              <div class="invalid-feedback">
                Please enter your moving date
              </div>
            </div>
            
            <div class="col-md-12">
              <label for="duration" class="form-label">Duration</label>
              <select class="form-select" id="duration" name="duration" required >
                <?php $__currentLoopData = $duration; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($row['price']); ?>" <?php echo e($order?($order->duration?($row['price'] == $order->duration ? 'checked' : ''):''):''); ?>><?php echo e($row['desc']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
              </select>
              <div class="invalid-feedback">
                Please select a duration.
              </div>
            </div>

            <div class="col-md-12">
              <label for="length" class="form-label">Length of the no parking zone</label>
              <select class="form-select" id="length" name="length" required>
                <?php $__currentLoopData = $length; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($row['price']); ?>" <?php echo e($order?($order->length?($row['price'] == $order->length ? 'checked' : ''):''):''); ?>><?php echo e($row['desc']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
              </select>
              <div class="invalid-feedback">
                Please select a length.
              </div>
            </div>

          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to enter address</button>
        </form>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/front/form-validation.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/front/js/calc.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\work\xampp\htdocs\Laravel\payment\resources\views/front/pages/checkout/step1.blade.php ENDPATH**/ ?>
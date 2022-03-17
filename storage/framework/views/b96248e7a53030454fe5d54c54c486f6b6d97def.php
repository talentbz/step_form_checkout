<?php $__env->startSection('title'); ?> Modern Business - Start Bootstrap Template <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
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
<!-- Custom styles for this template -->
<link href="<?php echo e(URL::asset('/assets/front/form-validation.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="container mt-5">
  <main>

      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3"><i class="bi bi-bag-check"></i> Order completed</h4>

        <p>Order number: <?php echo e($order_id ? $order_id : ''); ?></p>

        <p>Thank you, we have received your order. We have sent you a confirmation by e-mail.</p>

        <p>Our team will process your order and install your no parking zone on time. If you have any questions, please do not hesitate to contact us. We wish you a stress-free move!</p>


    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2021 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/front/form-validation.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\work\xampp\htdocs\Laravel\payment\resources\views/front/pages/checkout/complete.blade.php ENDPATH**/ ?>
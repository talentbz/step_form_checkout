<?php $__env->startSection('title'); ?> Modern Business - Start Bootstrap Template <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
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
<link href="<?php echo e(URL::asset('/assets/front/css/stripe.css')); ?>" rel="stylesheet" type="text/css" />
<script src="https://js.stripe.com/v3/"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your order</span>
          <span class="badge bg-primary rounded-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">No-parking zone basic</h6>
              <small class="text-muted">basic no parking zone</small>
            </div>
            <span class="text-muted">89,00 €</span>
          </li>
          <?php if($duration_desc != '1 day' ): ?> 
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Duration extension</h6>
              <small class="text-muted"><?php echo e($duration_desc); ?></small>
            </div>
            <span class="text-muted"><?php echo e(number_format($order->duration, 2, ',', '')); ?> €</span>
          </li>
          <?php endif; ?>
          <?php if($length_desc != '7,5 Meters' ): ?> 
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Length extension</h6>
              <small class="text-muted"><?php echo e($length_desc); ?></small>
            </div>
            <span class="text-muted"><?php echo e(number_format($order->length, 2, ',', '')); ?> €</span>
          </li>
          <?php endif; ?>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><strong>Total</strong></h6>
              <small class="text-muted" style="font-size: 0.6rem; text-align: end;">contains <?php echo e(number_format(round(($price + $order->length + $order->duration)/100*19, 2), 2, ',', '')); ?> € VAT (19%)</small>
            </div>
            <strong><?php echo e(number_format(($price + $order->length + $order->duration), 2, ',', '')); ?> €</strong>
        </ul>

       <p style="text-align: center; font-size: 0.6rem;">For the permit, the authority will charge you directly 27€ fees.</p>

      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing details</h4>
        <form class="needs-validation"  action="<?php echo e(route('front.checkout_post_3')); ?>" method="POST" novalidate>
          <?php echo csrf_field(); ?>
          <div class="row g-3">
            <input type="hidden" name="order_id" value="<?php echo e(time()); ?>">
            <div class="col-12">
              <label for="address" class="form-label">Company name (optional)</label>
              <input type="text" class="form-control" id="company" placeholder="" name="company" required>
              <div class="invalid-feedback">
                Please enter your company name
              </div>
            </div>

            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" name="first_name" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" name="last_name" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>


            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email" required>
              <div class="invalid-feedback">
                Please enter a valid email address.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Phone <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" placeholder="phone number" name="phone">
              <div class="invalid-feedback">
                Please enter a valid phone number
              </div>
            </div>

          <hr class="my-4">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address">
            <label class="form-check-label" for="same-address">I accept the terms and conditions</label>
          </div>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="save-info">
            <label class="form-check-label" for="save-info">I am aware that my order is non-refundable.</label>
          </div>
          <hr class="my-4">
          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="payment" type="radio" class="form-check-input" checked  value="PayPal" required>
              <label class="form-check-label" for="credit">PayPal</label>
            </div>
            <div class="form-check">
              <input id="d_stripe" name="payment" type="radio" class="form-check-input" value="Credit Card (Stripe)" required>
              <label class="form-check-label" for="d_stripe">Stripe</label>
            </div>
          </div>
          <button class="w-100 btn btn-primary btn-lg" type="submit" id="order-confirm">Order now</button>
        </form>
        <form id="payment-form" class="col-12">
          <div id="payment-element">
              <!--Stripe.js injects the Payment Element-->
          </div>
          <button id="submit">
              <div class="spinner hidden" id="spinner"></div>
              <span id="button-text">Pay now</span>
          </button>
          <div id="payment-message" class="hidden"></div>
        </form>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
  stripe_url = "<?php echo e(route('front.stripe_credit')); ?>";
  complete_url = "<?php echo e(route('success.payment')); ?>"
  checkout_post = "<?php echo e(route('front.checkout_post_3')); ?>"
</script>
<script src="<?php echo e(URL::asset('assets/libs/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/front/form-validation.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/front/js/payment.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/front/js/stripe.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\work\xampp\htdocs\Laravel\payment\resources\views/front/pages/checkout/step3.blade.php ENDPATH**/ ?>
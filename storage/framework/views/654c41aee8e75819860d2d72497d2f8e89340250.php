
<?php $__env->startSection('title'); ?> Modern Business - Start Bootstrap Template <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <header class="py-5" style="background-color: #e8f5ff;">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-dark mb-2">No parking zone for your move in Münster</h1>
                        <p class="lead fw-normal text-dark-50 mb-4">You need space for your moving truck? Book a no parking zone in front of your house!</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="<?php echo e(route('front.checkout_1')); ?>">Book now</a>
                            <a class="btn btn-outline-dark btn-lg px-4" href="#!">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="https://assets.adac.de/image/upload/ar_16:9,c_fill,f_auto,g_auto,q_auto:eco,w_800/v1/ADAC-eV/KOR/Bilder/RF/halteverbot-absolut-2007_gr5qsj" alt="..." /></div>
            </div>
        </div>
    </header>
    <!-- Features section-->
    <section class="py-5" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">A no-parking zone for your moving truck</h2></div>
                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1 row-cols-md-2">
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-patch-check"></i></div>
                            <h2 class="h5">Including approval of the authority</h2>
                            <p class="mb-0">To setup a no-parking zone, you need the permission of the Public Order Office. We will apply for the required permit for you.</p>
                        </div>
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-signpost"></i></div>
                            <h2 class="h5">Installation of the signs in front of your house</h2>
                            <p class="mb-0">We install the no parking signs in front of your house on time and safely.</p>
                        </div>
                        <div class="col mb-5 mb-md-0 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-card-text"></i></div>
                            <h2 class="h5">Fulfillment of the documentation obligation</h2>
                            <p class="mb-0">You are required by law to document the installation of the signs. We fulfill the documentation obligation for you.</p>
                        </div>
                        <div class="col h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-shield-check"></i></div>
                            <h2 class="h5">Free liability insurance</h2>
                            <p class="mb-0">What happens if the sign falls over and causes damage? Our service includes free liability insurance.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial section-->
    <div class="py-5 bg-light">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-10 col-xl-7">
                    <div class="text-center">
                        <div class="fs-4 mb-4 fst-italic">"With a no parking zone, my move was quite easy. I could park my truck right in front of my house and didn't have to carry the heavy furniture far."</div>
                        <div class="d-flex align-items-center justify-content-center">
                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                            <div class="fw-bold">
                                Max Heinemann
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog preview section-->
    <section class="py-5">
        <div class="container px-5 my-5">
            
            <!-- Call to action-->
            <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                    <div class="mb-4 mb-xl-0">
                        <div class="fs-3 fw-bold text-white">Start your move with a no parking zone.</div>
                        <div class="text-white-50">Book a no parking zone for a stress-free move.</div>
                    </div>
                    <div class="ms-xl-4">

                        <a class="btn btn-light btn-lg" href="<?php echo e(route('front.checkout_1')); ?>" role="button">Book no-parking zone now</a>


                    </div>
                </div>
            </aside>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('front.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\work\xampp\htdocs\Laravel\payment\resources\views/front/pages/home/index.blade.php ENDPATH**/ ?>
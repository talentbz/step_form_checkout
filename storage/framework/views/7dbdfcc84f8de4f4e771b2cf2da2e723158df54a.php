<nav class="navbar navbar-expand-lg navbar-light bg-white" syle="border-bottom: 1px #dedede solid;">
    <div class="container px-5">
        <a class="navbar-brand" href="<?php echo e(route('front.home')); ?>"><img src="<?php echo e(URL::asset('/assets/front/assets/logoipsum.svg')); ?>"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('front.home')); ?>">Start</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('front.work')); ?>">So funktioniert's</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('front.price')); ?>">Preise</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('front.faq')); ?>">FAQ</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('front.contact')); ?>">Hilfe</a></li>
            </ul>
        </div>
    </div>
</nav><?php /**PATH E:\work\xampp\htdocs\Laravel\payment\resources\views/front/layouts/menu.blade.php ENDPATH**/ ?>


<?php $__env->startSection('css'); ?>
<script src="https://kit.fontawesome.com/ab4fa16bfb.js" crossorigin="anonymous"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Panel de control
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
        <path
            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
</svg>
<div class="pagetitle d-flex justify-content-between">
    <div>
        <h1>Panel de control</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Panel de control</li>
            </ol>
        </nav>
    </div>
    
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card pb-0">
                <div class="card-body" style="padding-top: 20px;">
                    <div id="contPruebaVida"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">

        <div class="text-center">

            <iframe width="856" height="480" src="https://www.youtube.com/embed/Fd4Mn4cCcCU?controls=0" title="UP MODEL 10" frameborder="0" allow="autoplay" allowfullscreen></iframe>

        </div>

        </div>

</section>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('preloader'); ?>
<div id="loader" class="loader">
    <h1></h1>
    <span></span>
    <span></span>
    <span></span>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<footer id="footer" class="footer">
    <div class="copyright" id="copyright">
    </div>
    <div class="credits">
        Todos los derechos reservados
    </div>
</footer>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/dashboard.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\soluciones\resources\views/dashboard/show.blade.php ENDPATH**/ ?>
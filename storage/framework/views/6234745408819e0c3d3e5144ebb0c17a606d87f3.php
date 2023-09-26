<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta name="theme-color" content="#01bbcc" />
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1" name="viewport">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?> | Administrador Up Trading</title>
    <meta content="" name="description">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/preloader.css')); ?>" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo e(asset('img/favicon.png')); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo e(asset('img/favicon.png')); ?>" type="image/x-icon">
    <link href="<?php echo e(asset('img/favicon.png')); ?>" rel="apple-touch-icon">
    <style>
        :root {
            touch-action: pan-x pan-y;
            height: 100%
        }
    </style>
    <?php echo $__env->yieldContent('css'); ?>
    <?php $config = (new \LaravelPWA\Services\ManifestService)->generate(); echo $__env->make( 'laravelpwa::meta' , ['config' => $config])->render(); ?>
</head>

<body>
    <?php echo $__env->yieldContent('preloader'); ?>

    <?php echo $__env->make('sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main id="main" class="main activee2">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-chevron-up"></i>
    </a>

    <?php echo $__env->yieldContent('footer'); ?>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/admin.js')); ?>"></script>
    <script src="<?php echo e(asset('js/preloader.js')); ?>"></script>
    <?php echo $__env->yieldContent('script'); ?>    
</body>

</html><?php /**PATH C:\laragon\www\soluciones\resources\views/index.blade.php ENDPATH**/ ?>
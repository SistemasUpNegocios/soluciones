<?php
    $traders = DB::table('traders')
        ->where('id', '100001')
        ->orderBy('id', 'DESC')
        ->get();
    $traders_data = DB::table('traders_data')->get();
    $valores_moneda = ['EURUSD', 'GBPUSD', 'AUDUSD', 'NZDUSD', 'USDCAD', 'USDCHF', 'USDJPY', 'EURGBP', 'EURAUD', 'EURNZD', 'GBPAUD', 'GBPNZD', 'AUDNZD', 'EURCAD', 'EURCHF', 'EURJPY', 'GBPCAD', 'GBPCHF', 'GBPJPY', 'AUDCAD', 'AUDCHF', 'AUDJPY', 'NZDCAD', 'NZDCHF', 'NZDJPY', 'CADCHF', 'CADJPY', 'CHFJPY'];
?>

<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="<?php echo e(url('/admin/dashboard')); ?>" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">Soluciones Uptrading</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn menu-pc" id="btntog"></i>
        <a class="navbar-toggler buttonNav" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
            aria-controls="offcanvasExample">
            <i class="bi bi-list toggle-sidebar-btn menu-cel" id="btntog"></i>
        </a>
    </div>


    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">

                <?php $foto = auth()->user()->foto_perfil; ?>

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="<?php echo e(asset("img/usuarios/$foto")); ?>" id="imgPerfilNav" alt="Foto de perfil"
                        class="rounded-circle profilephoto2">
                    <span id="nombreSide" class="d-none d-md-block dropdown-toggle ps-2">
                        <?php echo e(auth()->user()->nombre); ?>
                    </span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>
                            <?php echo e(auth()->user()->nombre); ?>
                        </h6>
                        <span>
                            Usuario administrador
                        </span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?php echo e(url('/admin/logout')); ?>">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Cerrar sesión</span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
    </nav>

</header>

<div class="sidebar-nav sidebar offcanvas offcanvas-start activee" tabindex="-1" id="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-heading">Menú</li>

        <li class="nav-item">
            <a class="<?php if(request()->is('admin/perfil')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                href="<?php echo e(URL::to('admin/perfil')); ?>">
                <i class="bi bi-person"></i>
                <span>Mi cuenta</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="<?php if(request()->is('/admin/dashboard')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                href="<?php echo e(url('/admin/dashboard')); ?>">
                <i class="bi bi-grid"></i>
                <span>Saldos</span>
            </a>
        </li>
        
         <li>
            <a class="<?php if(request()->is('/admin/portafoliosActivos')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                href="<?php echo e(url('/admin/portafoliosActivos')); ?>">
                <i class="bi bi-wallet2"></i>
                <span>Portafolios Activos</span>
            </a>
        </li>
        
          </li>
        
            <li class="nav-item">
            <a class="<?php if(request()->is('/admin/portafolioGraph')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                href="<?php echo e(url('/admin/portafolioGraph')); ?>">
               <i class="bi bi-distribute-horizontal"></i>
                <span>Gráfica Portafolios</span>
            </a>
        </li>
       
       
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#equitybalance-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart-line"></i><span>Equity/Balance</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="equitybalance-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <?php $__currentLoopData = $traders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trader): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a class="ps-2" href="/admin/equityBalance/<?php echo e($trader->id); ?>">
                            <i class="bi bi-circle"></i><span><?php echo e($trader->nombre); ?></span>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>

       
      
       
        
            <li class="nav-item">
            <a class="<?php if(request()->is('/admin/historicos')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                href="<?php echo e(url('/admin/historicos')); ?>">
             <i class="bi bi-bar-chart-steps"></i>
                <span>Históricos </span>
            </a>
        </li>
       
     

       
        
            <li class="nav-item">
            <a class="<?php if(request()->is('/admin/claveInversor')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                href="<?php echo e(url('/admin/claveInversor')); ?>">
             <i class="bi bi-envelope-plus"></i>
                <span>Solicitar clave inversor</span>
            </a>
        </li>
       


        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo e(url('/admin/logout')); ?>">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Cerrar sesión</span>
            </a>
        </li>
    </ul>
</div>
<?php /**PATH C:\laragon\www\soluciones\resources\views/sidebar.blade.php ENDPATH**/ ?>
<?php
    $traders = DB::table('traders')
        ->where('activado', 'activado')
        ->orderBy('id', 'DESC')
        ->get();
    $traders_data = DB::table('traders_data')->get();
    $valores_moneda = ['EURUSD', 'GBPUSD', 'AUDUSD', 'NZDUSD', 'USDCAD', 'USDCHF', 'USDJPY', 'EURGBP', 'EURAUD', 'EURNZD', 'GBPAUD', 'GBPNZD', 'AUDNZD', 'EURCAD', 'EURCHF', 'EURJPY', 'GBPCAD', 'GBPCHF', 'GBPJPY', 'AUDCAD', 'AUDCHF', 'AUDJPY', 'NZDCAD', 'NZDCHF', 'NZDJPY', 'CADCHF', 'CADJPY', 'CHFJPY'];
?>

<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="<?php echo e(url('/admin/dashboard')); ?>" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">Trader Software Up trading</span>
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
            <a class="<?php if(request()->is('/admin/traders')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                href="<?php echo e(url('/admin/traders')); ?>">
                <i class="bi bi-person-workspace"></i>
                <span>Panel de control</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="<?php if(request()->is('/admin/dashboard')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                href="<?php echo e(url('/admin/dashboard')); ?>">
                <i class="bi bi-grid"></i>
                <span>Saldos</span>
            </a>
        </li>
       
        
        <li class="nav-item">
            <a class="<?php if(request()->is('/admin/fundamentales')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                href="<?php echo e(url('/admin/fundamentales')); ?>">
                <i class="bi bi-graph-up"></i>
                <span>Fundamentales</span>
            </a>
        </li>
        
        

        <li class="nav-item">

            <a class="nav-link collapsed" data-bs-target="#live_sidebar" data-bs-toggle="collapse" href="#">
                <i class="bi bi-camera-video"></i><span>Transmisión</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="live_sidebar" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="<?php if(request()->is('/admin/transmision')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                        href="<?php echo e(url('/admin/transmision')); ?>">
                        <i class="bi bi-circle"></i>
                        <span>Agregar transmisión</span>
                    </a>
                </li>
                <li>
                    <a class="<?php if(request()->is('/admin/transmisionLive')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                        href="<?php echo e(url('/admin/transmisionLive')); ?>">
                        <i class="bi bi-circle"></i>
                        <span>Visualizar transmisión</span>
                    </a>
                </li>
            </ul>


        </li>


        

        


        

      

         

             
        <li class="nav-item">

            <a class="nav-link collapsed" data-bs-target="#botones" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart-steps"></i><span>Matriz</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="botones" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a class="<?php if(request()->is('/admin/botones')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                    href="<?php echo e(url('/admin/botones')); ?>">
                    <i class="bi bi-circle"></i>
                    <span>Equity</span>
                </a>
          
            </li>
            </ul>

          
        </li>

        <li class="nav-item">
            <a class="<?php if(request()->is('/admin/indexUSDCADCHF')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                href="<?php echo e(url('/admin/indexUSDCADCHF')); ?>">
                <i class="bi bi-currency-exchange"></i>
                <span>Index USD</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="<?php if(request()->is('/admin/indexUSD')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                href="<?php echo e(url('/admin/indexUSD')); ?>">
            <i class="bi bi-cone-striped"></i>
                <span>Index USD BETA</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="<?php if(request()->is('/admin/autorizacion')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                href="<?php echo e(url('/admin/autorizacion')); ?>">
                <i class="bi bi-shield-lock"></i>
                <span>Autorización S8A</span>
            </a>
        </li>

        



      
        


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tradersdata-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-table"></i><span>Traders Data Cierre</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tradersdata-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <?php $__currentLoopData = $traders_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trader): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(strlen($trader->Signal) > 0): ?>
                        <li>
                            <a class="ps-2" href="/admin/traders-data/<?php echo e($trader->id); ?>">
                                <i class="bi bi-circle"></i><span>Trader <?php echo e($trader->id); ?>

                                    (<?php echo e($trader->Signal); ?>)</span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
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
            <a class="<?php if(request()->is('/admin/market')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                href="<?php echo e(url('/admin/market')); ?>">
                <i class="bi bi-graph-down"></i>
                <span>Gráfica Market</span>
            </a>
        </li>


        


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#status-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-kanban"></i><span>Status</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="status-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="ps-2" href="/admin/status/99999">
                        <i class="bi bi-circle"></i><span>MAM</span>
                    </a>
                </li>
                <li>
                    <a class="ps-2" href="/admin/status/99998">
                        <i class="bi bi-circle"></i><span>POOL</span>
                    </a>
                </li>
                <li>
                    <a class="ps-2" href="/admin/status/99997">
                        <i class="bi bi-circle"></i><span>POOL II</span>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#status-magic-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-magic"></i><span>Magic Number</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="status-magic-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="ps-2" href="/admin/statusMagic/99999">
                        <i class="bi bi-circle"></i><span>MAM</span>
                    </a>
                </li>
                <li>
                    <a class="ps-2" href="/admin/statusMagic/99998">
                        <i class="bi bi-circle"></i><span>POOL I</span>
                    </a>
                </li>

                <li>
                    <a class="ps-2" href="/admin/statusMagic/99997">
                        <i class="bi bi-circle"></i><span>POOL II</span>
                    </a>
                </li>
            </ul>
        </li>


        

        

        

        


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#cleo-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-discord"></i><span>Cleo Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="cleo-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <?php $__currentLoopData = $valores_moneda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $moneda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a class="ps-2" href="/admin/cleo-data/<?php echo e($moneda); ?>">
                            <i class="bi bi-circle"></i><span><?php echo e($moneda); ?></span>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>

        <li class="nav-item">
            <a class="<?php if(request()->is('/admin/cleoTabla')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                href="<?php echo e(url('/admin/cleoTabla')); ?>">
                <i class="bi bi-discord"></i>
                <span>Cleo tabla</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="<?php if(request()->is('/admin/estudioLista')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                href="<?php echo e(url('/admin/estudioLista')); ?>">
                <i class="bi bi-list"></i>
                <span>Lista de estudios</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="<?php if(request()->is('/admin/estudio-data')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                href="<?php echo e(url('/admin/estudio-data')); ?>">
                <i class="bi bi-clipboard-data"></i>
                <span>Estudio Eficiencia</span>
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#control-status" data-bs-toggle="collapse" href="#">
                <i class="bi bi-clock"></i><span>Control</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="control-status" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="ps-2" href="/admin/bitacoraAcceso">
                        <i class="bi bi-circle"></i><span>Bitácora de accesos</span>
                    </a>
                </li>
                <li>
                    <a class="ps-2" href="/admin/historialCambios">
                        <i class="bi bi-circle"></i><span>Historial de cambios</span>
                    </a>
                </li>
            </ul>
        </li>

        

        

        

        <li class="nav-item">
            <a class="<?php if(request()->is('/admin/logs')): ?> nav-link <?php else: ?> nav-link collapsed <?php endif; ?>"
                href="<?php echo e(url('/admin/logs')); ?>">
                <i class="bi bi-book-half"></i>
                <span>Logs</span>
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
<?php /**PATH C:\laragon\www\traders\resources\views/sidebar.blade.php ENDPATH**/ ?>
<?php $__currentLoopData = $traders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trader): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        if ($trader->modificable == "activado"){
            $clase_modificable = "btn-primary";
            $icono_modificable = "bi bi-unlock-fill";
            $disabled = "";
        }else{
            $clase_modificable = "btn-warning";
            $icono_modificable = "bi bi-lock-fill";
            $disabled = "disabled";
        }

        if ($trader->activado == "activado"){
            $clase_activado = "btn-success";
            $icono_activado = "bi bi-check-lg";
        }else{
            $clase_activado = "btn-danger";
            $icono_activado = "bi bi-x-lg";
        }

        if ($trader->sl == "activado"){
            $clase_sl = "btn-success";
            $icono_sl = "bi bi-check-lg";
        }else{
            $clase_sl = "btn-danger";
            $icono_sl = "bi bi-x-lg";
        }

        if ($trader->tp == "activado"){
            $clase_tp = "btn-success";
            $icono_tp = "bi bi-check-lg";
        }else{
            $clase_tp = "btn-danger";
            $icono_tp = "bi bi-x-lg";
        }
    ?>

    <div class="row">
        <div class="pagetitle d-flex align-items-center">
            <h1><?php echo e($trader->nombre); ?></h1>
            <div class="ms-5">
                <?php if($trader->cleo == true): ?>                                        
                    <button class="btn btn-success">Cleo vivo <i class="bi bi-emoji-smile"></i></button>
                <?php else: ?>
                    <button class="btn btn-danger">Cleo apagado <i class="bi bi-emoji-frown"></i></button>                                        
                <?php endif; ?>
            </div>
        </div>
        <hr class="m-0 p-0 mb-2">
    </div>
    <div class="row mb-5">
        <div class="col-3 text-center">
            <div class="mb-1">Modificable</div>
            <button class="btn <?php echo e($clase_modificable); ?> editarStatusMod" style="width: 33%;" data-id="<?php echo e($trader->id); ?>">
                <i class="<?php echo e($icono_modificable); ?>"></i>
            </button>
        </div>
        <div class="col-3 text-center">
            <div class="mb-1">Activado</div>
            <button class="btn <?php echo e($clase_activado); ?> editarStatusAct" style="width: 33%;" data-id="<?php echo e($trader->id); ?>" <?php echo e($disabled); ?>>
                <i class="<?php echo e($icono_activado); ?>"></i>
            </button>
        </div>
        <div class="col-3 text-center">
            <div class="mb-1">SL</div>
            <button class="btn <?php echo e($clase_sl); ?> editarStatusSL" style="width: 33%;" data-id="<?php echo e($trader->id); ?>" <?php echo e($disabled); ?>>
                <i class="<?php echo e($icono_sl); ?>"></i>
            </button>
        </div>
        <div class="col-3 text-center">
            <div class="mb-1">TP</div>
            <button class="btn <?php echo e($clase_tp); ?> editarStatusTP" style="width: 33%;" data-id="<?php echo e($trader->id); ?>" <?php echo e($disabled); ?>>
                <i class="<?php echo e($icono_tp); ?>"></i>
            </button>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\laragon\www\traders\resources\views/traders/buttons.blade.php ENDPATH**/ ?>
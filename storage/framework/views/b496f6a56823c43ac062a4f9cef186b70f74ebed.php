<?php if($tipo_accion == 'Inserción'): ?>
    <span class="badge bg-primary"><i class="bi-plus-lg"></i> <?php echo e($tipo_accion); ?></span>
<?php elseif($tipo_accion == 'Actualización'): ?>
    <span class="badge bg-success"><i class="bi bi-pencil"></i> <?php echo e($tipo_accion); ?></span>
<?php elseif($tipo_accion == 'Eliminación'): ?>    
    <span class="badge bg-danger"><i class="bi bi-trash"></i> <?php echo e($tipo_accion); ?></span>
<?php endif; ?><?php /**PATH /home1/upnegoci/soluciones.uptradingexperts.com/resources/views/tablalogs/tipos.blade.php ENDPATH**/ ?>
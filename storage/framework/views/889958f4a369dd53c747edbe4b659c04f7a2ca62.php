

<?php if($profit > 0): ?>
    <div style="width: 100%; height: 100%;" class="bg-success text-white">
        <?php echo e($profit); ?>
    </div>
<?php elseif($profit < 0): ?>
<div style="width: 100%; height: 100%;" class="bg-danger text-white">
    <?php echo e($profit); ?>
</div>
<?php endif; ?><?php /**PATH C:\laragon\www\soluciones\resources\views/historicoOperaciones/profit.blade.php ENDPATH**/ ?>
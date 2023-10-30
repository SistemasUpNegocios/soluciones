



<?php if($profit > 0): ?>

    <div style="width: 100%; height: 100%;" class="bg-success text-white">

        <?php echo e(number_format($profit,2)); ?>


    </div>

<?php elseif($profit < 0): ?>

<div style="width: 100%; height: 100%;" class="bg-danger text-white">

    <?php echo e(number_format($profit,2)); ?>


</div>

<?php endif; ?><?php /**PATH C:\laragon\www\soluciones\resources\views/historicoOperaciones2023/profit.blade.php ENDPATH**/ ?>
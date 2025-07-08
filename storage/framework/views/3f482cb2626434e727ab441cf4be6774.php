<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Kategori</h3>
        <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
            <?php $__currentLoopData = $submenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $nama_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li <?php echo e(jecho($kategori, $id, "class='active'")); ?>><a href="<?php echo e(ci_route('mailbox', $id)); ?>"><?php echo e($nama_menu); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/mailbox/nav.blade.php ENDPATH**/ ?>
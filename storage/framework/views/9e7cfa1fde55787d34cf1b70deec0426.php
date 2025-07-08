<?php $__currentLoopData = $allKategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategoriBox => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div id="<?php echo e($kategoriBox); ?>" class="box box-info <?php echo e($kategori == $kategoriBox ? '' : 'collapsed-box'); ?>">
        <div class="box-header with-border">
            <h3 class="box-title">Statistik <?php echo e($kategoriBox); ?></h3>
            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa <?php echo e($kategori == $kategoriBox ? 'fa-minus' : 'fa-plus'); ?>"></i>
                </button>
            </div>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <?php $__currentLoopData = $data['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $nama): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="<?= ((string) $id == $lap && $kategori == $kategoriBox) ? 'active' : ''; ?>">
                        <?php echo anchor("statistik/{$data['kategori']}/{$id}", $nama); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/statistik/side.blade.php ENDPATH**/ ?>
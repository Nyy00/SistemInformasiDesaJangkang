<?php if(can('u')): ?>
    <?php if($modal): ?>
        <a
            href="<?php echo e(site_url($url)); ?>"
            class="btn btn-social btn-success btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
            title="<?php echo e($judul ?? 'Tambah'); ?> Data"
            data-target="#<?php echo e($modalTarget ?? 'modalBox'); ?>"
            data-remote="false"
            data-toggle="modal"
            data-backdrop="false"
            data-keyboard="false"
            data-title="<?php echo e($judul ?? 'Tambah'); ?> Data"
        ><i class="fa fa fa-plus"></i>
            <?php echo e($judul ?? 'Tambah'); ?></a>
    <?php else: ?>
        <a href="<?php echo e(site_url($url)); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="<?php echo e($judul ?? 'Tambah'); ?> Data" target="_blank"><i class="fa fa-plus "></i><?php echo e($judul ?? 'Tambah'); ?></a>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/layouts/components/buttons/tambah.blade.php ENDPATH**/ ?>
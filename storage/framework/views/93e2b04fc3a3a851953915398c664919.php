<?php if(can('b')): ?>
    <?php if($modal): ?>
        <a href="<?php echo e(site_url($url)); ?>" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="<?php echo e($judul ?? 'Unduh'); ?>"><i class="fa fa-download"></i>
            <?php echo e($judul ?? 'Unduh'); ?></a>
    <?php else: ?>
        <a href="<?php echo e(site_url($url)); ?>" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="<?php echo e($judul ?? 'Unduh'); ?> Data" target="_blank"><i class="fa fa-download "></i><?php echo e($judul ?? 'Unduh'); ?></a>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/layouts/components/buttons/unduh.blade.php ENDPATH**/ ?>
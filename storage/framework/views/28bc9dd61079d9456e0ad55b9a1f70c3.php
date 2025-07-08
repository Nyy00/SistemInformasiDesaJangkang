<?php if(can('h')): ?>
    <a href="#confirm-delete" title="<?php echo e($judul ?? 'Hapus'); ?> Data" onclick="deleteAllBox('mainform','<?php echo e(site_url($url)); ?>')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i class='fa fa-trash-o'></i>
        <?php echo e($judul ?? 'Hapus'); ?></a>
<?php endif; ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/layouts/components/buttons/hapus.blade.php ENDPATH**/ ?>
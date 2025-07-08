<?php if(!$cek_kades && !empty($main->kode_desa)): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="callout callout-warning">
                <h4><i class="fa fa-warning"></i>&nbsp;&nbsp;Informasi</h4>
                <p>Silahkan tentukan <?php echo e(ucwords(setting('sebutan_kepala_desa') . ' ' . $main->nama_desa)); ?> melalui
                    modul <a href="<?php echo e(ci_route('pengurus')); ?>"><b><?php echo e(ucwords(setting('sebutan_pemerintah_desa'))); ?></b></a>
                </p>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/identitas_desa/info_kades.blade.php ENDPATH**/ ?>
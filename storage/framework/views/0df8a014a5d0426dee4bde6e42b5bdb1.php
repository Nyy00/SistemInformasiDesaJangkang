<div class="row">
    <a href="<?php echo e(ci_route('lapak_admin/produk')); ?>">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-cubes fa-nav"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">PRODUK</span>
                    <span class="info-box-number"><?php echo e($jml_produk['aktif']); ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: <?php echo e(persen3($jml_produk['aktif'], $jml_produk['total'])); ?>"></div>
                    </div>
                    <span class="progress-description">Total : <b><?php echo e($jml_produk['total']); ?></b></span>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo e(ci_route('lapak_admin/pelapak')); ?>">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-users fa-nav"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">PELAPAK</span>
                    <span class="info-box-number"><?php echo e($jml_pelapak['aktif']); ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: <?php echo e(persen3($jml_pelapak['aktif'], $jml_pelapak['total'])); ?>"></div>
                    </div>
                    <span class="progress-description">Total : <b><?php echo e($jml_pelapak['total']); ?></b></span>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo e(ci_route('lapak_admin/kategori')); ?>">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-tags fa-nav"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">KATEGORI</span>
                    <span class="info-box-number"><?php echo e($jml_kategori['aktif']); ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: <?php echo e(persen3($jml_kategori['aktif'], $jml_kategori['total'])); ?>"></div>
                    </div>
                    <span class="progress-description">Total : <b><?php echo e($jml_kategori['total']); ?></b></span>
                </div>
            </div>
        </div>
    </a>
</div>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\Modules\Lapak\Views/backend/navigasi.blade.php ENDPATH**/ ?>
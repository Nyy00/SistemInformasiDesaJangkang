<?php $first = $saas->first(); ?>
<?php if($saas->count() != 0 && $first->sisa_aktif < 21): ?>
    <div class="row">
        <div class='col-md-12'>
            <div class="callout callout-warning">
                <h4><i class="fa fa-bullhorn"></i>&nbsp;&nbsp;Pengingat <b><?php echo e($first->nama); ?></b>!</h4>
                <p align="justify">
                    Pelanggan yang terhomat,
                    <br>
                    Ini adalah pengingat <b><?php echo e($first->nama); ?></b> akan segera berakhir dalam waktu <?php echo e($first->sisa_aktif); ?> hari
                    <br>
                    Perlu diketahui bahwa jika layanan tidak diperpanjang, situs web atau layanan apa pun yang terkait <b><?php echo e($first->nama); ?></b> akan berhenti bekerja. Perbarui sekarang untuk menghindari gangguan dalam layanan.
                </p>

            </div>

        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/home/saas.blade.php ENDPATH**/ ?>
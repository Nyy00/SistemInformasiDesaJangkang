<div class="box box-widget">
    <div class="box-footer no-padding">
        <ul class="nav nav-stacked">
            <li class="<?= ($selected_nav == 'peraturan') ? 'active' : ''; ?>"><a href="<?php echo e(site_url('dokumen_sekretariat/perdes/3')); ?>"><?php echo e(SebutanDesa('Buku Peraturan di [Desa]')); ?></a>
            </li>
            <li class="<?= ($selected_nav == 'keputusan') ? 'active' : ''; ?>"><a href="<?php echo e(site_url('dokumen_sekretariat/perdes/2')); ?>">Buku Keputusan <?php echo e(ucwords($setting->sebutan_kepala_desa)); ?></a></li>
            <li class="<?= ($selected_nav == 'inventaris') ? 'active' : ''; ?>"><a href="<?php echo e(site_url('bumindes_inventaris_kekayaan')); ?>"><?php echo e(SebutanDesa('Buku Inventaris dan Kekayaan [Desa]')); ?></a>
            </li>
            <li class="<?= ($selected_nav == 'pengurus') ? 'active' : ''; ?>"><a href="<?php echo e(site_url('pengurus')); ?>"><?php echo e('Buku ' . ucwords(setting('sebutan_pemerintah_desa'))); ?></a></li>
            <li class="<?= ($selected_nav == 'tanah_kas') ? 'active' : ''; ?>"><a href="<?php echo e(site_url('bumindes_tanah_kas_desa/clear')); ?>"><?php echo e(SebutanDesa('Buku Tanah Kas [Desa]')); ?></a>
            </li>
            <li class="<?= ($selected_nav == 'tanah') ? 'active' : ''; ?>"><a href="<?php echo e(site_url('bumindes_tanah_desa')); ?>"><?php echo e(SebutanDesa('Buku Tanah di [Desa]')); ?></a>
            </li>
            <li class="<?= ($selected_nav == 'agenda_keluar') ? 'active' : ''; ?>"><a href="<?php echo e(site_url('surat_keluar')); ?>">Buku Agenda - Surat Keluar</a>
            </li>
            <li class="<?= ($selected_nav == 'agenda_masuk') ? 'active' : ''; ?>"><a href="<?php echo e(site_url('surat_masuk')); ?>">Buku Agenda - Surat Masuk</a></li>
            <li class="<?= ($selected_nav == 'ekspedisi') ? 'active' : ''; ?>"><a href="<?php echo e(site_url('ekspedisi/clear')); ?>">Buku Ekspedisi</a></li>
            <li class="<?= ($selected_nav == 'lembaran') ? 'active' : ''; ?>"><a href="<?php echo e(site_url('lembaran_desa')); ?>"><?php echo e(SebutanDesa('Buku Lembaran [Desa] dan Berita [Desa]')); ?></a>
            </li>
        </ul>
    </div>
</div>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/layouts/components/side_bukudesa.blade.php ENDPATH**/ ?>
<?php if(!cek_koneksi_internet() && setting('notifikasi_koneksi')): ?>
    <div class="callout callout-warning">
        <h4><i class="fa fa-warning"></i>&nbsp;&nbsp;Informasi</h4>
        <p>Aplikasi tidak dapat terhubung dengan koneksi internet, beberapa modul mungkin tidak berjalan dengan
            baik.</p>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/layouts/partials/info.blade.php ENDPATH**/ ?>
<?php if($periksa_data): ?>
    <div class="modal fade" id="confirm-status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-triangle text-red"></i>&nbsp; Konfirmasi</h4>
                </div>
                <div class="modal-body btn-info"><?php echo $pertanyaan ?? ''; ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-social btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-sign-out"></i> Tutup</button>
                    <a class="btn-ok">
                        <button type="button" class="btn btn-social btn-info btn-sm" id="ok-status"><i class="fa fa-check"></i> Simpan</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirm-backup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-triangle text-red"></i>&nbsp; Konfirmasi</h4>
                </div>
                <div class="modal-body btn-info">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-social btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-sign-out"></i> Belum</button>
                    <a class="btn-ok">
                        <button type="button" class="btn btn-social btn-info btn-sm" id="ok-delete"><i class="fa fa-check"></i> Sudah</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/layouts/components/konfirmasi.blade.php ENDPATH**/ ?>
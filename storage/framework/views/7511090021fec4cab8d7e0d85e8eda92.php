<?php if(can('u', 'dtks')): ?>
    <div class='modal fade' id='show_confirm_modal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-lg'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                    <h4 class='modal-title' id='myModalLabel'>
                        <i class='fa fa-exclamation-triangle text-blue'></i>&nbsp;&nbsp;&nbsp;Pemberitahuan
                    </h4>
                </div>
                <div class='modal-body'>
                    <div class="col-sm-12">
                        <div class="box" style="border-top:none">
                            <a href="#" id="tujuan" class="btn btn-social pull-right  btn-success btn-sm">
                                <i class='fa fa-plus'></i> Ubah/Buat DTKS Baru
                            </a>
                            <div>
                                <?php echo $__env->make('admin.dtks.info_new_dtks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button type="button" class="btn pull-left btn-social  btn-warning btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/penduduk/rtm/dtks_modal.blade.php ENDPATH**/ ?>
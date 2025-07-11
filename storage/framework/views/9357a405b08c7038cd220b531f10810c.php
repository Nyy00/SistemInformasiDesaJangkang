<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        Komentar
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Komentar</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <?php if(can('h')): ?>
                        <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?php echo e(ci_route('komentar.delete_all')); ?>')"
                            class="btn btn-social btn-danger btn-sm
                        visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block
                        hapus-terpilih"
                        ><i class='fa fa-trash-o'></i> Hapus</a>
                    <?php endif; ?>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <form id="mainform" name="mainform" method="post">
                                    <div class="row mepet">
                                        <div class="col-sm-2">
                                            <select name="status" id="status" class="form-control input-sm select2">
                                                <option value="">Semua</option>
                                                <option value="<?php echo e(App\Models\Komentar::ACTIVE); ?>">Aktif</option>
                                                <option value="<?php echo e(App\Models\Komentar::NONACTIVE); ?>">Tidak Aktif</option>
                                                <option value="<?php echo e(App\Models\Komentar::UNREAD); ?>">Belum Dibaca</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr class="batas">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover" id="tabeldata">
                                                    <thead class="bg-gray disabled color-palette">
                                                        <tr>
                                                            <th><input type="checkbox" id="checkall" /></th>
                                                            <th>No</th>
                                                            <th>Aksi</th>
                                                            <th>Pengirim</th>
                                                            <th>Isi Komentar</th>
                                                            <th>No. HP Pengirim</th>
                                                            <th>Email Pengirim</th>
                                                            <th>Judul Artikel</th>
                                                            <th>Aktif</th>
                                                            <th>Dimuat Pada </th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script>
            $(document).ready(function() {
                $('#status').val(<?php echo e($defaultStatus); ?>).trigger('change');

                var TableData = $('#tabeldata').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "<?php echo e(ci_route('komentar.datatables')); ?>",
                        data: function(req) {
                            req.status = $('#status').val();
                        }
                    },
                    columns: [{
                            data: 'ceklist',
                            class: 'padat',
                            searchable: false,
                            orderable: false
                        },
                        {
                            data: 'DT_RowIndex',
                            class: 'padat',
                            searchable: false,
                            orderable: false
                        },
                        {
                            data: 'aksi',
                            class: 'aksi',
                            searchable: false,
                            orderable: false
                        },
                        {
                            data: 'owner',
                            name: 'owner',
                            searchable: true,
                            orderable: false,
                        },
                        {
                            data: 'komentar',
                            name: 'komentar',
                            searchable: true,
                            orderable: true
                        },
                        {
                            data: 'no_hp',
                            name: 'no_hp',
                            searchable: true,
                            orderable: false
                        },
                        {
                            data: 'email',
                            name: 'email',
                            searchable: true,
                            orderable: false
                        },
                        {
                            data: 'judul_artikel',
                            name: 'artikel.judul',
                            searchable: true,
                            orderable: false
                        },
                        {
                            data: 'enabled',
                            name: 'status',
                            searchable: true,
                            orderable: true
                        },
                        {
                            data: 'dimuat_pada',
                            name: 'tgl_upload',
                            searchable: true,
                            orderable: true
                        },
                    ],
                    order: [
                        [9, 'desc']
                    ],
                });

                $('#status').change(function() {
                    TableData.column(8).search($(this).val()).draw()
                })

                if (hapus == 0) {
                    TableData.column(0).visible(false);
                }

                if (ubah == 0) {
                    TableData.column(2).visible(false);
                }
            });
        </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/komentar/index.blade.php ENDPATH**/ ?>
<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        <?php echo e($kat_nama); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active"><?php echo e($kat_nama); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <form id="mainform" name="mainform" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <?php if(can('u')): ?>
                                <a href="<?php echo e(ci_route('dokumen.form')); ?>" class="btn btn-social btn-success btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Menu Baru">
                                    <i class="fa fa-plus"></i>Tambah
                                </a>
                            <?php endif; ?>
                            <?php if(can('h')): ?>
                                <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?php echo e(ci_route('dokumen.delete')); ?>')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                                        class='fa fa-trash-o'
                                    ></i> Hapus</a>
                            <?php endif; ?>
                            <a
                                href="<?php echo e(ci_route('dokumen.dialog_cetak.cetak')); ?>"
                                class="btn btn-social bg-purple btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                                title="Cetak Dokumen"
                                data-remote="false"
                                data-toggle="modal"
                                data-target="#modalBox"
                                data-title="Cetak Laporan"
                            >
                                <i class="fa fa-print"></i>Cetak
                            </a>
                            <a
                                href="<?php echo e(ci_route('dokumen.dialog_cetak.unduh')); ?>"
                                class="btn btn-social bg-navy btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                                title="Unduh Dokumen"
                                data-remote="false"
                                data-toggle="modal"
                                data-target="#modalBox"
                                data-title="Unduh Laporan"
                            >
                                <i class="fa fa-download"></i>Unduh
                            </a>

                            <a
                                href="<?php echo e(ci_route('dokumen.ekspor')); ?>"
                                class="btn btn-social bg-blue btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                                title="Ekspor Data"
                                data-remote="false"
                                data-toggle="modal"
                                data-target="#modalBox"
                                data-title="Ekspor Data Informasi Publik"
                            >
                                <i class="fa fa-download"></i>Ekspor
                            </a>
                        </div>
                        <div class="box-body">
                            <div class="row mepet">
                                <div class="col-sm-2">
                                    <select id="status" class="form-control input-sm select2">
                                        <option value="">Pilih Status</option>
                                        <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <hr class="batas">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dataTable table-hover" id="tabeldata">
                                    <thead class="bg-gray disabled color-palette">
                                        <tr>
                                            <th><input type="checkbox" id="checkall" /></th>
                                            <th>No</th>
                                            <th>Aksi</th>
                                            <th>Judul</th>
                                            <th>Kategori Info Publik</th>
                                            <th>Tahun</th>
                                            <th nowrap>Aktif</th>
                                            <th nowrap>Dimuat Pada </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(ci_route('dokumen.datatables')); ?>",
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
                        data: 'nama',
                        name: 'nama',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'infoPublic',
                        name: 'infoPublic',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'tahun',
                        name: 'tahun',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'aktif',
                        name: 'aktif',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'dimuat',
                        name: 'tgl_upload',
                        searchable: false,
                        orderable: true
                    },
                ],
                aaSorting: [],
                order: [
                    [7, 'desc']
                ],
            });

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            if (ubah == 0) {
                TableData.column(2).visible(false);
            }

            $('#status').change(function() {
                TableData.draw()
            })

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/dokumen/informasi_publik/index.blade.php ENDPATH**/ ?>
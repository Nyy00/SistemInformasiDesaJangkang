<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        Daftar C-Desa
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Daftar C-Desa</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <?php if(can('u')): ?>
                <a href="<?php echo e(ci_route('cdesa.form')); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
            <?php endif; ?>
            <?php if(can('h')): ?>
                <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?php echo e(ci_route('cdesa.delete_all')); ?>')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i class='fa fa-trash-o'></i>
                    Hapus</a>
            <?php endif; ?>
            <a
                href="<?php echo e(ci_route('cdesa.dialog.cetak')); ?>"
                class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                title="Cetak Laporan"
                data-remote="false"
                data-toggle="modal"
                data-target="#modalBox"
                data-title="Cetak Laporan"
            >
                <i class="fa fa-print "></i>Cetak
            </a>
            <a
                href="<?php echo e(ci_route('cdesa.dialog.unduh')); ?>"
                class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                title="Unduh Laporan"
                data-remote="false"
                data-toggle="modal"
                data-target="#modalBox"
                data-title="Unduh Laporan"
            >
                <i class="fa fa-print "></i>Unduh
            </a>
        </div>
        <div class="box-body">
            <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabeldata">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkall" /></th>
                            <th class="padat">NO</th>
                            <th class="padat">AKSI</th>
                            <th>NO. CDESA</th>
                            <th>NAMA DI C-DESA</th>
                            <th>NAMA PEMILIK</th>
                            <th>NIK</th>
                            <th>JUMLAH PERSIL</th>
                        </tr>
                    </thead>
                </table>
            </div>
            </form>
        </div>
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
                ajax: "<?php echo e(ci_route('cdesa.datatables')); ?>",
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
                        data: 'nomor',
                        name: 'nomor',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'nama_kepemilikan',
                        name: 'nama_kepemilikan',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'nama_pemilik',
                        name: 'nama_pemilik',
                        searchable: true,
                        orderable: false
                    },
                    {
                        name: 'nik_pemilik',
                        data: 'nik_pemilik',
                        searchable: true,
                        orderable: false,
                        render: function(item, data, row) {
                            return row.id_pemilik == '-' ? row.id_pemilik : `<a href='<?php echo e(ci_route('penduduk.detail')); ?>/${row.id_pemilik}'>${item}</a>`
                        },
                    },
                    {
                        data: 'jumlah',
                        name: 'jumlah',
                        searchable: false,
                        orderable: false,
                        class: 'padat'
                    },
                ],
                order: [
                    [3, 'asc']
                ]
            });

            if (hapus == 0) {
                TableData.column(0).visible(false);
                $('.akses-hapus').remove();
            }

            if (ubah == 0) {
                TableData.column(2).visible(false);
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/pertanahan/cdesa/index.blade.php ENDPATH**/ ?>
<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        Pengaturan <?php echo e($utama ? 'Modul' : 'Submodul'); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php if(!$utama): ?>
        <li><a href="<?php echo e(ci_route('modul')); ?>">Daftar Modul</a></li>
    <?php endif; ?>
    <li class="active">Pengaturan <?php echo e($utama ? 'Modul' : 'Submodul'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->renderWhen($utama, 'admin.pengaturan.modul.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <?php if($utama): ?>
                <h4>Pengaturan Modul</h4>
                <?php if(can('u')): ?>
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <a href="<?php echo e(ci_route('plugin')); ?>" class="btn btn-social btn-warning btn-sm"><i class="fa fa-plug"></i>Paket Tambahan</a>
                            <a href="<?php echo e(ci_route('modul.default_server')); ?>" class="btn btn-social btn-success btn-sm" <?= (!setting('penggunaan_server')) ? 'disabled' : ''; ?>><i class="fa fa-refresh"></i>Kembalikan ke default penggunaan server</a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <a href="<?php echo e(ci_route('modul')); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Daftar Modul</a>
                <div style="margin-top: 15px;">
                    <strong> Modul Utama : <?php echo e(SebutanDesa($parentName)); ?> </strong>
                </div>
            <?php endif; ?>
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
                <table class="table table-bordered table-hover" id="tabeldata">
                    <thead>
                        <tr>
                            <th class="padat">No</th>
                            <th class="padat">Aksi</th>
                            <th>Nama Modul</th>
                            <th>Icon</th>
                            <th>Tampil</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <?php echo $__env->make('admin.pengaturan.modul.acak_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var parent = '<?php echo e($utama); ?>';
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(ci_route('modul.datatables')); ?>?parent=<?php echo e($parent); ?>",
                },
                columns: [{
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
                        data: 'modul',
                        name: 'modul',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'ikon',
                        name: 'ikon',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'ikon',
                        name: 'ikon',
                        class: 'padat',
                        render: function(data, type, row) {
                            return `<i class="fa ${row.ikon} fa-lg"></i>`;
                        },
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'aktif',
                        name: 'aktif',
                        searchable: true,
                        orderable: false,
                        visible: false
                    },
                ],
                pageLength: 25,
                aaSorting: []
            });

            if (ubah == 0 && parent == 0) {
                TableData.column(1).visible(false);
            }

            $('#status').change(function() {
                TableData.column(5).search($(this).val()).draw()
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/pengaturan/modul/index.blade.php ENDPATH**/ ?>
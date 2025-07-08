<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        Pelapak
        <small>Daftar Data</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Daftar Data</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('lapak::backend.navigasi', $navigasi, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <?php if ($__env->exists('admin.layouts.components.buttons.tambah', [
                'modal' => true,
                'url' => "lapak_admin/pelapak_form/{$main->id}",
            ])) echo $__env->make('admin.layouts.components.buttons.tambah', [
                'modal' => true,
                'url' => "lapak_admin/pelapak_form/{$main->id}",
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if ($__env->exists('admin.layouts.components.buttons.hapus', [
                'url' => 'lapak_admin/pelapak_delete_all',
            ])) echo $__env->make('admin.layouts.components.buttons.hapus', [
                'url' => 'lapak_admin/pelapak_delete_all',
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if ($__env->exists('admin.layouts.components.buttons.cetak', [
                'modal' => true,
                'url' => 'lapak_admin/pelapak/dialog/cetak',
            ])) echo $__env->make('admin.layouts.components.buttons.cetak', [
                'modal' => true,
                'url' => 'lapak_admin/pelapak/dialog/cetak',
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if ($__env->exists('admin.layouts.components.buttons.unduh', [
                'modal' => true,
                'url' => 'lapak_admin/pelapak/dialog/unduh',
            ])) echo $__env->make('admin.layouts.components.buttons.unduh', [
                'modal' => true,
                'url' => 'lapak_admin/pelapak/dialog/unduh',
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <form id="mainform" name="mainform" method="post">
            <div class="box-body">
                <div class="row mepet">
                    <div class="col-sm-2">
                        <select class="form-control input-sm select2" id="status" name="status">
                            <option value="">Pilih Status</option>
                            <option value="1" selected>Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <hr class="batas">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable table-hover tabel-daftar" id="tabel-pelapak">
                        <thead class="bg-gray disabled color-palette">
                            <tr>
                                <th><input type="checkbox" id="checkall" /></th>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Pelapak</th>
                                <th>No. Telelpon</th>
                                <th>Jumlah Produk</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            let tabel_produk = $('#tabel-pelapak').DataTable({
                'processing': true,
                'serverSide': true,
                'autoWidth': false,
                'pageLength': 10,
                'order': [
                    [3, 'desc']
                ],
                'columnDefs': [{
                        'searchable': false,
                        'targets': [0, 1, 2, 5]
                    },
                    {
                        'orderable': false,
                        'targets': [0, 1, 2]
                    },
                    {
                        'className': 'padat',
                        'targets': [0, 1, 4, 5]
                    },
                    {
                        'className': 'aksi',
                        'targets': [2]
                    }
                ],
                'ajax': {
                    'url': "<?php echo e(site_url('lapak_admin/pelapak')); ?>",
                    'method': 'get',
                    'data': function(d) {
                        d.status = $('#status').val();
                    }
                },
                'columns': [{
                        'data': function(data) {
                            if (data.jumlah == 0) {
                                return `<input type="checkbox" name="id_cb[]" value="${data.id}"/>`
                            } else return ''
                        }
                    },
                    {
                        'data': 'DT_RowIndex'
                    },
                    {
                        'data': function(data) {
                            let status;
                            if (data.status == 1) {
                                status =
                                    `<a href="<?php echo e(site_url('lapak_admin/pelapak_status/')); ?>${data.id}" class="btn bg-navy btn-sm" title="Non Aktifkan Pelapak"><i class="fa fa-unlock"></i></a>`
                            } else {
                                status =
                                    `<a href="<?php echo e(site_url('lapak_admin/pelapak_status/')); ?>${data.id}" class="btn bg-navy btn-sm" title="Aktifkan Pelapak"><i class="fa fa-lock"></i></a>`
                            }

                            let hapus;
                            if (data.jumlah == 0) {
                                hapus =
                                    `<a href="#" data-href="<?php echo e(site_url('lapak_admin/pelapak_delete/')); ?>${data.id}" class="btn bg-maroon btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>`
                            } else {
                                hapus = ''
                            }

                            return `
                        <?php if(can('u')): ?>
                            <a href="<?php echo e(site_url('lapak_admin/pelapak_form/')); ?>${data.id}" title="Edit Data" class="btn bg-orange btn-sm" data-target="#modalBox" data-remote="false" data-toggle="modal" data-backdrop="false" data-keyboard="false" data-title="Ubah Pelapak"><i class="fa fa-edit"></i></a>
                            ${status}
                        <?php endif; ?>
                        <?php if(can('h')): ?>
                            ${hapus}
                        <?php endif; ?>
                        <?php if(can('u')): ?>
                            <a href="<?php echo e(site_url('lapak_admin/pelapak_maps/')); ?>${data.id}" class="btn bg-green btn-sm" title="Lokasi"><i class="fa fa-map"></i></a>
                        <?php endif; ?>
                        `
                        }
                    },
                    {
                        'data': 'pelapak',
                        'name': 'p.nama'
                    },
                    {
                        'data': 'telepon'
                    },
                    {
                        'data': 'jumlah'
                    }
                ],
                'language': {
                    'url': "<?php echo e(base_url('/assets/bootstrap/js/dataTables.indonesian.lang')); ?>"
                }
            });

            if (hapus == 0) {
                tabel_produk.column(0).visible(false);
            }

            if (ubah == 0) {
                tabel_produk.column(2).visible(false);
            }

            $('#status').on('select2:select', function(e) {
                tabel_produk.ajax.reload();
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\Modules\Lapak\Views/backend/pelapak/index.blade.php ENDPATH**/ ?>
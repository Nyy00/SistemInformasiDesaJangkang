<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        Manajemen Grup Pengguna
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Manajemen Grup Pengguna</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-3">
            <?php echo $__env->make('admin.pengaturan.pengguna.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <?php if (can('u')) : ?>
                <div class="box-header with-border">
                    <?php if(can('u')): ?>
                        <a href="<?php echo e(ci_route('grup/form')); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    <?php endif; ?>
                    <?php if(can('h')): ?>
                        <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?php echo e(ci_route('grup/delete')); ?>')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                                class='fa fa-trash-o'></i> Hapus</a>
                    <?php endif; ?>
                    <?php if(can('u')): ?>
                        <div class="btn-group-vertical radius-3">
                            <a class="btn btn-social btn-sm bg-navy" data-toggle="dropdown"><i class='fa fa-arrow-circle-down'></i>
                                Impor / Ekspor</a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a
                                        href="<?php echo e(ci_route('grup.impor')); ?>"
                                        class="btn btn-social btn-block btn-sm"
                                        data-target="#impor-pengguna"
                                        data-remote="false"
                                        data-toggle="modal"
                                        data-backdrop="false"
                                        data-keyboard="false"
                                    ><i class="fa fa-upload"></i> Impor Pengguna</a>
                                </li>
                                <li>
                                    <a target="_blank" class="btn btn-social btn-block btn-sm aksi-terpilih" title="Ekspor Pengguna" onclick="formAction('mainform', '<?php echo e(ci_route('grup.ekspor')); ?>'); return false;"><i class="fa fa-download"></i> Ekspor Pengguna</a>
                                </li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <div class="box-body">
                    <div class="row mepet">
                        <div class="col-sm-2">
                            <select id="status" class="form-control input-sm select2" name="status">
                                <option value="">Semua</option>
                                <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item['id']); ?>"><?php echo e($item['nama']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select id="jenis" class="form-control input-sm select2" name="jenis">
                                <option value="">Jenis Grup</option>
                                <?php $__currentLoopData = $jenis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <hr class="batas">
                    <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover tabel-daftar" id="tabeldata">
                            <thead class="bg-gray">
                                <tr>
                                    <th class="padat"><input type="checkbox" id="checkall" /></th>
                                    <th class="padat">No</th>
                                    <th class="padat">Aksi</th>
                                    <th>Grup</th>
                                    <th>Jenis</th>
                                    <th>Jumlah Pengguna</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('admin.pengaturan.grup.impor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(ci_route('grup.datatables')); ?>",
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
                        data: 'jenis',
                        name: 'jenis',
                        visible: false,
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'users_count',
                        name: 'users_count',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                ],
                order: [
                    [3, 'asc']
                ],
                pageLength: 25,
            });

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            // if (ubah == 0) {
            //     TableData.column(2).visible(false);
            // }

            $('#jenis').change(function() {
                TableData.column(4).search($(this).val()).draw()
            })

            $('#status').select2().val(1).trigger('change');

            $('#status').on('select2:select', function(e) {
                TableData.draw();
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/pengaturan/grup/index.blade.php ENDPATH**/ ?>
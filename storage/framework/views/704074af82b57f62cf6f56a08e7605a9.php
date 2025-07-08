<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        Daftar Surat
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Daftar Surat</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <?php if(can('u')): ?>
                <a href="<?php echo e(ci_route('surat_master.form')); ?>" title="Tambah Format Surat" class="btn btn-social bg-olive btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
            <?php endif; ?>
            <?php if(can('h')): ?>
                <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?php echo e(ci_route('surat_master/delete')); ?>')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                        class='fa fa-trash-o'></i>
                    Hapus</a>
            <?php endif; ?>
            <?php if(can('u')): ?>
                <div class="btn-group-vertical radius-3">
                    <a class="btn btn-social btn-sm bg-navy" data-toggle="dropdown"><i class='fa fa-arrow-circle-down'></i>
                        Impor / Ekspor</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a
                                href="<?php echo e(ci_route('surat_master.impor')); ?>"
                                class="btn btn-social btn-block btn-sm"
                                data-target="#impor-surat"
                                data-remote="false"
                                data-toggle="modal"
                                data-backdrop="false"
                                data-keyboard="false"
                            ><i class="fa fa-upload"></i> Impor Surat</a>
                        </li>
                        <li>
                            <a target="_blank" class="btn btn-social btn-block btn-sm aksi-terpilih" title="Ekspor Surat" onclick="formAction('mainform', '<?php echo e(ci_route('surat_master.ekspor')); ?>'); return false;"><i class="fa fa-download"></i> Ekspor Surat</a>
                        </li>
                    </ul>
                </div>
                <a href="<?php echo e(ci_route('surat_master.pengaturan')); ?>" title="Pengaturan" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                    <i class="fa fa-gear"></i> Pengaturan
                </a>
            <?php endif; ?>

            <?php if(ENVIRONMENT === 'development'): ?>
                <a href="<?php echo e(ci_route('surat_master.templateTinyMCE')); ?>" title="Buat Template" class="btn btn-social bg-blue btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-code-fork"></i> Buat Template</a></a>
            <?php endif; ?>
        </div>
        <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

        <div class="box-body">
            <div class="row mepet">
                <div class="col-sm-2">
                    <select class="form-control input-sm select2" id="status" name="status">
                        <option value="">Pilih Status</option>
                        <option value="0" selected>Aktif</option>
                        <option value="1">Tidak Aktif</option>
                        
                    </select>
                </div>
                <div class="col-sm-3">
                    <select class="form-control input-sm select2" id="jenis" name="jenis">
                        <option value="">Pilih Surat</option>
                        <?php $__currentLoopData = $jenisSurat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"><?php echo e(SebutanDesa($value)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <hr class="batas">
            <div class="table-responsive">
                <table class="table table-bordered table-hover tabel-daftar" id="tabeldata">
                    <thead class="bg-gray">
                        <tr>
                            <th class="padat"><input type="checkbox" id="checkall" /></th>
                            <th class="padat">NO</th>
                            <th class="aksi">AKSI</th>
                            <th>NAMA SURAT</th>
                            <th class="padat">KODE / KLASIFIKASI</th>
                            <th class="padat">LAMPIRAN</th>
                        </tr>
                    </thead>
                </table>
            </div>
            </form>
        </div>
    </div>

    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.pengaturan_surat.impor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layouts.components.restore_surat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(ci_route('surat_master.datatables')); ?>",
                    data: function(d) {
                        d.status = $('#status').val();
                        d.jenis = $('#jenis').val();
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
                        data: 'kode_surat',
                        name: 'kode_surat',
                        class: 'padat',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'lampiran',
                        name: 'lampiran',
                        class: 'padat',
                        searchable: true,
                        orderable: true
                    },
                ],
                order: [
                    [3, 'asc']
                ],
                pageLength: 25,
                createdRow: function(row, data, dataIndex) {
                    if (data.jenis == 2 || data.jenis == 4) {
                        $(row).addClass('select-row');
                    }
                }
            });

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            if (ubah == 0) {
                TableData.column(2).visible(false);
                TableData.column(7).visible(false);
            }

            $('#status').on('select2:select', function(e) {
                TableData.draw();
            });

            $('#jenis').on('select2:select', function(e) {
                TableData.draw();
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/pengaturan_surat/index.blade.php ENDPATH**/ ?>
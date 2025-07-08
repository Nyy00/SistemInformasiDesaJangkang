<?php echo $__env->make('admin.pengaturan_surat.asset_tinymce', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.jquery_ui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>Daftar Program Bantuan</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Daftar Program Bantuan</li>
<?php $__env->stopSection(); ?>

<style>
    .aksi .btn {
        margin-right: 3px;
    }
</style>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <?php if(can('u')): ?>
                        <a href="<?php echo e(site_url('program_bantuan/create')); ?>" class="btn btn-social bg-olive btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Program Bantuan"><i class="fa fa-plus"></i> Tambah</a>
                        <a
                            href="<?php echo e(site_url('program_bantuan/impor')); ?>"
                            class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                            title="Impor Program Bantuan"
                            data-target="#impor"
                            data-remote="false"
                            data-toggle="modal"
                            data-backdrop="false"
                            data-keyboard="false"
                        ><i class="fa fa-upload"></i> Impor</a>
                    <?php endif; ?>
                    <a href="<?php echo e(site_url('program_bantuan/panduan')); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Panduan"><i class="fa fa-question-circle"></i> Panduan</a>
                    <?php if(can('h')): ?>
                        <a href="<?php echo e(site_url('program_bantuan/bersihkan_data')); ?>" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Bersihkan Data Peserta Tidak Valid"><i class="fa fa-wrench"></i>Bersihkan Data
                            Peserta Tidak Valid</a>
                    <?php endif; ?>
                    <?php if($tampil != 0): ?>
                        <a href="<?php echo e(site_url('program_bantuan')); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Daftar Program Bantuan"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Daftar
                            Program Bantuan</a>
                    <?php endif; ?>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <form id="mainform" name="mainform" method="post">
                                            <select class="form-control input-sm select2" name="sasaran" id="sasaran">
                                                <option value="">Pilih Sasaran</option>
                                                <?php $__currentLoopData = $list_sasaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </form>
                                        <hr>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped dataTable table-hover tabel-daftar" id="tabeldata">
                                                <thead class="bg-gray disabled color-palette">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Aksi</th>
                                                        <th>Nama Program</th>
                                                        <th>Asal Dana</th>
                                                        <th>Jumlah Peserta</th>
                                                        <th>Masa Berlaku</th>
                                                        <th>Sasaran</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layouts.components.konfirmasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layouts.components.program_bantuan.impor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(ci_route('program_bantuan.datatables')); ?>",
                    data: function(req) {
                        req.sasaran = $('#sasaran').val();
                    }
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
                        data: 'nama',
                        name: 'nama',
                        searchable: true,
                        orderable: true,
                    },
                    {
                        data: 'asaldana',
                        name: 'asaldana',
                        class: 'padat',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'peserta_count',
                        name: 'peserta_count',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'tampil_tanggal',
                        name: 'tampil_tanggal',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'sasaran',
                        name: 'sasaran',
                        class: 'padat',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        class: 'padat',
                        searchable: true,
                        orderable: false
                    },
                ],
                aaSorting: [],
            });

            $('#sasaran').change(function() {
                TableData.draw();
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/program_bantuan/program.blade.php ENDPATH**/ ?>
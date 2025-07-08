<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>
        Pengelompokan Rumah Tangga
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Daftar Rumah Tangga</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <?php if(can('u')): ?>
                <a
                    href="<?php echo e(ci_route('rtm.form')); ?>"
                    title="Tambah"
                    data-remote="false"
                    data-toggle="modal"
                    data-target="#modalBox"
                    data-title="Tambah"
                    class="btn btn-social bg-olive btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                ><i class='fa fa-plus'></i>Tambah</a>
            <?php endif; ?>
            <?php if(can('h')): ?>
                <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?php echo e(ci_route('rtm.delete')); ?>')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i class='fa fa-trash-o'></i>
                    Hapus</a>
            <?php endif; ?>

            <?php if(can('u')): ?>
                <a
                    href="<?php echo e(ci_route('suplemen.impor')); ?>"
                    class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block btn-import"
                    title="Impor Data"
                    data-target="#impor"
                    data-remote="false"
                    data-toggle="modal"
                    data-backdrop="false"
                    data-keyboard="false"
                ><i class="fa fa-upload"></i>Impor</a>
            <?php endif; ?>
            <div class="btn-group-vertical">
                <a class="btn btn-social bg-orange btn-sm" data-toggle="dropdown"><i class='fa fa-arrow-circle-down'></i> Laporan</a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a
                            href="<?php echo e(ci_route('rtm.ajax_cetak.cetak')); ?>"
                            class="btn btn-social btn-block btn-sm"
                            title="Cetak Data"
                            data-remote="false"
                            data-toggle="modal"
                            data-target="#modalBox"
                            data-title="Cetak Data"
                        ><i class="fa fa-print"></i>
                            Cetak</a>
                    </li>
                    <li>
                        <a
                            href="<?php echo e(ci_route('rtm.ajax_cetak.unduh')); ?>"
                            class="btn btn-social btn-block btn-sm"
                            title="Unduh Data"
                            data-remote="false"
                            data-toggle="modal"
                            data-target="#modalBox"
                            data-title="Unduh Data"
                        ><i class="fa fa-file-excel-o"></i> Unduh</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="box-body">
            <div class="row mepet">
                <div class="col-sm-2">
                    <select id="status" class="form-control input-sm select2">
                        <option value="">Pilih Status</option>
                        <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?= ($key == App\Enums\StatusEnum::YA) ? 'selected' : ''; ?> value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select id="jenis_kelamin" class="form-control input-sm select2">
                        <option value="">Pilih Jenis Kelamin</option>
                        <?php $__currentLoopData = $jenis_kelamin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <?php echo $__env->make('admin.layouts.components.wilayah', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <hr class="batas">
            <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

            <?php if($judul_statistik): ?>
                <h5 class="box-title text-center"><b><?php echo e($judul_statistik); ?></b></h5>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabeldata">
                    <thead>
                        <tr>
                            <th nowrap><input type="checkbox" id="checkall"></th>
                            <th nowrap>NO</th>
                            <th nowrap>AKSI</th>
                            <th nowrap>FOTO</th>
                            <th nowrap>NOMOR RUMAH TANGGA</th>
                            <th nowrap>KEPALA RUMAH TANGGA</th>
                            <th nowrap>NIK</th>
                            <th nowrap>DTKS</th>
                            <th nowrap>JUMLAH KK</th>
                            <th nowrap>JUMLAH ANGGOTA</th>
                            <th nowrap>ALAMAT</th>
                            <th nowrap><?php echo e(strtoupper(setting('sebutan_dusun'))); ?></th>
                            <th nowrap>RW</th>
                            <th nowrap>RT</th>
                            <th nowrap>TANGGAL TERDAFTAR</th>
                        </tr>
                    </thead>
                </table>
            </div>
            </form>
        </div>
    </div>

    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.penduduk.rtm.impor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.penduduk.rtm.dtks_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .select2-results__option[aria-disabled=true] {
            display: none;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        function show_confirm(el) {
            $('#versi')
                .replaceWith("<?php echo e(\App\Enums\Dtks\DtksEnum::VERSION_LIST[\App\Enums\Dtks\DtksEnum::VERSION_CODE]); ?>")
            $('#rtm_clear').attr('href', "<?php echo e(ci_route('rtm')); ?>");
            $('#tujuan').attr('href', $(el).attr('href'))
        }
        $(document).ready(function() {
            let filterColumn = <?php echo json_encode($filterColumn); ?>

            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(ci_route('rtm.datatables')); ?>",
                    data: function(req) {
                        req.status = $('#status').val();
                        req.jenis_kelamin = $('#jenis_kelamin').val();
                        req.dusun = $('#dusun').val();
                        req.rw = $('#rw').val();
                        req.rt = $('#rt').val();
                        if (filterColumn['status']) {
                            req.bdt = filterColumn['status'];
                        }
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
                        data: 'foto',
                        name: 'foto',
                        searchable: false,
                        orderable: false,
                        defaultContent: ''
                    },
                    {
                        data: 'no_kk',
                        name: 'no_kk',
                        searchable: true,
                        orderable: true,
                        render: function(row, data, item) {
                            return `<span class="text-bold">${item.no_kk}</span>`;
                        }
                    },
                    {
                        data: 'kepala_keluarga.nama',
                        name: 'kepalaKeluarga.nama',
                        defaultContent: '-',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'kepala_keluarga.nik',
                        name: 'kepalaKeluarga.nik',
                        defaultContent: '-',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'terdaftar_dtks',
                        name: 'terdaftar_dtks',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'jumlah_kk',
                        name: 'jumlah_kk',
                        searchable: false,
                        orderable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'anggota_count',
                        name: 'anggota_count',
                        searchable: false,
                        orderable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'kepala_keluarga.alamat_wilayah',
                        name: 'alamat_wilayah',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'kepala_keluarga.keluarga.wilayah.dusun',
                        name: 'dusun',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'kepala_keluarga.keluarga.wilayah.rw',
                        name: 'rw',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'kepala_keluarga.keluarga.wilayah.rt',
                        name: 'rt',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'tgl_daftar',
                        name: 'tgl_daftar',
                        searchable: false,
                        orderable: true
                    },


                ],
                order: [
                    [4, 'asc']
                ]
            });

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            $('#status, #jenis_kelamin, #dusun, #rw, #rt').change(function() {
                TableData.draw()
            })

            if (filterColumn) {
                if (filterColumn['sex'] > 0) {
                    $('#jenis_kelamin').val(filterColumn['sex'])
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/penduduk/rtm/index.blade.php ENDPATH**/ ?>
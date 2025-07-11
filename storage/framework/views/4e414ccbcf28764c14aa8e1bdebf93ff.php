<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.datetime_picker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>
        Data Keluarga
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Data Keluarga</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <?php if(can('u')): ?>
                <div class="btn-group btn-group-vertical">
                    <a class="btn btn-social btn-success btn-sm" data-toggle="dropdown"><i class='fa fa-plus'></i> Tambah KK Baru</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?php echo e(ci_route('keluarga.form')); ?>" class="btn btn-social btn-block btn-sm" title="Tambah Data Penduduk Masuk"><i class="fa fa-plus"></i> Tambah Penduduk Masuk</a>
                        </li>
                        <li>
                            <a
                                href="<?php echo e(ci_route('keluarga.add_exist', 0)); ?>"
                                class="btn btn-social btn-block btn-sm"
                                title="Tambah Data KK dari keluarga yang sudah ter-input"
                                data-remote="false"
                                data-toggle="modal"
                                data-target="#modalBox"
                                data-title="Tambah Data Kepala Keluarga"
                            ><i class="fa fa-plus"></i> Dari Penduduk Sudah Ada</a>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
            <a
                id="cetak_id"
                href="<?php echo e(ci_route('keluarga.ajax_cetak.cetak')); ?>"
                class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                title="Cetak Data"
                data-remote="false"
                data-toggle="modal"
                data-target="#modalBox"
                data-title="Cetak Data"
                target="_blank"
            ><i class="fa fa-print"></i> Cetak</a>
            <a
                id="unduh_id"
                href="<?php echo e(ci_route('keluarga.ajax_cetak.unduh')); ?>"
                class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                title="Unduh Data"
                data-remote="false"
                data-toggle="modal"
                data-target="#modalBox"
                data-title="Unduh Data"
                target="_blank"
            ><i class="fa fa-download"></i> Unduh</a>
            <div class="btn-group btn-group-vertical">
                <a class="btn btn-social bg-maroon btn-sm" data-toggle="dropdown"><i class='fa fa-arrow-circle-down'></i> Aksi Data Terpilih</a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="" class="btn btn-social btn-block btn-sm aksi-terpilih" title="Cetak Kartu Keluarga" onclick="formAction('mainform','<?php echo e(ci_route('keluarga.cetak_kk')); ?>', '_blank'); return false;"><i class="fa fa-print"></i> Cetak Kartu Keluarga</a>
                    </li>
                    <li>
                        <a href="" class="btn btn-social btn-block btn-sm aksi-terpilih" title="Unduh Kartu Keluarga" onclick="formAction('mainform','<?php echo e(ci_route('keluarga.doc_kk')); ?>'); return false;"><i class="fa fa-download"></i> Unduh Kartu Keluarga</a>
                    </li>
                    <?php if(can('u')): ?>
                        <li>
                            <a
                                href="<?php echo e(ci_route('keluarga.pindah_kolektif')); ?>"
                                id="pindah_kolektif"
                                data-remote="false"
                                data-toggle="modal"
                                data-target="#modalBox"
                                data-title="Pindah Wilayah Kolektif"
                                class="btn btn-social btn-block btn-sm aksi-terpilih"
                                title="Pindah Wilayah Kolektif"
                            ><i class="fa fa-random"></i> Pindah Wilayah Kolektif</a>
                        </li>
                    <?php endif; ?>
                    <?php if(can('h') && !data_lengkap()): ?>
                        <li>
                            <a href="#confirm-delete" class="btn btn-social btn-block btn-sm hapus-terpilih" title="Hapus Data" onclick="deleteAllBox('mainform', '<?php echo e(ci_route('keluarga.delete_all')); ?>')"><i class="fa fa-trash-o"></i> Hapus Data Terpilih</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="btn-group-vertical">
                <a class="btn btn-social btn-info btn-sm" data-toggle="dropdown"><i class='fa fa-arrow-circle-down'></i> Pilih Aksi Lainnya</a>
                <ul class="dropdown-menu" role="menu">
                    <?php if($disableFilter): ?>
                        <li>
                            <a href="#" class="btn btn-social btn-block btn-sm" disabled title="Pencarian Program Bantuan"><i class="fa fa-search"></i> Pencarian Program Bantuan</a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-social btn-block btn-sm" disabled title="Pilihan Kumpulan KK"><i class="fa fa-search"></i> Pilihan Kumpulan KK</a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-social btn-block btn-sm" disabled title="No KK Sementara"><i class="fa fa-search"></i> No KK Sementara</a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a
                                href="<?php echo e(ci_route('keluarga.program_bantuan')); ?>"
                                class="btn btn-social btn-block btn-sm"
                                title="Pencarian Program Bantuan"
                                data-remote="false"
                                data-toggle="modal"
                                data-target="#modalBox"
                                data-title="Pencarian Program Bantuan"
                            ><i class="fa fa-search"></i> Pencarian Program Bantuan</a>
                        <li>
                        <li>
                            <a
                                href="<?php echo e(ci_route('keluarga.search_kumpulan_kk')); ?>"
                                class="btn btn-social btn-block btn-sm"
                                title="Pilihan Kumpulan KK"
                                data-remote="false"
                                data-toggle="modal"
                                data-target="#modalBox"
                                data-title="Pilihan Kumpulan KK"
                                onclick="$('#tabeldata').data('kk_sementara', null);$('#tabeldata').data('bantuan', null)"
                            ><i class="fa fa-search"></i> Pilihan Kumpulan KK</a>
                        </li>
                        <li>
                            <a href="#" onclick="$('#tabeldata').data('kk_sementara', 1);$('#tabeldata').data('kumpulanKK', []);$('#tabeldata').data('bantuan', null);$('#tabeldata').DataTable().draw()" class="btn btn-social btn-block btn-sm" title="No KK Sementara"><i
                                    class="fa fa-search"></i> No KK
                                Sementara</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="box-body">
            <div class="row mepet">
                <div class="col-sm-2">
                    <select id="status" class="form-control input-sm select2" <?= ($disableFilter) ? 'disabled' : ''; ?>>
                        <option value="">Pilih Status</option>
                        <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?= ($key == $defaultStatus) ? 'selected' : ''; ?> value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select id="jenis_kelamin" class="form-control input-sm select2" <?= ($disableFilter) ? 'disabled' : ''; ?>>
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
                <h5 id="judul-statistik" class="box-title text-center"><b><?php echo e($judul_statistik); ?></b></h5>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabeldata" data-statistikfilter='<?php echo json_encode($statistikFilter); ?>'>
                    <thead>
                        <tr>
                            <th nowrap><input type="checkbox" id="checkall"></th>
                            <th nowrap>NO</th>
                            <th nowrap>AKSI</th>
                            <th nowrap>FOTO</th>
                            <th nowrap>NOMOR KK</th>
                            <th nowrap>KEPALA KELUARGA</th>
                            <th nowrap>NIK</th>
                            <th nowrap>TAG ID CARD</th>
                            <th nowrap>JUMLAH ANGGOTA</th>
                            <th nowrap>JENIS KELAMIN</th>
                            <th nowrap>ALAMAT</th>
                            <th nowrap><?php echo e(strtoupper(setting('sebutan_dusun'))); ?></th>
                            <th nowrap>RW</th>
                            <th nowrap>RT</th>
                            <th nowrap>TANGGAL TERDAFTAR</th>
                            <th nowrap>TANGGAL CETAK KK</th>
                        </tr>
                    </thead>
                </table>
            </div>
            </form>
        </div>
    </div>

    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
        $(document).ready(function() {
            var urlParams = new URLSearchParams(window.location.search);
            let kumpulanKK = urlParams.getAll('kumpulanKK[]');

            let filterColumn = <?php echo json_encode($filterColumn); ?>

            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(ci_route('keluarga.datatables')); ?>",
                    data: function(req) {
                        req.status = $('#status').val();
                        req.jenis_kelamin = $('#jenis_kelamin').val();
                        req.dusun = $('#dusun').val();
                        req.rw = $('#rw').val();
                        req.rt = $('#rt').val();
                        req.kumpulanKK = $('#tabeldata').data('kumpulanKK') ?? kumpulanKK
                        req.kk_sementara = $('#tabeldata').data('kk_sementara')
                        req.bantuan = $('#tabeldata').data('bantuan')
                        req.statistikfilter = $('#tabeldata').data('statistikfilter')
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
                        render: function(item, data, row) {
                            return !item ? '' : `<a href='<?php echo e(ci_route('keluarga.kartu_keluarga')); ?>/${row.id}'>${item}</a>`
                        },
                        searchable: true,
                        orderable: true,
                    },
                    {
                        data: 'kepala_keluarga.nama',
                        name: 'kepalaKeluarga.nama',
                        defaultContent: '',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'kepala_keluarga.nik',
                        name: 'kepalaKeluarga.nik',
                        defaultContent: '',
                        render: function(item, data, row) {
                            return !item ? '' : `<a href='<?php echo e(ci_route('penduduk.detail')); ?>/${row.nik_kepala}'>${item}</a>`
                        },
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'kepala_keluarga.tag_id_card',
                        name: 'kepalaKeluarga.tag_id_card',
                        defaultContent: '',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'anggota_count',
                        name: 'anggota_count',
                        className: 'text-center',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'kepalaKeluarga.sex',
                        searchable: true,
                        orderable: false
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
                        name: 'tw',
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
                    {
                        data: 'tgl_cetak_kk',
                        name: 'tgl_cetak_kk',
                        searchable: false,
                        orderable: true
                    },

                ],
                order: [
                    [4, 'asc']
                ],
                createdRow: function(row, data, dataIndex) {
                    if (data.valid_kk) {
                        $(row).addClass(data.valid_kk);
                    }
                },
            });

            $('#status, #jenis_kelamin, #dusun, #rw, #rt').change(function() {
                TableData.draw()
            })

            if (filterColumn) {
                if (filterColumn['sex'] > 0) {
                    $('#jenis_kelamin').val(filterColumn['sex'])
                    $('#jenis_kelamin').trigger('change')
                }
                if (filterColumn['dusun']) {
                    $('#dusun').val(filterColumn['dusun'])
                    $('#dusun').trigger('change')
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/penduduk/keluarga/index.blade.php ENDPATH**/ ?>
<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.datetime_picker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>
        Data Penduduk
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Data Penduduk</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <?php if(can('u')): ?>
                <div class="btn-group btn-group-vertical">
                    <a class="btn btn-social btn-success btn-sm" data-toggle="dropdown"><i class='fa fa-plus'></i> Tambah Penduduk</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?php echo e(ci_route('penduduk.form_peristiwa.1')); ?>" class="btn btn-social btn-block btn-sm" title="Tambah Data Penduduk Lahir"><i class="fa fa-plus"></i> Penduduk Lahir</a>
                        </li>
                        <li>
                            <a href="<?php echo e(ci_route('penduduk.form_peristiwa.5')); ?>" class="btn btn-social btn-block btn-sm" title="Tambah Data Penduduk Masuk"><i class="fa fa-plus"></i> Penduduk Masuk</a>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if(can('h') && !data_lengkap()): ?>
                <a href="#confirm-delete" title="Hapus Data Terpilih" onclick="deleteAllBox('mainform', '<?php echo e(ci_route('penduduk.delete_all')); ?>')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                        class='fa fa-trash-o'
                    ></i> Hapus Data Terpilih</a>
            <?php endif; ?>
            <div class="btn-group-vertical">
                <a class="btn btn-social btn-info btn-sm" data-toggle="dropdown"><i class='fa fa-arrow-circle-down'></i> Pilih Aksi Lainnya</a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a
                            id="cetak_id"
                            href="<?php echo e(ci_route('penduduk.ajax_cetak.cetak')); ?>"
                            class="btn btn-social btn-block btn-sm"
                            title="Cetak Data"
                            data-remote="false"
                            data-toggle="modal"
                            data-target="#modalBox"
                            data-title="Cetak Data"
                        ><i class="fa fa-print"></i> Cetak</a>
                    </li>
                    <li>
                        <a
                            id="unduh_id"
                            href="<?php echo e(ci_route('penduduk.ajax_cetak.unduh')); ?>"
                            class="btn btn-social btn-block btn-sm"
                            title="Unduh Data"
                            data-remote="false"
                            data-toggle="modal"
                            data-target="#modalBox"
                            data-title="Unduh Data"
                        ><i class="fa fa-download"></i> Unduh</a>
                    </li>
                    <?php if($disableFilter): ?>
                        <li>
                            <a href="#" class="btn btn-social btn-block btn-sm" disabled title="Pencarian Spesifik">
                                <i class="fa fa-search"></i> Pencarian Spesifik
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-social btn-block btn-sm" disabled title="Pencarian Program Bantuan">
                                <i class="fa fa-search"></i> Pencarian Program Bantuan
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-social btn-block btn-sm" disabled title="Pilihan Kumpulan NIK">
                                <i class="fa fa-search"></i> Pilihan Kumpulan NIK
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-social btn-block btn-sm" disabled title="NIK Sementara">
                                <i class="fa fa-search"></i> NIK Sementara
                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a
                                href="<?php echo e(ci_route('penduduk.ajax_adv_search')); ?>"
                                class="btn btn-social btn-block btn-sm"
                                title="Pencarian Spesifik"
                                data-remote="false"
                                data-toggle="modal"
                                data-target="#modalBox"
                                data-title="Pencarian Spesifik"
                            ><i class="fa fa-search"></i> Pencarian Spesifik</a>
                        </li>
                        <li>
                            <a
                                href="<?php echo e(ci_route('penduduk.program_bantuan')); ?>"
                                class="btn btn-social btn-block btn-sm"
                                title="Pencarian Program Bantuan"
                                data-remote="false"
                                data-toggle="modal"
                                data-target="#modalBox"
                                data-title="Pencarian Program Bantuan"
                            ><i class="fa fa-search"></i> Pencarian Program Bantuan</a>
                        </li>
                        <li>
                            <a
                                href="<?php echo e(ci_route('penduduk.search_kumpulan_nik')); ?>"
                                class="btn btn-social btn-block btn-sm"
                                title="Pilihan Kumpulan NIK"
                                data-remote="false"
                                data-toggle="modal"
                                data-target="#modalBox"
                                data-title="Pilihan Kumpulan NIK"
                            ><i class="fa fa-search"></i> Pilihan Kumpulan NIK</a>
                        </li>
                        <li>
                            <a href="#" onclick="$('#tabeldata').data('nik_sementara', 1);$('#tabeldata').data('kumpulanNIK', []);$('#tabeldata').data('bantuan', null);$('#tabeldata').DataTable().draw()" class="btn btn-social btn-block btn-sm" title="NIK Sementara" <?= ($disableFilter) ? 'disabled' : ''; ?>><i
                                    class="fa fa-search"
                                ></i> NIK Sementara</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="btn-group-vertical">
                <a class="btn btn-social bg-navy btn-sm" data-toggle="dropdown"><i class='fa fa-arrow-circle-down'></i> Impor / Ekspor</a>
                <ul class="dropdown-menu" role="menu">
                    <?php if(ci_auth()->id_grup == $akses): ?>
                        <li>
                            <a href="<?php echo e(ci_route('penduduk.impor')); ?>" class="btn btn-social btn-block btn-sm" title="Impor Penduduk"><i class="fa fa-upload"></i> Impor Penduduk</a>
                        </li>
                        <?php if(!setting('multi_desa')): ?>
                            <li>
                                <a href="<?php echo e(ci_route('penduduk.impor_bip')); ?>" class="btn btn-social btn-block btn-sm" title="Impor BIP"><i class="fa fa-upload"></i> Impor BIP</a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <li>
                        <a href="<?php echo e(ci_route('penduduk.ekspor')); ?>" target="_blank" class="btn btn-social btn-block btn-sm btn-ekspor" title="Ekspor Penduduk"><i class="fa fa-download"></i> Ekspor Penduduk</a>
                    </li>
                    <li>
                        <a href="<?php echo e(ci_route('penduduk.ekspor.1')); ?>" target="_blank" class="btn btn-social btn-block btn-sm btn-ekspor" title="Ekspor Penduduk Berupa Isian Lengkap (Huruf)"><i class="fa fa-download"></i> Ekspor Penduduk Huruf</a>
                    </li>
                </ul>
            </div>
            <?php if($disableFilter): ?>
                <a href="<?php echo e(ci_route('penduduk')); ?>" class="btn btn-social bg-purple btn-sm"><i class="fa fa-refresh"></i>Bersihkan</a>
            <?php endif; ?>
        </div>
        <div class="box-body">
            <div class="row mepet">
                <div class="col-sm-2">
                    <select class="form-control input-sm select2" id="status_penduduk" <?= ($disableFilter) ? 'disabled' : ''; ?>>
                        <option value="">Pilih Status Penduduk</option>
                        <?php $__currentLoopData = $list_status_penduduk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control input-sm  select2" id="status_dasar" <?= ($disableFilter) ? 'disabled' : ''; ?>>
                        <option value="">Pilih Status Dasar</option>
                        <?php $__currentLoopData = $list_status_dasar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>" <?= ($defaultStatusDasar == $key) ? 'selected' : ''; ?>><?php echo e(set_ucwords($item)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control input-sm select2" id="jenis_kelamin" <?= ($disableFilter) ? 'disabled' : ''; ?>>
                        <option value="">Pilih Jenis Kelamin</option>
                        <?php $__currentLoopData = $list_jenis_kelamin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"><?php echo e(set_ucwords($item)); ?></option>
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
                <table class="table table-bordered table-hover" id="tabeldata" data-advancesearch='<?php echo json_encode($advanceSearch); ?>' data-statistikfilter='<?php echo json_encode($statistikFilter); ?>'>
                    <thead>
                        <tr>
                            <th nowrap><input type="checkbox" id="checkall"></th>
                            <th nowrap>NO</th>
                            <th nowrap>AKSI</th>
                            <th nowrap>FOTO</th>
                            <th nowrap>NIK</th>
                            <th nowrap>TAG ID CARD</th>
                            <th nowrap>NAMA</th>
                            <th nowrap>NO. KK</th>
                            <th nowrap>NAMA AYAH</th>
                            <th nowrap>NAMA IBU</th>
                            <th nowrap>NO. RUMAH TANGGA</th>
                            <th nowrap>ALAMAT</th>
                            <th nowrap><?php echo e(strtoupper(setting('sebutan_dusun'))); ?></th>
                            <th nowrap>RW</th>
                            <th nowrap>RT</th>
                            <th nowrap>PENDIDIKAN DALAM KK</th>
                            <th nowrap>UMUR</th>
                            <th nowrap>PEKERJAAN</th>
                            <th nowrap>KAWIN</th>
                            <th nowrap>TGL PERISTIWA</th>
                            <th nowrap>TGL TERDAFTAR</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            </form>
        </div>
    </div>

    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layouts.components.konfirmasi', ['periksa_data' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            let filterColumn = <?php echo json_encode($filterColumn); ?>

            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(ci_route('penduduk.datatables')); ?>",
                    data: function(req) {
                        req.status_penduduk = $('#status_penduduk').val();
                        req.status_dasar = $('#status_dasar').val();
                        req.jenis_kelamin = $('#jenis_kelamin').val();
                        req.dusun = $('#dusun').val();
                        req.rw = $('#rw').val();
                        req.rt = $('#rt').val();
                        req.kumpulan_nik = $('#tabeldata').data('kumpulanNIK')
                        req.nik_sementara = $('#tabeldata').data('nik_sementara')
                        req.bantuan = $('#tabeldata').data('bantuan')
                        req.advancesearch = $('#tabeldata').data('advancesearch')
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
                        data: 'nik',
                        name: 'nik',
                        render: function(item, data, row) {
                            return `<a href='<?php echo e(ci_route('penduduk.detail')); ?>/${row.id}'>${item}</a>`
                        },
                        searchable: true,
                        orderable: true,
                        defaultContent: ''
                    },
                    {
                        data: 'tag_id_card',
                        name: 'tag_id_card',
                        searchable: true,
                        orderable: false,
                        defaultContent: ''
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        searchable: true,
                        orderable: true,
                        defaultContent: ''
                    },
                    {
                        data: 'keluarga.no_kk',
                        name: 'keluarga.no_kk',
                        render: function(item, data, row) {
                            return !item ? '' : `<a href='<?php echo e(ci_route('keluarga.kartu_keluarga')); ?>/${row.id_kk}'>${item}</a>`
                        },
                        searchable: true,
                        orderable: true,
                    },
                    {
                        data: 'nama_ayah',
                        name: 'nama_ayah',
                        defaultContent: '',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'nama_ibu',
                        name: 'nama_ibu',
                        defaultContent: '',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'rtm.no_kk',
                        name: 'rtm.no_kk',
                        searchable: false,
                        orderable: false,
                        defaultContent: ''
                    },
                    {
                        data: 'alamat_wilayah',
                        name: 'alamat_wilayah',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'wilayah.dusun',
                        name: 'dusun',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'wilayah.rw',
                        name: 'tw',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'wilayah.rt',
                        name: 'rt',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'pendidikan_k_k.nama',
                        name: 'pendidikan_k_k.nama',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'umur',
                        name: 'tanggallahir',
                        searchable: false,
                        orderable: true,
                        defaultContent: '-',
                    },
                    {
                        data: 'pekerjaan.nama',
                        name: 'pekerjaan.nama',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'status_perkawinan',
                        name: 'status_perkawinan',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'tgl_peristiwa',
                        name: 'log_latest.tgl_peristiwa',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
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

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            $('#status_dasar, #status_penduduk, #jenis_kelamin, #dusun, #rw, #rt').change(function() {
                if ($('#tabeldata').data('statistikfilter').length < 1) {
                    TableData.draw()
                }
            })

            if (filterColumn) {
                if (filterColumn['status_dasar'] > 0) {
                    $('#status_dasar').val(filterColumn['status_dasar'])
                    $('#status_dasar').trigger('change')
                }

                if (filterColumn['dusun']) {
                    $('#dusun').val(filterColumn['dusun'])
                    $('#dusun').trigger('change')

                    if (filterColumn['rw']) {
                        $('#rw').val(filterColumn['dusun'] + '__' + filterColumn['rw'])
                        $('#rw').trigger('change')
                    }

                    if (filterColumn['rt']) {
                        $('#rt').find('optgroup[value="' + filterColumn['dusun'] + '__' + filterColumn['rw'] + '"] option').filter(function() {
                            return $(this).text() == filterColumn['rt']
                        }).prop('selected', 1)
                        $('#rt').trigger('change')
                    }
                }

                if (filterColumn['sex']) {
                    $('#jenis_kelamin').val(filterColumn['sex'])
                    $('#jenis_kelamin').trigger('change')
                }
            }

            $('.btn-ekspor').click(function() {
                let _href = $(this).attr('href')
                let _newHref = _href + '?params=' + JSON.stringify($('#tabeldata').DataTable().ajax.params())
                location.href = _newHref
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/penduduk/index.blade.php ENDPATH**/ ?>
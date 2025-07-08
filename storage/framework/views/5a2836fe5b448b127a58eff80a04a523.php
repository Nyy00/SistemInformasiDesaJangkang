<div class="box box-info">
    <div class="box-header with-border">
        <?php if(can('u')): ?>
            <a href="<?php echo e(site_url("{$controller}/form/{$kat}")); ?>" class="btn btn-social btn-success btn-sm btn-sm
			visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah"><i class="fa fa-plus"></i>Tambah</a>
        <?php endif; ?>
        <?php if(can('h')): ?>
            <a href="#confirm-delete" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih" title="Hapus Data"
                onclick="deleteAllBox('mainform', '<?php echo e(route('buku-umum.dokumen_sekretariat.delete_all', ['kat' => $kat])); ?>')"
            ><i class='fa fa-trash-o'></i> Hapus</a>
        <?php endif; ?>
        <a
            href="<?php echo e(route('buku-umum.dokumen_sekretariat.dialog_cetak', ['kat' => $kat, 'aksi' => 'cetak'])); ?>"
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
            href="<?php echo e(site_url("{$controller}/dialog_cetak/{$kat}/unduh")); ?>"
            class="btn btn-social bg-navy btn-sm
			btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
            title="Unduh Dokumen"
            data-remote="false"
            data-toggle="modal"
            data-target="#modalBox"
            data-title="Unduh
			Laporan"
        ><i class="fa fa-download"></i>Unduh</a>
        <?php if($kat == 1): ?>
            <a
                href="<?php echo e(site_url('informasi_publik/ekspor')); ?>"
                class="btn btn-social bg-blue btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                title="Ekspor Data"
                data-remote="false"
                data-toggle="modal"
                data-target="#modalBox"
                data-title="Ekspor Data Informasi Publik"
            ><i class="fa fa-download"></i>Ekspor</a>
        <?php endif; ?>
    </div>
    <div class="box-body">
        <form id="mainform" name="mainform" method="post">
            <input name="kategori" id="kategori" type="hidden" value="<?php echo e($kat); ?>">
            <div class="row mepet">
                <div class="col-sm-2">
                    <select class="form-control input-sm select2" name="filter" id="filter">
                        <option value="">Pilih Status</option>
                        <option value="1">Berlaku</option>
                        <option value="2">Dicabut/Tidak Berlaku</option>
                    </select>
                </div>
                <?php if($kat == 3): ?>
                    <div class="col-sm-3">
                        <select class="form-control input-sm select2" name="jenis_peraturan" id="jenis_peraturan">
                            <option value="">Pilih Jenis Peraturan</option>
                            <?php $__currentLoopData = $jenis_peraturan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($jenis); ?>">
                                    <?php echo e($jenis); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                <?php endif; ?>
                <div class="col-sm-2">
                    <select class="form-control input-sm select2 " name="tahun" id="tahun">
                        <option value="">Pilih Tahun</option>
                        <?php $__currentLoopData = $list_tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($thn['tahun']); ?>" <?= ($tahun == $thn['tahun']) ? 'selected' : ''; ?>>
                                <?php echo e($thn['tahun']); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <hr class="batas">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="tabeldata">
                            <thead class="bg-gray color-palette">
                                <tr>
                                    <th><input type="checkbox" id="checkall" /></th>
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>Judul</th>
                                    <?php if($kat == 1): ?>
                                        <th>Kategori Info Publik</th>
                                        <th>Tahun</th>
                                    <?php elseif($kat == 2): ?>
                                        <th nowrap>No./Tgl Keputusan</th>
                                        <th nowrap>Uraian Singkat</th>
                                    <?php elseif($kat == 3): ?>
                                        <th>Jenis Peraturan</th>
                                        <th>No./Tgl Ditetapkan</th>
                                        <th>Uraian Singkat</th>
                                    <?php endif; ?>
                                    <th nowrap>Aktif <i class='fa fa-sort fa-sm'></i></th>
                                    <th nowrap>Dimuat Pada <i class='fa fa-sort fa-sm'></i></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var kategori = $('#kategori').val();
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(route('buku-umum.dokumen_sekretariat.datatables')); ?>",
                    data: function(req) {
                        req.kategori = kategori;
                        req.tahun = $('#tahun').val();
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
                        orderable: true,
                    },
                    <?php if($kat == 1): ?>
                        {
                            data: 'additional.kategori_info_publik',
                            name: 'kategori_info_publik',
                            searchable: true,
                            orderable: false,
                        }, {
                            data: 'additional.tahun',
                            name: 'tahun',
                            searchable: true,
                            orderable: false,
                        },
                    <?php elseif($kat == 2): ?> {
                            data: 'additional.tgl_keputusan',
                            name: 'attr->tgl_kep_kades',
                            searchable: true,
                            orderable: true,
                        }, {
                            data: 'additional.uraian_singkat',
                            name: 'attr',
                            searchable: true,
                            orderable: false,
                        },
                    <?php elseif($kat == 3): ?> {
                            data: 'additional.jenis_peraturan',
                            name: 'attr',
                            searchable: true,
                            orderable: false,
                        }, {
                            data: 'additional.tgl_ditetapkan',
                            name: 'attr->tgl_ditetapkan',
                            searchable: true,
                            orderable: true,
                        }, {
                            data: 'additional.uraian_singkat',
                            name: 'attr',
                            searchable: true,
                            orderable: false,
                        },
                    <?php endif; ?> {
                        data: 'enabled',
                        name: 'enabled',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'tgl_upload',
                        name: 'tgl_upload',
                        searchable: true,
                        orderable: true
                    }
                ],
                order: [
                    <?php switch($kat):
                        case (2): ?>[4, 'asc']
                        <?php break; ?>

                        <?php case (3): ?>[5, 'asc']
                        <?php break; ?>
                    <?php endswitch; ?>
                ],
            });

            // buat kondisi sesuai kategori untuk data nomor column\
            // default colfilter dan tahun set ke kategori 1 / 2
            var colFilter = 6;
            var colTahun = 4;

            if (kategori == 3 || kategori == 2) {
                if (kategori == 3) {
                    colFilter = 7;
                }
                colTahun = 5;
            }

            $('#filter').change(function() {
                TableData.column(colFilter).search($(this).val()).draw()
            })

            $('#tahun').change(function() {
                if (kategori == 3) {
                    TableData.draw()
                } else {
                    TableData.column(colTahun).search($(this).val()).draw()
                }
            })

            $('#jenis_peraturan').change(function() {
                TableData.column(4).search($(this).val()).draw()
            })

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            if (ubah == 0) {
                TableData.column(2).visible(false);
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/dokumen/buku_kades/table_buku_umum.blade.php ENDPATH**/ ?>
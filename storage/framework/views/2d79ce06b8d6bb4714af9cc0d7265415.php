<?php echo $__env->make('admin.layouts.components.datetime_picker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startSection('title'); ?>
    <h1>
        Rekapitulasi Kehadiran
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Rekapitulasi Kehadiran</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Rentang Tanggal</label>
                        <input type="text" name="daterange" class="form-control input-sm" id="daterange">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Perangkat <?php echo e(ucwords($setting->sebutan_desa)); ?></label>
                        <select id="pamong" name="pamong" class="form-control input-sm required select2">
                            <option value="">Semua Perangkat</option>
                            <?php $__currentLoopData = $pamong; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->pamong_id); ?>"><?php echo e($data->pamong_nama != null ? $data->pamong_nama : $data->penduduk->nama); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Status Kehadiran</label>
                        <select id="status" name="status" class="form-control input-sm select2">
                            <option value="">Semua Status</option>
                            <?php $__currentLoopData = $kehadiran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->status_kehadiran); ?>"><?php echo e(ucwords($item->status_kehadiran)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label><br></label>
                        <div class="input-group">
                            <div class="btn-group btn-group-sm btn-block">
                                <button type="button" id="excel" class="btn btn-success"><span class="far fa-file-excel"></span> Ekspor ke excel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabeldata">
                    <thead>
                        <tr>
                            <th class="padat">NO</th>
                            <th>NAMA</th>
                            <th>JABATAN</th>
                            <th>TANGGAL</th>
                            <th>JAM MASUK</th>
                            <th>JAM KELUAR</th>
                            <th>TOTAL WAKTU</th>
                            <th class="padat">STATUS</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#daterange').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    "format": 'YYYY-MM-DD',
                    "separator": " - ",
                    "applyLabel": "Terapkan",
                    "cancelLabel": "Batal",
                    "fromLabel": "Dari",
                    "toLabel": "Untuk",
                    "customRangeLabel": "Kustom Rentang",
                    "weekLabel": "M",
                    "daysOfWeek": [
                        "Mig",
                        "Sen",
                        "Sel",
                        "Rab",
                        "Kam",
                        "Jum",
                        "Sab"
                    ],
                    "monthNames": [
                        "Januari",
                        "Februari",
                        "Maret",
                        "April",
                        "Mei",
                        "Juni",
                        "Juli",
                        "Agustus",
                        "September",
                        "Oktober",
                        "November",
                        "Desember"
                    ],
                },
                ranges: {
                    'Hari Ini': [moment(), moment()],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
                    '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
                    'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
                    'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    'Tahun Ini': [moment().startOf('year'), moment().endOf('year')]
                },
                "startDate": moment().startOf('month'),
                "endDate": moment().endOf('month')
            });

            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(ci_route('kehadiran_rekapitulasi.datatables')); ?>",
                    data: function(req) {
                        req.daterange = $('#daterange').val();
                        req.status = $('#status').val();
                        req.pamong = $('#pamong').val();
                    },
                },
                columns: [{
                        data: 'DT_RowIndex',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: function(data) {
                            return (data.pamong.pamong_nama) ? data.pamong.pamong_nama : data.pamong.penduduk.nama
                        },
                        name: 'pamong.pamong_nama',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'jabatan',
                        name: 'pamong.jabatan.nama',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'jam_masuk',
                        name: 'jam_masuk',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'jam_keluar',
                        name: 'jam_keluar',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'total',
                        name: 'total',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'status_kehadiran',
                        name: 'status_kehadiran',
                        searchable: true,
                        orderable: true
                    },
                ],
                order: [
                    [3, 'desc']
                ]
            });

            $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
                TableData.ajax.reload();
            });

            $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                TableData.ajax.reload();
            });

            $('select[name="status"]').on('change', function() {
                $(this).val();
                TableData.ajax.reload();
            });

            $('select[name="pamong"]').on('change', function() {
                $(this).val();
                TableData.ajax.reload();
            });

            $(document).on('click', '#excel', function(e) {
                $.ajax({
                    url: "<?php echo e(ci_route('kehadiran_rekapitulasi.ekspor')); ?>",
                    type: "GET",
                    data: {
                        daterange: $('#daterange').val(),
                        status: $('#status').val(),
                        pamong: $('#pamong').val(),
                    },
                    success: function(data) {
                        window.open(this.url, '_blank');
                    },
                })
            });
            $(".select2").select2();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\Modules\Kehadiran\Views/backend/rekapitulasi/index.blade.php ENDPATH**/ ?>
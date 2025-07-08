<?php $__env->startPush('css'); ?>
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/bootstrap-datepicker.min.css')); ?>">
    <?php if (cek_koneksi_internet()): ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <?php endif ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <!-- moment js -->
    <script src="<?php echo e(asset('bootstrap/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('bootstrap/js/moment-timezone.js')); ?>"></script>
    <script src="<?php echo e(asset('bootstrap/js/moment-timezone-with-data.js')); ?>"></script>
    <!-- bootstrap Date time picker -->
    <script src="<?php echo e(asset('bootstrap/js/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('bootstrap/js/id.js')); ?>"></script>
    <!-- bootstrap Date picker -->
    <script src="<?php echo e(asset('bootstrap/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('bootstrap/js/bootstrap-datepicker.id.min.js')); ?>"></script>
    <?php if (cek_koneksi_internet()): ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <?php endif ?>
    <!-- Script-->
    <script src="<?php echo e(asset('js/custom-datetimepicker.js')); ?>"></script>
    <script>
        $.extend($.fn.datetimepicker.defaults, {
            timeZone: `<?= date_default_timezone_get() ?>`
        });

        moment.tz.setDefault(`<?= date_default_timezone_get() ?>`);

        $('#date-range').daterangepicker({
            autoUpdateInput: false,
            locale: {
                "format": 'YYYY-MM-DD',
                "separator": " - ",
                "applyLabel": "Terapkan",
                "cancelLabel": "Batal",
                "fromLabel": "Dari",
                "toLabel": "Untuk",
                "customRangeLabel": "Atur Rentang",
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
                'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')],
                'Tahun Ini': [moment().startOf('year'), moment().endOf('year')]
            },
            "startDate": moment().startOf('month'),
            "endDate": moment().endOf('month')
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/layouts/components/datetime_picker.blade.php ENDPATH**/ ?>
<?php $__env->startPush('css'); ?>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <!-- DataTables JS-->
    <script src="<?php echo e(asset('bootstrap/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('bootstrap/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script>
        $.extend($.fn.dataTable.defaults, {
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "Semua"]
            ],
            pageLength: 10,
            language: {
                url: "<?php echo e(asset('bootstrap/js/dataTables.indonesian.lang')); ?>",
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/layouts/components/asset_datatables.blade.php ENDPATH**/ ?>
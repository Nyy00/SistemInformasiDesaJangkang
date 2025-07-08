<?php $__env->startPush('css'); ?>
    <!-- Jquery UI -->
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/jquery-ui.min.css')); ?>" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('bootstrap/js/jquery.dataTables.min.js')); ?>"></script>
    <!-- Validasi -->
    <script src="<?php echo e(asset('js/validasi.js')); ?>"></script>
    <script src="<?php echo e(asset('js/localization/messages_id.js')); ?>"></script>
    <script>
        function is_form_valid(form_id) {
            form_id = form_id.startsWith('#') ? form_id : '#' + form_id;
            let validate = $(form_id).validate();
            if (validate.errorList.length > 0) {
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'error',
                        html: validate.errorList[0].message,
                    })
                } else {
                    alert(validate.errorList[0].message);
                }
                validate.errorList[0].element.focus();
                return false;
            }
            return true;
        }

        $.fn.select2.defaults.set("language", {
            inputTooShort: function(args) {
                return "Masukkan minimal " + args.minimum + " karakter";
            },
            inputTooLong: function(args) {
                return "Masukkan maksimal " + args.maximum + " karakter";
            },
            noResults: function() {
                return "Tidak ada hasil yang ditemukan";
            },
            searching: function() {
                return "Mencari...";
            },
            loadingMore: function() {
                return "Memuat lebih banyak hasil...";
            },
            escapeMarkup: function(markup) {
                return markup;
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/layouts/components/asset_validasi.blade.php ENDPATH**/ ?>
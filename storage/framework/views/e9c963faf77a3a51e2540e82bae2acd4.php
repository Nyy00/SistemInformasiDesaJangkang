
<select class="form-control input-sm select2-icon-img <?php echo $value['class']; ?>" name="<?php echo e($value['key']); ?>" <?php echo e($value['readonly']); ?> <?php echo $value['attributes']; ?>

    <?php
    $referensiData = (new $value['option']['model']())
        ->get()
        ->pluck($value['option']['label'], $value['option']['value'])
        ->toArray();
    ?>
    <?php $__currentLoopData = $referensiData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($index); ?>" <?= (base_url(LOKASI_SIMBOL_LOKASI . $index) == $value['default']) ? 'selected' : ''; ?>><?php echo e($val); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>


<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            function format_icon_img(state) {
                if (!state.id) {
                    return state.text;
                }
                let img = BASE_URL + "<?php echo e(LOKASI_SIMBOL_LOKASI); ?>" + state.id.toLowerCase();

                return '<span><img src="' + img + '" width="20px" />&nbsp;' + state.text + '</span>';
            }
            $('.select2-icon-img').select2({
                placeholder: function() {
                    $(this).data('placeholder');
                },
                templateResult: format_icon_img,
                templateSelection: format_icon_img,
                escapeMarkup: function(m) {
                    return m;
                }
            });
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/pengaturan/components/select-simbol.blade.php ENDPATH**/ ?>
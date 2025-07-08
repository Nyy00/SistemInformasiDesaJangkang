<input type="hidden" name="<?php echo e($value['key']); ?>" value="[]">
<select class="form-control input-sm select2 <?php echo $value['class']; ?>" name="<?php echo e($value['key']); ?>[]" multiple="multiple" <?php echo e($value['readonly']); ?> <?php echo $value['attributes']; ?>>
    <?php $__currentLoopData = $value['option']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($val['id']); ?>" <?= (in_array($val['id'], json_decode($value['default']) ?? [])) ? 'selected' : ''; ?>>
            <?php echo SebutanDesa($val['nama']); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/pengaturan/components/select-multiple-array.blade.php ENDPATH**/ ?>
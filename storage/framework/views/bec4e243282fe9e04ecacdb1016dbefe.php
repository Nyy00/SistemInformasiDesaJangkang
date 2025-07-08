<select class="form-control input-sm select2 <?php echo $value['class']; ?>" name="<?php echo e($value['key']); ?>" <?php echo e($value['readonly']); ?> <?php echo $value['attributes']; ?>>
    <?php $__currentLoopData = \App\Enums\StatusEnum::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($key); ?>" <?= ($key == $value['default']) ? 'selected' : ''; ?>><?php echo e($val); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/pengaturan/components/select-boolean.blade.php ENDPATH**/ ?>
<div class="<?php echo e($colDusun ?? 'col-sm-2'); ?>">
    <?php if($labelWilayah): ?>
        <label for="dusun"><?php echo e(ucwords(setting('sebutan_dusun'))); ?></label>
    <?php endif; ?>
    <select id="dusun" class="form-control input-sm select2" <?= ($disableFilter ?? false) ? 'disabled' : ''; ?>>
        <option value="">Pilih <?php echo e(ucwords(setting('sebutan_dusun'))); ?></option>
        <?php $__currentLoopData = $wilayah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyDusun => $dusun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($keyDusun); ?>"><?php echo e($keyDusun); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<div class="<?php echo e($colRw ?? 'col-sm-2'); ?>">
    <?php if($labelWilayah): ?>
        <label for="rw">RW</label>
    <?php endif; ?>
    <select id="rw" class="form-control input-sm select2" <?= ($disableFilter ?? false) ? 'disabled' : ''; ?>>
        <option value="">Pilih RW</option>
        <?php $__currentLoopData = $wilayah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyDusun => $dusun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <optgroup value="<?php echo e($keyDusun); ?>" label="<?php echo e(ucwords(setting('sebutan_dusun')) . ' ' . $keyDusun); ?>">
                <?php $__currentLoopData = $dusun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyRw => $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($keyDusun); ?>__<?php echo e($keyRw); ?>"><?php echo e($keyRw); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </optgroup>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<div class="<?php echo e($colRt ?? 'col-sm-2'); ?>">
    <?php if($labelWilayah): ?>
        <label for="rt">RT</label>
    <?php endif; ?>
    <select id="rt" class="form-control input-sm select2" <?= ($disableFilter ?? false) ? 'disabled' : ''; ?>>
        <option value="">Pilih RT</option>
        <?php $__currentLoopData = $wilayah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyDusun => $dusun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $dusun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyRw => $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <optgroup value="<?php echo e($keyDusun); ?>__<?php echo e($keyRw); ?>" label="<?php echo e('RW ' . $keyRw); ?>">
                    <?php $__currentLoopData = $rw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($rt->id); ?>"><?php echo e($rt->rt); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </optgroup>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
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
            $('#dusun').change(function() {
                let _label = $(this).find('option:selected').val()
                $('#rw').find(`optgroup`).prop('disabled', 1)
                if ($(this).val()) {
                    $('#rw').closest('div').show()
                    $('#rw').find(`optgroup[value="${_label}"]`).prop('disabled', 0)
                } else {
                    $('#rw').closest('div').hide()
                    $('#rw').find(`optgroup`).prop('disabled', 1)
                }
                $('#rw').val('')
                $('#rw').trigger('change')
            })

            $('#rw').change(function() {
                let _label = $(this).find('option:selected').val()
                $('#rt').find(`optgroup`).prop('disabled', 1)
                if ($(this).val()) {
                    $('#rt').closest('div').show()
                    $('#rt').find(`optgroup[value="${_label}"]`).prop('disabled', 0)
                } else {
                    $('#rt').closest('div').hide()
                    $('#rt').find(`optgroup`).prop('disabled', 1)
                }
            })
            $('#dusun').trigger('change')
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/layouts/components/wilayah.blade.php ENDPATH**/ ?>
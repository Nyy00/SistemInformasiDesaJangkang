<?php $__currentLoopData = $list_setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pengaturan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($pengaturan->jenis != 'upload' && in_array($pengaturan->kategori, $pengaturan_kategori ?? [])): ?>
        <div class="form-group" id="form_<?php echo e($pengaturan->key); ?>">
            <label class="col-sm-12 col-md-3" for="nama"><?php echo e(SebutanDesa($pengaturan->judul)); ?></label>
            <?php if($pengaturan->jenis == 'option' || $pengaturan->jenis == 'boolean'): ?>
                <div class="col-sm-12 col-md-4">
                    <select <?php echo $pengaturan->attribute ? str_replace('class="', 'class="form-control input-sm select2 required ', $pengaturan->attribute) : 'class="form-control input-sm select2 required"'; ?> id="<?php echo e($pengaturan->key); ?>" name="<?php echo e($pengaturan->key); ?>">
                        <?php $__currentLoopData = $pengaturan->option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>" <?= ($pengaturan->value == $key) ? 'selected' : ''; ?>><?php echo e($value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            <?php elseif($pengaturan->jenis == 'multiple-option'): ?>
                <div class="col-sm-12 col-md-4">
                    <select class="form-control input-sm select2 required" name="<?php echo e($pengaturan->key); ?>[]" multiple="multiple">
                        <?php $__currentLoopData = $pengaturan->option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($val); ?>" <?php echo e(in_array($val, json_decode($pengaturan->value) ?? []) ? 'selected' : ''); ?>><?php echo e($val); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            <?php elseif($pengaturan->jenis == 'multiple-option-array'): ?>
                <div class="col-sm-12 col-md-4">
                    <select class="form-control input-sm select2" name="<?php echo e($pengaturan->key); ?>[]" multiple="multiple">
                        <?php $__currentLoopData = $pengaturan->option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($val['id']); ?>" <?php echo e(in_array($val['id'], json_decode($pengaturan->value) ?? []) ? 'selected' : ''); ?>><?php echo e(SebutanDesa($val['nama'])); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            <?php elseif($pengaturan->jenis == 'datetime'): ?>
                <div class="col-sm-12 col-md-4">
                    <div class="input-group input-group-sm date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input <?php echo $pengaturan->attribute ? str_replace('class="', 'class="form-control input-sm pull-right tgl_1 ', $pengaturan->attribute) : 'class="form-control input-sm pull-right tgl_1"'; ?> id="<?php echo e($pengaturan->key); ?>" name="<?php echo e($pengaturan->key); ?>" type="text" value="<?php echo e($pengaturan->value); ?>">
                    </div>
                </div>
            <?php elseif($pengaturan->jenis == 'textarea'): ?>
                <div class="col-sm-12 col-md-4">
                    <textarea <?php echo $pengaturan->attribute ? str_replace('class="', 'class="form-control input-sm ', $pengaturan->attribute) : 'class="form-control input-sm"'; ?> name="<?php echo e($pengaturan->key); ?>" placeholder="<?php echo e(SebutanDesa($pengaturan->keterangan)); ?>" rows="7"><?php echo e($pengaturan->value); ?> </textarea>
                </div>
            <?php elseif($pengaturan->jenis == 'password'): ?>
                <div class="col-sm-12 col-md-4">
                    <div class="input-group">
                        <input <?php echo $pengaturan->attribute ? str_replace('class="', 'class="form-control input-sm ', $pengaturan->attribute) : 'class="form-control input-sm"'; ?> id="<?php echo e($pengaturan->key); ?>" name="<?php echo e($pengaturan->key); ?>" type="password" data-password="<?php echo e($pengaturan->value ? 1 : 0); ?>" value="" />
                        <span class="input-group-addon input-sm show-hide-password"><i class="fa fa-eye-slash"></i></span>
                    </div>
                    <?php if($pengaturan->value): ?>
                        <p class="help-block small text-red">Kosongkan jika tidak ingin mengubah Password.</p>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="col-sm-12 col-md-4">
                    <input <?php echo $pengaturan->attribute ? str_replace('class="', 'class="form-control input-sm ', $pengaturan->attribute) : 'class="form-control input-sm"'; ?> id="<?php echo e($pengaturan->key); ?>" name="<?php echo e($pengaturan->key); ?>" type="text" value="<?php echo e($pengaturan->value); ?>" />
                </div>
            <?php endif; ?>
            <label class="col-sm-12 col-md-5 pull-left" for="nama"><?php echo SebutanDesa($pengaturan->keterangan); ?></label>
        </div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/pengaturan/form.blade.php ENDPATH**/ ?>
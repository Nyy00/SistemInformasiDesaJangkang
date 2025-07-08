<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('title'); ?>
    <h1>
        Media Sosial
        <small><?php echo e($action); ?> Data</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(site_url('sosmed')); ?>">Media Sosial</a></li>
    <li class="active"><?php echo e($action); ?> Data</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="<?php echo e(site_url('sosmed')); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Media Sosial</a>
        </div>
        <?php echo form_open_multipart($form_action, 'id="validasi"'); ?>

        <div class="box-body">
            <div class="form-group">
                <label>Nama</label>
                <input name="nama" class="form-control input-sm required judul" maxlength="50" type="text" value="<?php echo e($sosmed->nama); ?>">
            </div>
            <div class="form-group">
                <label>Link</label>
                <input name="link" class="form-control input-sm required" maxlength="200" type="url" value="<?php echo e($sosmed->new_link); ?>">
            </div>
            <div class="form-group">
                <label>Icon</label>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control <?php echo e($sosmed->gambar ? '' : 'required'); ?>" id="file_path" name="gambar">
                            <input type="file" class="hidden" id="file" name="gambar" accept=".gif,.jpg,.jpeg,.png">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info" id="file_browser"><i class="fa fa-search"></i>&nbsp;Browse</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tampil</label>
                        <select class="form-control select2" name="enabled">
                            <?php $__currentLoopData = \App\Enums\StatusEnum::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>" <?= ($key == $sosmed->enabled) ? 'selected' : ''; ?>><?php echo e($value); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="reset" class="btn btn-social btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
            <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
                Simpan</button>
        </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/sosmed/form.blade.php ENDPATH**/ ?>
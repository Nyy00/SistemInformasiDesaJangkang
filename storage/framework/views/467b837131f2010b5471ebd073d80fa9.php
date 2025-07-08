<?php $__env->startPush('css'); ?>
    <style>
        .catatan-scroll {
            height: 400px;
            overflow-y: scroll;
        }

        @media (max-width: 576px) {
            .komunikasi-opendk {
                display: none !important;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title'); ?>
    <h1>
        Tentang <?= config_item('nama_aplikasi') ?>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Tentang <?= config_item('nama_aplikasi') ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('admin.home.saas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('admin.home.premium', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('admin.home.rilis', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <?php $__currentLoopData = $shortcut; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($sc['akses'] . ':baca')): ?>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="small-box" style="background-color: <?php echo $sc['warna']; ?>; border-radius: 5px;">
                        <div class="inner">
                            <h3 class="text-white"><?php echo e($sc['count'] ?? '0'); ?></h3>
                            <p class="text-white"><?php echo e(SebutanDesa($sc['judul'])); ?></p>
                        </div>
                        <div class="icon">
                            <i class="faa <?php echo $sc['icon']; ?>"></i>
                        </div>
                        <a href="<?php echo e(ci_route($sc['link'] ?? '#')); ?>" class="small-box-footer text-white" style="border-radius:  0 0 5px 5px">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/home/index.blade.php ENDPATH**/ ?>
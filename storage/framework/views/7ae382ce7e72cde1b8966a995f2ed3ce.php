<div>
    <div class="box box-info">
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <li class="<?= ($cat == -1) ? 'active' : ''; ?>">
                    <a href='<?php echo e(ci_route('web', -1)); ?>'>
                        Semua Artikel Dinamis
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Kategori Artikel</h3>
            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <?php $__currentLoopData = $list_kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="<?= ($cat == $data['id']) ? 'active' : ''; ?>">
                        <a href='<?php echo e(ci_route('web', $data['id'])); ?>'>
                            <?php echo e($data['kategori']); ?>

                        </a>
                    </li>
                    <?php $__currentLoopData = $data['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="<?= ($cat == $submenu['id']) ? 'active' : ''; ?>">
                            <a href='<?php echo e(ci_route('web', $submenu['id'])); ?>'>
                                &emsp;<?php echo e($submenu['kategori']); ?>

                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <li class="<?= ($cat == '0') ? 'active' : ''; ?>">
                    <a href='<?php echo e(ci_route('web', 0)); ?>'>
                        [Tidak Berkategori]
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Artikel Statis</h3>
            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <li class="<?= ((string) $cat === 'statis') ? 'active' : ''; ?>"><a href="<?php echo e(ci_route('web.statis')); ?>">Halaman Statis</a></li>
                <li class="<?= ((string) $cat === 'agenda') ? 'active' : ''; ?>"><a href="<?php echo e(ci_route('web.agenda')); ?>">Agenda</a></li>
                <li class="<?= ((string) $cat === 'keuangan') ? 'active' : ''; ?>"><a href="<?php echo e(ci_route('web.keuangan')); ?>">Keuangan</a></li>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/web/artikel/nav.blade.php ENDPATH**/ ?>
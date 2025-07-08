<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?php echo e($setting->login_title . ' ' . ucwords($setting->sebutan_desa) . ($header['nama_desa'] ? ' ' . $header['nama_desa'] : '') . get_dynamic_title_page_from_path()); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="<?php echo e(asset('css/login-style.css')); ?>" media="screen">
    <link rel="stylesheet" href="<?php echo e(asset('css/login-form-elements.css')); ?>" media="screen">
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/bootstrap.bar.css')); ?>" media="screen">
    <?php if(is_file('desa/pengaturan/siteman/siteman.css')): ?>
        <link rel='stylesheet' href="<?php echo e(base_url('desa/pengaturan/siteman/siteman.css')); ?>">
    <?php endif; ?>
    <link rel="shortcut icon" href="<?php echo e(favico_desa()); ?>" />
    <style type="text/css">
        body.login {
            background-image: url('<?php echo e($latar_login); ?>');
        }
    </style>
    <script src="<?php echo e(asset('bootstrap/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/validasi.js')); ?>"></script>
    <script src="<?php echo e(asset('js/localization/messages_id.js')); ?>"></script>
    <?php echo $__env->make('admin.layouts.components.token', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="login">
    <div class="top-content">
        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4 form-box">
                        <div class="form-top">
                            <a href="<?php echo e(site_url()); ?>">
                                <img src="<?php echo e(gambar_desa($header['logo'])); ?>" alt="<?php echo e($header['nama_desa']); ?>" class="img-responsive" style="width: 100px;" />
                                <?php if(setting('tte')): ?>
                                    <img src="<?php echo e($logo_bsre); ?>" alt="Bsre" class="img-responsive" style="width: 200px;" />
                                <?php endif; ?>
                            </a>
                            <div class="login-footer-top">
                                <h1><?php echo e(ucwords($setting->sebutan_desa)); ?> <?php echo e($header['nama_desa']); ?></h1>
                                <h3>
                                    <br /><?php echo e($header['alamat_kantor']); ?><br />Kodepos <?php echo e($header['kode_pos']); ?>

                                    <br /><?php echo e(ucwords($setting->sebutan_kecamatan)); ?> <?php echo e($header['nama_kecamatan']); ?><br /><?php echo e(ucwords($setting->sebutan_kabupaten)); ?> <?php echo e($header['nama_kabupaten']); ?>

                                </h3>
                            </div>
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(str_contains($item, 'Terlalu banyak upaya masuk.')): ?>
                                            <p id="countdown"><?php echo e($item); ?></p>
                                        <?php else: ?>
                                            <p><?php echo e($item); ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($notif = $ci->session->flashdata('notif')): ?>
                                <div class="alert alert-danger">
                                    <p><?php echo e($notif); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-bottom">

                            <?php echo $__env->yieldContent('content'); ?>

                            <hr style="margin-top: 5px; margin-bottom: 5px;" />
                            <div class="login-footer-bottom"><a href="https://github.com/OpenSID/OpenSID" target="_blank">OpenSID</a> v<?php echo e(AmbilVersi()); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->yieldPushContent('js'); ?>

</body>

</html>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/auth/index.blade.php ENDPATH**/ ?>
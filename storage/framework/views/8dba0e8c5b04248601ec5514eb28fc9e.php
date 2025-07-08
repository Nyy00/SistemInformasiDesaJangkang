<?php $__env->startPush('css'); ?>
    <style>
        .table {
            font-size: 12px;
        }

        .bg-identitas {
            width: 100%;
            height: 300px;
            background: url("<?php echo e(gambar_desa($main['path_kantor_desa'], true)); ?>");
            background-repeat: no-repeat;
            background-position: center center;
        }

        .img-identitas {
            margin: 30px auto;
            width: 100px;
            padding: 3px;
        }

        .text-identitas {
            text-align: center;
            font-weight: bold;
            color: #fff;
            text-shadow: 2px 2px 2px #0c83c5;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title'); ?>
    <h1>
        <?php echo e(SebutanDesa('Identitas [Desa]')); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active"><?php echo e(SebutanDesa('Identitas [Desa]')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.identitas_desa.info_kades', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <?php if(can('u')): ?>
            <div class="box-header with-border">
                <a href="<?php echo e(ci_route('identitas_desa.form')); ?>" class="btn btn-social btn-warning btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Ubah Data <?php echo e(ucwords($setting->sebutan_desa)); ?>"><i class="fa fa-edit"></i> Ubah Data
                    <?php echo e(ucwords($setting->sebutan_desa)); ?></a>
                <a href="<?php echo e(ci_route('identitas_desa.maps.kantor')); ?>" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Lokasi Kantor <?php echo e(ucwords($setting->sebutan_desa)); ?>"><i class='fa fa-map-marker'></i>
                    Lokasi
                    Kantor <?php echo e(ucwords($setting->sebutan_desa)); ?></a>
                <a href="<?php echo e(ci_route('identitas_desa.maps.wilayah')); ?>" class="btn btn-social btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Peta Wilayah <?php echo e(ucwords($setting->sebutan_desa)); ?>"><i class='fa fa-map'></i>
                    Peta Wilayah
                    <?php echo e(ucwords($setting->sebutan_desa)); ?></a>
                <?php if(!$main): ?>
                    <a href="<?php echo e(ci_route('identitas_desa.reset')); ?>" class="btn btn-social btn-danger btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Reset AppKey"><i class="fa fa-times"></i> Reset AppKey</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="box-body">
            <div class="box-body bg-identitas">
                <img class="img-identitas img-responsive" src="<?php echo e(gambar_desa($main['path_logo'])); ?>" alt="logo-desa">
                <h3 class="text-identitas"><?php echo e(ucwords($setting->sebutan_desa . ' ' . $main['nama_desa'])); ?></h3>
                <p class="text-identitas">
                    <b><?php echo e(ucwords($setting->sebutan_kecamatan . ' ' . $main['nama_kecamatan'] . ', ' . $setting->sebutan_kabupaten . ' ' . $main['nama_kabupaten'] . ', Provinsi ' . $main['nama_propinsi'])); ?></b>
                </p>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover tabel-rincian">
                    <tbody>
                        <tr>
                            <th colspan="3" class="subtitle_head">
                                <strong><?php echo e(strtoupper($setting->sebutan_desa)); ?></strong>
                            </th>
                        </tr>
                        <tr>
                            <td width="300">Nama <?php echo e(ucwords($setting->sebutan_desa)); ?></td>
                            <td width="1">:</td>
                            <td><?php echo e($main['nama_desa']); ?></td>
                        </tr>
                        <tr>
                            <td>Kode <?php echo e(ucwords($setting->sebutan_desa)); ?></td>
                            <td>:</td>
                            <td><?php echo e(kode_wilayah($main['kode_desa'])); ?></td>
                        </tr>
                        <tr>
                            <td>Kode Pos <?php echo e(ucwords($setting->sebutan_desa)); ?></td>
                            <td>:</td>
                            <td><?php echo e($main['kode_pos']); ?></td>
                        </tr>
                        <tr>
                            <td>Nama <?php echo e(ucwords($setting->sebutan_kepala_desa)); ?></td>
                            <td>:</td>
                            <td><?php echo e($main['nama_kepala_desa']); ?></td>
                        </tr>
                        <tr>
                            <td>NIP <?php echo e(ucwords($setting->sebutan_kepala_desa)); ?></td>
                            <td>:</td>
                            <td><?php echo e($main['nip_kepala_desa']); ?></td>
                        </tr>
                        <tr>
                            <td>Alamat Kantor <?php echo e(ucwords($setting->sebutan_desa)); ?></td>
                            <td>:</td>
                            <td><?php echo e($main['alamat_kantor']); ?></td>
                        </tr>
                        <tr>
                            <td>E-Mail <?php echo e(ucwords($setting->sebutan_desa)); ?></td>
                            <td>:</td>
                            <td><?php echo e($main['email_desa']); ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon <?php echo e(ucwords($setting->sebutan_desa)); ?></td>
                            <td>:</td>
                            <td><?php echo e($main['telepon']); ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Ponsel <?php echo e(ucwords($setting->sebutan_desa)); ?></td>
                            <td>:</td>
                            <td><?php echo e($main['nomor_operator']); ?></td>
                        </tr>
                        <tr>
                            <td>Website <?php echo e(ucwords($setting->sebutan_desa)); ?></td>
                            <td>:</td>
                            <td><?php echo e($main['website']); ?></td>
                        </tr>
                        <tr>
                            <th colspan="3" class="subtitle_head">
                                <strong><?php echo e(strtoupper($setting->sebutan_kecamatan)); ?></strong>
                            </th>
                        </tr>
                        <tr>
                            <td>Nama <?php echo e(ucwords($setting->sebutan_kecamatan)); ?></td>
                            <td>:</td>
                            <td><?php echo e($main['nama_kecamatan']); ?></td>
                        </tr>
                        <tr>
                            <td>Kode <?php echo e(ucwords($setting->sebutan_kecamatan)); ?></td>
                            <td>:</td>
                            <td><?php echo e(kode_wilayah($main['kode_kecamatan'])); ?></td>
                        </tr>
                        <tr>
                            <td>Nama <?php echo e(ucwords($setting->sebutan_camat)); ?></td>
                            <td>:</td>
                            <td><?php echo e($main['nama_kepala_camat']); ?></td>
                        </tr>
                        <tr>
                            <td>NIP <?php echo e(ucwords($setting->sebutan_camat)); ?></td>
                            <td>:</td>
                            <td><?php echo e($main['nip_kepala_camat']); ?></td>
                        </tr>
                        <tr>
                            <th colspan="3" class="subtitle_head">
                                <strong><?php echo e(strtoupper($setting->sebutan_kabupaten)); ?></strong>
                            </th>
                        </tr>
                        <tr>
                            <td>Nama <?php echo e(ucwords($setting->sebutan_kabupaten)); ?></td>
                            <td>:</td>
                            <td><?php echo e($main['nama_kabupaten']); ?></td>
                        </tr>
                        <tr>
                            <td>Kode <?php echo e(ucwords($setting->sebutan_kabupaten)); ?></td>
                            <td>:</td>
                            <td><?php echo e(kode_wilayah($main['kode_kabupaten'])); ?></td>
                        </tr>
                        <tr>
                            <th colspan="3" class="subtitle_head"><strong>PROVINSI</strong></th>
                        </tr>
                        <tr>
                            <td>Nama Provinsi</td>
                            <td>:</td>
                            <td><?php echo e($main['nama_propinsi']); ?></td>
                        </tr>
                        <tr>
                            <td>Kode Provinsi</td>
                            <td>:</td>
                            <td><?php echo e(kode_wilayah($main['kode_propinsi'])); ?></td>
                        </tr>
                        <tr>
                            <th colspan="3" class="subtitle_head"><strong>KONTAK PEMBERITAHUAN</strong></th>
                        </tr>
                        <tr>
                            <td>Nama Perangkat Desa</td>
                            <td>:</td>
                            <td><?php echo e($main['nama_kontak']); ?></td>
                        </tr>
                        <tr>
                            <td>No. HP/WA</td>
                            <td>:</td>
                            <td><?php echo e($main['hp_kontak']); ?></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>:</td>
                            <td><?php echo e($main['jabatan_kontak']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/identitas_desa/index.blade.php ENDPATH**/ ?>
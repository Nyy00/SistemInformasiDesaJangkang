                <div class="tab-pane <?php echo e($act_tab == 1 ? 'active' : ''); ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-header with-border">
                                <h3 class="box-title"><strong>Backup SID</strong></h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <?php if($inkremental != null && $inkremental->status == '1'): ?>
                                            <p class="text-muted text-blue well well-sm no-shadow" style="margin-top: 10px;">
                                                <small>
                                                    <?php if($inkremental->ukuran == '0 Bytes'): ?>
                                                        <strong class="text-red"><i class="fa fa-info-circle text-red"></i> Tidak ada file terbaru untuk dibackup.</strong>
                                                    <?php else: ?>
                                                        <strong><i class="fa fa-info-circle text-blue"></i> Backup inkremental sudah selesai dan siap untuk didownload</strong>
                                                    <?php endif; ?>
                                                </small>
                                            </p>
                                        <?php elseif($inkremental->status == '-1'): ?>
                                            <p class="text-muted text-blue well well-sm no-shadow" style="margin-top: 10px;">
                                                <small>
                                                    <strong class="text-red"><i class="fa fa-info-circle text-red"></i> Backup Gagal, Informasi gagal ada di log Error</strong>
                                                </small>
                                            </p>
                                        <?php endif; ?>
                                        <form class="form-horizontal">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <?php if(!setting('multi_desa')): ?>
                                                        <tr>
                                                            <td class="col-sm-10"><b>Backup Seluruh Database SID <code>(.sql)</code></b></td>
                                                            <td class="col-sm-2">
                                                                <a href="<?php echo e(ci_route('database.exec_backup')); ?>" class="btn btn-social btn-flat btn-block btn-info btn-sm <?php echo e($memory_limit ? '' : 'disabled'); ?>"
                                                                    title="Perkiraan ukuran file backup sql berdasarkan jumlah tabel dan baris data adalah <?php echo e($size_sql); ?>"
                                                                ><i class="fa fa-download"></i> Unduh Database <b><code><?php echo e($size_sql); ?></code></b></a>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <tr>
                                                        <td class="col-sm-10"><b>Backup Seluruh Database SID <code>(.sid)</code></b></td>
                                                        <td class="col-sm-2">
                                                            <a href="<?php echo e(ci_route('multiDB.backup')); ?>" class="btn btn-social btn-flat btn-block btn-info btn-sm <?php echo e($memory_limit ? '' : 'disabled'); ?>"
                                                                title="Perkiraan ukuran file backup sql berdasarkan jumlah tabel dan baris data adalah <?php echo e($size_sql); ?>"
                                                            ><i class="fa fa-download"></i> Unduh Database <b><code><?php echo e($size_sql); ?></code></b></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-sm-10"><b>Backup Seluruh Folder Desa SID <code>(.zip)</code></b> </td>
                                                        <td class="col-sm-2">
                                                            <a href="<?php echo e(ci_route('database.desa_backup')); ?>" class="btn btn-social btn-flat btn-block btn-info btn-sm" title="Perkiraan ukuran folder desa sebelum di compress adalah <?php echo e($size_folder); ?>"><i class="fa fa-download"></i> Unduh Folder Desa
                                                                <b><code><?php echo e($size_folder); ?></code></b></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-sm-10"><b>Backup Inkremental Folder Desa SID <code>(.zip)</code></b> </td>
                                                        <td class="col-sm-2">
                                                            <div class="btn-group" style="width:100%">
                                                                <button
                                                                    type="button"
                                                                    class="btn btn-social btn-flat <?php echo e($inkremental->status == '0' ? 'btn-warning' : 'btn-info'); ?> btn-info btn-sm"
                                                                    id="Inkremental"
                                                                    data-toggle="dropdown"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    style="width: calc(100% - 25px);"
                                                                ><i class="fa fa-download"></i> <?php echo e($inkremental->status == '0' ? 'Backup Sedang Dalam Proses' : 'Backup Inkremental'); ?></button>
                                                                <button type="button" class="btn btn-flat btn-sm dropdown-toggle <?php echo e($inkremental->status == '0' ? 'btn-warning' : 'btn-info'); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height: 23px;">
                                                                    <span class="caret"></span>
                                                                    <span class="sr-only">Toggle Dropdown</span>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <?php if($inkremental == null || $inkremental->status == '2' || $inkremental->status == '-1'): ?>
                                                                        <li><a href="#" id="buat-job">Buat Backup Inkremental</a></li>
                                                                    <?php endif; ?>
                                                                    <?php if($inkremental != null && $inkremental->status == '1' && $inkremental->ukuran != '0 Bytes'): ?>
                                                                        <li><a href="<?php echo e(ci_route('database.inkremental_download')); ?>">Download Backup Inkremental</a></li>
                                                                    <?php endif; ?>
                                                                    <li><a href="<?php echo e(ci_route('database.desa_inkremental')); ?>">Lihat Riwayat</a></li>
                                                                    <?php if($inkremental->status == '0'): ?>
                                                                        <li><a href="<?php echo e(ci_route('database.batal_backup')); ?>">Batalkan Proses Backup</a></li>
                                                                    <?php endif; ?>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                        <p>Proses Unduh akan mengunduh keseluruhan database SID anda.</p>
                                        <div class="row">
                                            <ul>
                                                <li> Usahakan untuk melakukan backup secara rutin dan terjadwal. </li>
                                                <li> Backup yang dihasilkan sebaiknya disimpan di komputer terpisah dari server SID. </li>
                                                <li> Untuk restore database ke OpenSID Database Gabungan, bisa gunakan backup database <code>.sid</code></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(can('u') && !config_item('demo_mode')): ?>

                            <?php if(!setting('multi_desa')): ?>
                                <div class="col-md-12">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><strong>Restore Database SID</strong></h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p>Backup yang dibuat dapat dipergunakan untuk mengembalikan database SID anda apabila ada masalah. Klik tombol Restore di bawah untuk menggantikan keseluruhan database SID dengan data hasil backup terdahulu.</p>
                                                <form action="<?php echo e($form_action); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    <p>Batas maksimal pengunggahan berkas <strong><?php echo e(max_upload()); ?> MB.</strong></p>
                                                    <p>Proses ini akan membutuhkan waktu beberapa menit, menyesuaikan dengan spesifikasi komputer server SID dan sambungan internet yang tersedia.</p>
                                                    <p></p>
                                                    <table class="table table-bordered table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding-top:20px;padding-bottom:10px;">
                                                                    <div class="form-group">
                                                                        <label for="file" class="col-md-2 col-lg-3 control-label">Pilih File .Sql:</label>
                                                                        <div class="col-sm-12 col-md-5 col-lg-5">
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" id="file_path" name="userfile">
                                                                                <input type="file" class="hidden" id="file" name="userfile" data-submit="restore" accept=".sql">
                                                                                <span class="input-group-btn">
                                                                                    <button type="button" class="btn btn-info btn-flat" id="file_browser"><i class="fa fa-search"></i> Browse</button>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-3 col-lg-2">
                                                                            <button type="submit" id="restore" class="btn btn-block btn-success btn-sm " disabled="disabled"><i class="fa fa-spin fa-refresh"></i>Restore</button>
                                                                        </div>
                                                                        <div class="col-md-2 col-lg-3"></div>
                                                                        <div class="col-sm-12 col-md-5 col-lg-5">
                                                                            <input type="checkbox" id="hapus_token" name="hapus_token" value="N">
                                                                            <label for="hapus_token">Amankan Token Layanan Saat Ini</label><br>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if(setting('multi_desa')): ?>
                                <div class="col-md-12">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><strong>Restore Database SID</strong></h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p>Backup yang dibuat dapat dipergunakan untuk mengembalikan database SID anda apabila ada masalah. Klik tombol Restore di bawah untuk menggantikan keseluruhan database SID dengan data hasil backup terdahulu.</p>
                                                <form action="<?php echo e($form_action); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    <p>Batas maksimal pengunggahan berkas <strong><?php echo e(max_upload()); ?> MB.</strong></p>
                                                    <p>Proses ini akan membutuhkan waktu beberapa menit, menyesuaikan dengan spesifikasi komputer server SID dan sambungan internet yang tersedia.</p>
                                                    <p></p>
                                                    <table class="table table-bordered table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding-top:20px;padding-bottom:10px;">
                                                                    <div class="form-group">
                                                                        <label for="file" class="col-md-2 col-lg-3 control-label">Pilih File .sid:</label>
                                                                        <div class="col-sm-12 col-md-5 col-lg-5">
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" id="file_path" name="userfile">
                                                                                <input type="file" class="hidden" id="file" name="userfile" data-submit="restore" accept=".sid">
                                                                                <span class="input-group-btn">
                                                                                    <button type="button" class="btn btn-info btn-flat" id="file_browser"><i class="fa fa-search"></i> Browse</button>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-3 col-lg-2">
                                                                            <button type="submit" id="restore" class="btn btn-block btn-success btn-sm " disabled="disabled"><i class="fa fa-spin fa-refresh"></i>Restore</button>
                                                                        </div>
                                                                        <div class="col-md-2 col-lg-3"></div>
                                                                        <div class="col-sm-12 col-md-5 col-lg-5">
                                                                            <input type="checkbox" id="hapus_token" name="hapus_token" value="N">
                                                                            <label for="hapus_token">Amankan Token Layanan Saat Ini</label><br>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="col-md-12">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><strong>Restore Folder Desa </strong></h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p>Backup yang dibuat dapat dipergunakan untuk mengembalikan folder desa anda apabila ada masalah. Klik tombol Restore di bawah untuk menggantikan folder desa dengan data hasil backup terdahulu.</p>
                                            <p>Batas maksimal pengunggahan berkas <strong><?php echo e(max_upload()); ?> MB.</strong></p>
                                            <p>Proses ini akan membutuhkan waktu beberapa menit, menyesuaikan dengan spesifikasi komputer server SID dan sambungan internet yang tersedia.</p>
                                            <p></p>
                                            <table class="table table-bordered table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td style="padding-top:20px;padding-bottom:10px;">
                                                            <div class="form-group">
                                                                <label for="file" class="col-md-2 col-lg-3 control-label">Pilih File .zip:</label>
                                                                <div class="col-sm-12 col-md-5 col-lg-5">
                                                                    <div class="input-group input-group-sm">
                                                                        <input type="text" class="form-control" id="file_path1" name="folder_desa">
                                                                        <input type="file" class="hidden" id="file1" name="folder_desa" data-submit="restore-desa" accept="zip,application/zip,application/x-zip,application/x-zip-compressed">
                                                                        <span class="input-group-btn">
                                                                            <button type="button" class="btn btn-info btn-flat" id="file_browser1"><i class="fa fa-search"></i> Browse</button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-3 col-lg-2">
                                                                    <button type="button" id="restore-desa" class="btn btn-block btn-success btn-sm <?php echo e($restore == true ? 'hidden' : ''); ?>" disabled="disabled"><i class="fa fa-spin fa-refresh"></i>Restore</button>
                                                                    <a class="btn btn-block btn-warning btn-sm <?php echo e($restore == false ? 'hidden' : ''); ?>" href="<?php echo e(ci_route('database.batal_restore')); ?>"><i class="fa fa-spin fa-refresh"></i>Batalkan proses restore</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                </div>
                </div>
                </section>
                </div>
                <?php $__env->startPush('css'); ?>
                    <link rel="stylesheet" href="<?php echo e(asset('js/sweetalert2/sweetalert2.min.css')); ?>">
                <?php $__env->stopPush(); ?>
                <?php $__env->startPush('scripts'); ?>
                    <script src="<?php echo e(asset('js/sweetalert2/sweetalert2.all.min.js')); ?>"></script>
                    <script src="<?php echo e(asset('js/backup.min.js')); ?>"></script>

                    <?php if(!$memory_limit): ?>
                        <script>
                            $("#maincontent").prepend(
                                `
            <div class="callout callout-warning">
                <h4><i class="fa fa-warning"></i>&nbsp;&nbsp;Informasi</h4>
                <p>Backup tidak dapat dilakukan karena keterbatasan memori belum sesuai, silahkan periksa <a href="<?php echo e(base_url('info_sistem#ekstensi')); ?>">disini.</a></p>
            </div>
            `
                            );
                        </script>
                    <?php endif; ?>
                <?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/database/backup.blade.php ENDPATH**/ ?>
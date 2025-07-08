<?php echo $__env->make('admin.pengaturan_surat.asset_tinymce', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.jquery_ui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startPush('css'); ?>
    <style>
        .scroll {
            height: 500px;
            overflow-y: auto;
        }

        .huge {
            font-size: 40px;
        }

        .bottom {
            display: flex;
            align-items: self-end;
        }

        ul.tree-folder {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        ul.tree-folder ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        ul.tree-folder ul {
            margin-left: 10px;
        }

        ul.tree-folder li {
            margin: 0;
            padding: 5px 7px;
            line-height: 20px;
            color: #369;
            font-weight: bold;
            border-left: 1px solid rgb(100, 100, 100);
        }

        ul.tree-folder li:last-child {
            border-left: none;
        }

        ul.tree-folder li:before {
            position: relative;
            top: -0.3em;
            height: 1em;
            width: 12px;
            color: white;
            border-bottom: 1px solid rgb(100, 100, 100);
            content: "";
            display: inline-block;
            left: -7px;
        }

        ul.tree-folder li:last-child:before {
            border-left: 1px solid rgb(100, 100, 100);
        }

        ul.tree-folder li i {
            position: absolute;
            right: 40px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title'); ?>
    <h1>
        Info Sistem
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Info Sistem</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if($disk): ?>
        <div class="row">
            <div class="col-md-6">
                <div class="panel bg-yellow">
                    <div class="panel-heading">
                        <div class="row bottom">
                            <div class="col-xs-2">
                                <h1><i class="fa fa-hdd-o"></i></h1>
                            </div>
                            <div class="col-xs-10 text-right">
                                <div class="huge"><small style="font-size:60%"><?php echo e($total_space); ?></small></div>
                                <div>Total Ruang Penyimpanan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel bg-green">
                    <div class="panel-heading">
                        <div class="row bottom">
                            <div class="col-xs-2">
                                <h1><i class="fa fa-hdd-o"></i></h1>
                            </div>
                            <div class="col-xs-10 text-right">
                                <div class="huge"><small style="font-size:60%"><?php echo e($free_space); ?></small></div>
                                <div>Sisa Ruang Penyimpanan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <form id="mainform" name="mainform" method="post">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#log_viewer">Logs</a></li>
                <li><a data-toggle="tab" onclick="loadDatatable()" href="#log_login">Log Login</a></li>
                <li><a data-toggle="tab" href="#ekstensi">Kebutuhan Sistem</a></li>
                <?php if(ci_auth()->id == super_admin()): ?>
                    <li><a data-toggle="tab" href="#info_sistem">Info Sistem</a></li>
                <?php endif; ?>
                <li><a data-toggle="tab" href="#optimasi">Optimasi</a></li>
                <li><a data-toggle="tab" href="#folder_desa">Folder Desa</a></li>
                <li><a data-toggle="tab" onclick="loadFileDesa(this)" data-url="<?php echo e(ci_route('info_sistem.file_desa')); ?>" href="#file_desa">File Unggah Desa</a></li>
            </ul>
            <div class="tab-content">
                <div id="log_viewer" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">File logs</h3>
                                    <?php if(can('h') && $files): ?>
                                        <div class="box-tools">
                                            <span class="label pull-right"><input type="checkbox" id="checkall" class="checkall" />
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="box-body no-padding">
                                    <ul class="nav nav-pills nav-stacked scroll">
                                        <?php if(empty($files)): ?>
                                            <li><a href="#"><?= $file ?>File log tidak ditemukan</a></li>
                                        <?php else: ?>
                                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li <?php echo e(jecho($currentFile, $file, 'class="active"')); ?>><a href="?f=<?php echo e(base64_encode($file)); ?>">
                                                        <?php echo e($file); ?>

                                                        <?php if(can('h')): ?>
                                                            <span class="pull-right-container">
                                                                <span class="label pull-right"><input type="checkbox" class="checkbox" name="id_cb[]" value="<?php echo e($file); ?>" />
                                                    </a></span>
                                                    </span>
                                            <?php endif; ?>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <?php if($currentFile): ?>
                                        <a href="?dl=<?php echo e(base64_encode($currentFile)); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block " title="Unduh file log"><i class="fa fa-download"></i> Unduh</a>
                                        <?php if(can('h')): ?>
                                            <a href="#" data-href="?del=<?php echo e(base64_encode($currentFile)); ?>" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block " title="Hapus log file" data-toggle="modal"
                                                data-target="#confirm-delete"
                                            ><i class="fa fa-trash-o"></i>Hapus log file</a>
                                            <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?php echo e(route($controller . '.remove_log')); ?>?f=<?php echo e(base64_encode($currentFile)); ?>')"
                                                class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"
                                            ><i class='fa fa-trash-o'></i> Hapus Data Terpilih</a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="table-responsive">
                                                            <?php if(null === $logs): ?>
                                                                <div>
                                                                    <strong>File log kosong atau lebih dari 500 Mb, silahkan unduh.</strong>
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="table-responsive">
                                                                    <table id="tabel-logs" class="table table-bordered dataTable table-striped table-hover tabel-daftar">
                                                                        <thead class="bg-gray">
                                                                            <tr>
                                                                                <th>Level</th>
                                                                                <th>Tanggal</th>
                                                                                <th>Pesan</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <tr>
                                                                                    <td class="padat">
                                                                                        <h6><span class="label label-<?php echo e($log['class']); ?>"><?php echo e($log['level']); ?></span></h6>
                                                                                    </td>
                                                                                    <td class="padat"><?php echo e($log['date']); ?></td>
                                                                                    <td class="text">
                                                                                        <?php if(array_key_exists('extra', $log)): ?>
                                                                                            <a class="pull-right btn btn-primary btn-xs" data-toggle="collapse" href="#collapse<?php echo e($key); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($key); ?>">
                                                                                                <span class="glyphicon glyphicon-search"></span>
                                                                                            </a>
                                                                                        <?php endif; ?>
                                                                                        <?php echo e(strip_tags($log['content'])); ?>

                                                                                        <?php if(array_key_exists('extra', $log)): ?>
                                                                                            <div class="collapse" id="collapse<?php echo e($key); ?>">
                                                                                                <?php echo e(strip_tags($log['extra'])); ?>

                                                                                            </div>
                                                                                        <?php endif; ?>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="log_login" class="tab-pane fade in">
                    <?php echo $__env->make('admin.setting.info_sistem.log_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div id="ekstensi" class="tab-pane fade in">
                    <?php if($mysql['cek']): ?>
                        <div class="alert alert-success" role="alert">
                            <p>Versi Database terpasang <?php echo e($mysql['versi']); ?> sudah memenuhi syarat.</p>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger" role="alert">
                            <p>Versi Database terpasang <?php echo e($mysql['versi']); ?> tidak memenuhi syarat.</p>
                            <p>Update versi Database supaya minimal <?php echo e(minMySqlVersion); ?> dan maksimal <?php echo e(maxMySqlVersion); ?>, atau MariaDB supaya minimal <?php echo e(minMariaDBVersion); ?>.</p>
                        </div>
                    <?php endif; ?>
                    <?php if($php['cek']): ?>
                        <div class="alert alert-success" role="alert">
                            <p>Versi PHP terpasang <?php echo e($php['versi']); ?> sudah memenuhi syarat.</p>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger" role="alert">
                            <p>Versi PHP terpasang <?php echo e($php['versi']); ?> tidak memenuhi syarat.</p>
                            <p>Update versi PHP supaya minimal <?php echo e(minPhpVersion); ?> dan maksimal <?php echo e(maxPhpVersion); ?>.</p>
                        </div>
                    <?php endif; ?>
                    <?php if(!$ekstensi['lengkap'] || !$disable_functions['lengkap']): ?>
                        <div class="alert alert-danger" role="alert">
                            <p>Ada beberapa ekstensi dan fungsi PHP wajib yang tidak tersedia di sistem anda.
                                Karena itu, mungkin ada fungsi yang akan bermasalah.</p>
                            <p>Aktifkan ekstensi dan fungsi PHP yang belum ada di sistem anda.</p>
                        </div>
                    <?php else: ?>
                        <p>
                            Semua ekstensi PHP yang diperlukan sudah aktif di sistem anda.
                        </p>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>EKSTENSI</h4>
                            <?php $__currentLoopData = $ekstensi['ekstensi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group">
                                    <h5><i class="fa fa-<?php echo e($value ? 'check-circle-o' : 'times-circle-o'); ?> fa-lg" style="color:<?php echo e($value ? 'green' : 'red'); ?>"></i>&nbsp;&nbsp;<?php echo e($key); ?></h5>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php if($disable_functions['functions']): ?>
                            <div class="col-sm-6">
                                <h4>FUNGSI</h4>
                                <?php $__currentLoopData = $disable_functions['functions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $func => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-group">
                                        <h5><i class="fa fa-<?php echo e($val ? 'check-circle-o' : 'times-circle-o'); ?> fa-lg" style="color:<?php echo e($val ? 'green' : 'red'); ?>"></i>&nbsp;&nbsp;<?php echo e($func); ?></h5>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>KEBUTUHAN SISTEM</h4>
                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered dataTable table-striped table-hover tabel-daftar">
                                                <tbody>
                                                    <?php $__currentLoopData = $kebutuhan_sistem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td class="text"><?php echo e("{$key} ({$val['v']})"); ?></td>
                                                            <td class="text"><?php echo e($val[$key]); ?></td>
                                                            <td>
                                                                <i class="fa fa-<?php echo e($val['result'] ? 'check-circle-o' : 'times-circle-o'); ?> fa-lg" style="color:<?php echo e($val['result'] ? 'green' : 'red'); ?>"></i>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php if(ci_auth()->id == super_admin()): ?>
                    <div id="info_sistem" class="tab-pane fade in">
                    <?php
                        ob_start();
                        if (ENVIRONMENT === 'production') :
                            phpinfo(INFO_ALL & ~INFO_GENERAL & ~INFO_MODULES & ~INFO_ENVIRONMENT & ~INFO_VARIABLES);
                        else :
                            phpinfo();
                        endif;

                        $phpinfo = ['phpinfo' => []];

                        if (preg_match_all('#(?:<h2>(?:<a name=".*?">)?(.*?)(?:</a>)?</h2>)|(?:<tr(?: class=".*?")?><t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>(?:<t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>(?:<t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>)?)?</tr>)#s', ob_get_clean(), $matches, PREG_SET_ORDER)) :
                            foreach ($matches as $match) :
                                if ($match[1] !== '') :
                                    $phpinfo[$match[1]] = [];
                                elseif (isset($match[3])) :
                                    $phpinfo[end(array_keys($phpinfo))][$match[2]] = isset($match[4]) ? [$match[3], $match[4]] : $match[3];
                                else :
                                    $phpinfo[end(array_keys($phpinfo))][] = $match[2];
                                endif;
                            endforeach;
                        
                        $i = 0;
                    ?>
                    <?php $__currentLoopData = $phpinfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $i++; ?>
                        <?php if($i == 1): ?>
                            <div class='table-responsive'>
                                <table class='table table-bordered dataTable table-hover'>
                        <?php else: ?>
                            <h3><?php echo e($name); ?></h3>
                            <div class='table-responsive'>
                                <table class='table table-bordered dataTable table-hover'>
                        <?php endif; ?>
                        <?php $__currentLoopData = $section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(is_array($val)): ?>
                                <tr>
                                    <td class="col-md-4 info"><?php echo $key; ?></td>
                                    <td><?php echo $val[0]; ?></td>
                                    <td><?php echo $val[1]; ?></td>
                                </tr>
                            <?php elseif(is_string($key)): ?>
                                <tr>
                                    <td class="col-md-4 info"><?php echo $key; ?></td>
                                    <td colspan='2'><?php echo $val; ?></td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td class="btn-primary" colspan='3'><?= $val ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                
            </div>
            <?php endif; ?>

            <div id="optimasi" class="tab-pane fade in">
                <div class="row">
                    <div class="col-sm-6">
                        <h5><b>CACHE</b></h5>
                        <div class="input-group">
                            <input type="text" class="form-control" value="<?php echo e(str_replace(['\\', '//'], ['/', '/'], config('cache.stores.file.path'))); ?>" readonly>
                            <?php if(can('u')): ?>
                                <span class="input-group-btn">
                                    <a href="<?php echo e(route($controller . '.cache_desa')); ?>" class="btn btn-info btn-flat">Bersihkan</a>
                                </span>
                            <?php endif; ?>
                        </div>
                        <hr>
                        <div class="input-group">
                            <input type="text" class="form-control" value="<?php echo e(str_replace(['\\', '//'], ['/', '/'], config('view.compiled'))); ?>" readonly>
                            <?php if(can('u')): ?>
                                <span class="input-group-btn">
                                    <a href="<?php echo e(route($controller . '.cache_blade')); ?>" class="btn btn-info btn-flat">Bersihkan</a>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="folder_desa" class="tab-pane fade in">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-header">
                            <div>
                                <?php if($check_permission): ?>
                                    <?php if(can('u')): ?>
                                        <a href="#" onclick="updatePermission(this)" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block " title="Set hak akses folder"><i class="fa fa-check"></i> Perbaiki hak akses
                                            folder</a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="alert alert-info alert-dismissible">
                                        <p>OS menggunakan Windows tidak membutuhkan cek permission</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="css-treeview">
                                <?php
                                    $folders = directory_map(DESAPATH);
                                    echo create_tree_folder($folders, DESAPATH);
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div id="file_desa" class="tab-pane fade in"></div>
        </div>
        </div>
    </form>

    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(function() {

            var url = document.location.toString();
            if (url.match('#')) {
                $('[href="#ekstensi"]').click();
            }

            $('#tabel-logs').DataTable({
                "processing": true,
                "autoWidth": false,
                "serverSide": false,
                'pageLength': 10,
                "order": [
                    [1, "desc"]
                ],
                "columnDefs": [{
                    "targets": [0, 2],
                    "orderable": false
                }]
            });

            function checkAll(id = "#checkall") {
                $('.box-header').on('click', id, function() {
                    if ($(this).is(':checked')) {
                        $(".nav input[type=checkbox]").each(function() {
                            $(this).prop("checked", true);
                        });
                    } else {
                        $(".nav input[type=checkbox]").each(function() {
                            $(this).prop("checked", false);
                        });
                    }
                    $(".nav input[type=checkbox]").change();
                    enableHapusTerpilih();
                });
                $("[data-toggle=tooltip]").tooltip();
            }

            checkAll();
            $('ul.nav').on('click', "input[name='id_cb[]']", function() {
                enableHapusTerpilih();
            });

            function enableHapusTerpilih() {
                if ($("input[name='id_cb[]']:checked:not(:disabled)").length <= 0) {
                    $(".hapus-terpilih").addClass('disabled');
                    $(".hapus-terpilih").attr('href', '#');
                } else {
                    $(".hapus-terpilih").removeClass('disabled');
                    $(".hapus-terpilih").attr('href', '#confirm-delete');
                }
            }
        });

        function updatePermission(elm) {
            let _folderDesa = $(elm).closest('#folder_desa');
            let _data = []
            _folderDesa.find('.box-body li.text-red').each(function(i, v) {
                _data.push($(v).data('path'))
            })

            if (_data.length) {
                Swal.fire({
                    title: 'Sedang Menyimpan',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });
                $.ajax({
                    url: 'info_sistem/set_permission_desa',
                    dataType: "JSON",
                    data: {
                        folders: _data
                    },
                    type: "POST",
                    success: function(data) {
                        if (data.status) {
                            Swal.fire({
                                'icon': 'success',
                                'title': 'Success',
                                'timer': 2000,
                                'text': data.message
                            }).then((result) => {
                                window.location.reload();
                            })
                        } else {
                            Swal.fire({
                                'icon': 'error',
                                'title': 'Error',
                                'timer': 2000,
                                'text': data.message
                            })
                        }
                    }
                })
            } else {
                Swal.fire({
                    'icon': 'info',
                    'title': 'Info',
                    'timer': 2000,
                    'text': 'Tidak ada yang harus diubah permissionnya'
                })
            }
        }

        function loadFileDesa(elm) {
            const _url = $(elm).data('url')
            const _target = $(elm).attr('href')

            if ($(_target).html() == '') {
                $(_target).html('Memuat data dari server .....')
                $.get(_url, function(data) {
                    $(_target).html(data)
                }, 'html')
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/setting/info_sistem/index.blade.php ENDPATH**/ ?>
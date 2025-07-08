<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.jquery_ui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>
        Wilayah Administratif <?php echo e($wilayah); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Wilayah Administratif <?php echo e($wilayah); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <?php if(can('u')): ?>
                <a href="<?php echo e(ci_route('wilayah.form_' . $level, $parent)); ?>" id="btn-add" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
            <?php endif; ?>
            <?php if($level == 'dusun'): ?>
                <a
                    href="<?php echo e(ci_route('wilayah.dialog.cetak')); ?>"
                    class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                    title="Cetak Data"
                    data-remote="false"
                    data-toggle="modal"
                    data-target="#modalBox"
                    data-title="Cetak Data"
                ><i class="fa fa-print "></i> Cetak</a>
                <a
                    href="<?php echo e(ci_route('wilayah.dialog.unduh')); ?>"
                    title="Unduh Data"
                    class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                    title="Unduh Data"
                    data-remote="false"
                    data-toggle="modal"
                    data-target="#modalBox"
                    data-title="Unduh Data"
                ><i class="fa fa-download"></i> Unduh</a>
            <?php else: ?>
                <a href='<?php echo e(ci_route('wilayah.cetak_' . $level, $parent)); ?>' class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Cetak Data" target="_blank"><i class="fa fa-print "></i> Cetak</a>
                <a href='<?php echo e(ci_route('wilayah.unduh_' . $level, $parent)); ?>' title="Unduh Data" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Unduh Data" target="_blank"><i class="fa fa-download"></i> Unduh</a>
            <?php endif; ?>

            <?php if($parent): ?>
                <a href="<?php echo e($backUrl); ?>" class="btn btn-social btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                    <i class="fa fa-arrow-circle-left "></i>Kembali ke Wilayah Administratif
                    <?php echo e($level == 'rt' ? 'RW' : 'Dusun'); ?>

                </a>
            <?php endif; ?>
        </div>
        <?php if($title): ?>
            <div class="box-header">
                <strong><?php echo e($title); ?></strong>
            </div>
        <?php endif; ?>
        <div class="box-body">
            <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabeldata">
                    <thead>
                        <tr>
                            <th class="padat">#</th>
                            <th class="padat">No</th>
                            <th class="padat">Aksi</th>
                            <th><?php echo e($wilayah); ?></th>
                            <?php if($level == 'dusun'): ?>
                                <th><?php echo e(ucwords(setting('sebutan_kepala_dusun'))); ?></th>
                                <th>NIK <?php echo e(ucwords(setting('sebutan_kepala_dusun'))); ?></th>
                            <?php else: ?>
                                <th><?php echo e($jabatan); ?> <?php echo e($wilayah); ?></th>
                                <th>NIK <?php echo e($jabatan); ?> <?php echo e($wilayah); ?></th>
                            <?php endif; ?>
                            <th style="width:5%">RW</th>
                            <th style="width:5%">RT</th>
                            <th style="width:5%">KK</th>
                            <th style="width:5%">L+P</th>
                            <th style="width:5%">L</th>
                            <th style="width:5%">P</th>
                        </tr>
                    </thead>
                    <tbody id="dragable">
                    </tbody>
                    <tfoot>
                        <th colspan="5">Total</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tfoot>
                </table>
            </div>
            </form>
        </div>
    </div>

    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var level = "<?php echo e($level); ?>";
            const refreshOrder = '<?php echo e($refreshOrder ? true : false); ?>'

            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(ci_route('wilayah.datatables')); ?>?parent=<?php echo e($parent); ?>&level=<?php echo e($level); ?>",
                    data: function(req) {}
                },
                columns: [{
                        data: 'drag-handle',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'DT_RowIndex',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'aksi',
                        class: 'aksi',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: '<?php echo e($level); ?>',
                        name: '<?php echo e($level); ?>',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'kepala',
                        name: 'kepala',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'nik_kepala',
                        name: 'nik_kepala',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'rws_count',
                        name: 'rws_count',
                        defaultContent: '-',
                        searchable: false,
                        orderable: false,
                        visible: "<?php echo e(in_array($level, ['dusun']) ? 1 : 0); ?>"
                    },
                    {
                        data: 'rts_count',
                        name: 'rts_count',
                        defaultContent: '-',
                        searchable: false,
                        orderable: false,
                        visible: "<?php echo e(in_array($level, ['dusun', 'rw']) ? 1 : 0); ?>"
                    },
                    {
                        data: 'keluarga_aktif_count',
                        name: 'keluarga_aktif_count',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'penduduk_count',
                        name: 'penduduk_count',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'penduduk_pria_count',
                        name: 'penduduk_pria_count',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'penduduk_wanita_count',
                        name: 'penduduk_wanita_count',
                        searchable: false,
                        orderable: false
                    },
                ],
                aaSorting: [],
                createdRow: function(row, data, dataIndex) {
                    if ('<?php echo e($level); ?>' == 'rw') {
                        if (data.rw == '-') {
                            $(row).find('td').eq(3).replaceWith(
                                '<td colspan="2">Pergunakan RW ini apabila RT berada langsung di bawah <?php echo e($wilayah); ?>, yaitu tidak ada RW</td>'
                            )
                            $(row).find('td').eq(4).remove()
                        }
                    }

                    $(row).attr('data-id', data.id)
                    $(row).addClass('dragable-handle');
                },
                initComplete: function(settings, json) {
                    if (refreshOrder) {
                        // trigger update urut jika ada yang masih kosong
                        let order = [];
                        $('tr.dragable-handle').each(function(index, element) {
                            order.push($(this).attr('data-id'))
                        })
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: '<?php echo e(ci_route('wilayah.tukar')); ?>',
                            data: {
                                data: order,
                            },
                            success: function(response) {
                                if (response.status) {
                                    TableData.draw();
                                } else {
                                    TableData.draw();
                                }
                                refreshOrder = false
                            }
                        })
                    }
                },
                footerCallback: function(row, data, start, end, display) {
                    var api = this.api();

                    // Iterasi melalui setiap kolom dan menghitung total
                    for (var i = 5; i < api.columns().count(); i++) {
                        var columnData = api.column(i, {
                            page: 'current'
                        }).data();

                        // Menghitung total untuk kolom saat ini
                        var total = columnData.reduce(function(a, b) {
                            return a + parseFloat($(b).text());
                        }, 0);

                        // Menetapkan total ke elemen di bagian footer untuk kolom saat ini
                        $(api.column(i).footer()).html(total);
                    }
                }
            });

            if (level !== 'dusun') {
                if (level !== 'rw') {
                    TableData.column(7).visible(false);
                    if (hapus == 0 && ubah == 0) {
                        TableData.column(2).visible(false);
                    }
                }
                TableData.column(6).visible(false);
            }

            if (ubah == 0) {
                TableData.column(0).visible(false);
            }
            // harus diletakkan didalam blok ini, jika tidak maka object TableData tidak dikenal
            <?php echo $__env->make('admin.layouts.components.draggable', ['urlDraggable' => ci_route('wilayah.tukar')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/wilayah/index.blade.php ENDPATH**/ ?>
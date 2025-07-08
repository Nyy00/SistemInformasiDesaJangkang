<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>
        Artikel <?php echo e($kategori); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Artikel</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-3">
            <?php echo $__env->make('admin.web.artikel.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    <?php if(can('u') && !in_array($cat, ['0', '-1', null])): ?>
                        <a href="<?php echo e(ci_route('web.form', $cat)); ?>" id="btn-add" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah
                            <?php echo e($kategori ? $kategori : (in_array($cat, ['statis', 'agenda', 'keuangan']) ? ucfirst($cat) : '')); ?></a>
                    <?php endif; ?>
                    <?php if(can('h')): ?>
                        <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?php echo e(ci_route('web.delete')); ?>')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                                class='fa fa-trash-o'
                            ></i> Hapus Data Terpilih</a>
                        <?php if(!in_array($cat, ['0', '-1', 'statis', 'agenda', 'keuangan'])): ?>
                            <a href="#confirm-delete" title="Hapus Kategori <?php echo e($kategori); ?>" onclick="deleteAllBox('mainform', '<?php echo e(ci_route('web.hapus', $cat)); ?>')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i
                                    class='fa fa-trash-o'
                                ></i> Hapus Artikel Kategori <?php echo e($kategori); ?></a>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if($cat == 'statis'): ?>
                        <a href="<?php echo e(ci_route('web.reset', $cat)); ?>" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Reset Hit" data-toggle="modal" data-target="#reset-hit" data-remote="false"><i
                                class="fa fa-spinner"></i> Reset Hit</a>
                    <?php endif; ?>
                </div>
                <div class="box-body">
                    <div class="row mepet">
                        <div class="col-sm-2">
                            <select id="status" class="form-control input-sm select2">
                                <option value="">Pilih Status</option>
                                <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <hr class="batas">
                    <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="tabeldata">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkall" /></th>
                                    <th class="padat">NO</th>
                                    <th class="padat">AKSI</th>
                                    <th nowrap>JUDUL</th>
                                    <th nowrap>HIT</th>
                                    <th width="15%" nowrap>DIPOSTING PADA</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->renderWhen($cat == 'statis', 'admin.web.artikel.reset_hit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#status').val(1).trigger('change');

            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(ci_route('web.datatables')); ?>?cat=<?php echo e($cat); ?>",
                    data: function(req) {
                        req.status = $('#status').val();
                    }
                },
                columns: [{
                        data: 'ceklist',
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
                        data: 'judul',
                        name: 'judul',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'hit',
                        name: 'hit',
                        searchable: false,
                        orderable: true,
                        class: 'padat'
                    },
                    {
                        data: 'tgl_upload',
                        name: 'tgl_upload',
                        searchable: false,
                        orderable: true
                    },
                ],
                order: [
                    [5, 'desc']
                ],
            });

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            if (ubah == 0) {
                TableData.column(2).visible(false);
            }

            $('#status').change(function() {
                TableData.draw()
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/web/artikel/index.blade.php ENDPATH**/ ?>
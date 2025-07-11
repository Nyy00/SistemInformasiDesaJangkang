<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="box box-info">
    <div class="box-header">
        <?php if(can('u')): ?>
            <a href="<?php echo e(ci_route('surat_masuk.form')); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
        <?php endif; ?>
        <?php if(can('h')): ?>
            <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?php echo e(ci_route('surat_masuk.delete_all')); ?>')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                    class='fa fa-trash-o'></i> Hapus</a>
        <?php endif; ?>
        <a
            href="<?php echo e(ci_route('surat_masuk/dialog/cetak')); ?>"
            class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
            title="Cetak Agenda Surat Masuk"
            data-remote="false"
            data-toggle="modal"
            data-target="#modalBox"
            data-title="Cetak Agenda Surat Masuk"
        ><i class="fa fa-print "></i> Cetak</a>
        <a
            href="<?php echo e(ci_route('surat_masuk/dialog/unduh')); ?>"
            class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
            title="Unduh Agenda Surat Masuk"
            data-remote="false"
            data-toggle="modal"
            data-target="#modalBox"
            data-title="Unduh Agenda Surat Masuk"
        ><i class="fa fa-download"></i> Unduh</a>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-2">
                <select id="tahun" class="form-control input-sm select2">
                    <option value="">Pilih Tahun</option>
                    <?php $__currentLoopData = $tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <hr>
        <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

        <div class="table-responsive">
            <table class="table table-bordered table-hover tabel-daftar" id="tabeldata">
                <thead class="bg-gray">
                    <tr>
                        <th><input type="checkbox" id="checkall" /></th>
                        <th>No. Urut</th>
                        <th width="120">Aksi</th>
                        <th>Tanggal Penerimaan</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal Surat</th>
                        <th nowrap>Pengirim</th>
                        <th>Isi Singkat</th>
                    </tr>
                </thead>
            </table>
        </div>
        </form>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [
                    [3, 'desc']
                ],
                ajax: {
                    url: "<?php echo e(ci_route('surat_masuk.datatables')); ?>",
                    data: function(req) {
                        req.tahun = $('#tahun').val();
                    }
                },
                columns: [{
                        data: 'ceklist',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'nomor_urut',
                        class: 'padat'
                    },
                    {
                        data: 'aksi',
                        class: 'aksi',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'tanggal_penerimaan',
                        name: 'tanggal_penerimaan'
                    },
                    {
                        data: 'nomor_surat',
                        name: 'nomor_surat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'tanggal_surat',
                        name: 'tanggal_surat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'pengirim',
                        name: 'pengirim'
                    },
                    {
                        data: 'isi_singkat',
                        name: 'isi_singkat',
                        searchable: true,
                        orderable: false
                    },
                ],
            });

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            $('#tahun').change(function() {
                TableData.draw()
            })
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/surat_masuk/index.blade.php ENDPATH**/ ?>
<div class="box box-info">
    <form id="validasi" action="<?php echo e(ci_route('modul.ubah_server')); ?>" method="POST" class="form-horizontal">
        <div class="box-body">
            <h4>Pengaturan Server</h4>
            <div class="form-group">
                <label class="col-sm-3 control-label">Penggunaan <?php echo e(config_item('nama_aplikasi')); ?> di <?php echo e(ucwords(setting('sebutan_desa'))); ?></label>
                <div class="col-sm-9 col-lg-4">
                    <select class="form-control required input-sm" name="jenis_server" onchange="ubah_jenis_server($(this).val())">
                        <option value='' selected="selected">-- Pilih Penggunaan <?php echo e(config_item('nama_aplikasi')); ?> --</option>
                        <option value="1" <?= (setting('penggunaan_server') == '1') ? 'selected' : ''; ?>>
                            Offline saja di kantor desa
                        </option>
                        <option value="2" <?= (setting('penggunaan_server') == '2') ? 'selected' : ''; ?>>
                            Online saja di hosting
                        </option>
                        <option value="3" <?= (in_array(setting('penggunaan_server'), ['3', '5', '6'])) ? 'selected' : ''; ?>>
                            Offline di kantor desa dan online di hosting
                        </option>
                        <option value="4" <?= (setting('penggunaan_server') == '4') ? 'selected' : ''; ?>>
                            Offline dan online di kantor desa
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group" id="offline_online_hosting" style="<?php if(!in_array(setting('penggunaan_server'), ['3', '5', '6'])): ?> display: none; <?php endif; ?> ">
                <label class="col-sm-3 control-label">Server ini digunakan sebagai</label>
                <div class="col-sm-9 col-lg-4">
                    <select class="form-control input-sm" name="server_mana" onchange="ubah_server($(this).val())">
                        <option value='' selected="selected">-- Pilih Server Ini --</option>
                        <option value="5" <?= (setting('penggunaan_server') == '5') ? 'selected' : ''; ?>>
                            Offline admin saja di kantor desa
                        </option>
                        <option value="6" <?= (setting('penggunaan_server') == '6') ? 'selected' : ''; ?>>
                            Online web publik saja di hosting
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group" id="offline_ada_hosting" style="<?php if(setting('penggunaan_server') != '5'): ?> display: none; <?php endif; ?>">
                <label class="col-sm-3 control-label">Akses web pada server offline ini</label>
                <div class="col-sm-6 col-lg-4">
                    <select class="form-control input-sm" name="offline_mode">
                        <option value='' selected="selected">-- Pilih Akses Web --</option>
                        <option value="1" <?= (setting('penggunaan_server') == '5' && setting('offline_mode') == '1') ? 'selected' : ''; ?>>
                            Web bisa diakses petugas web
                        </option>
                        <option value="2" <?= (setting('penggunaan_server') == '5' && setting('offline_mode') == '2') ? 'selected' : ''; ?>>
                            Web non-aktif sama sekali
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group" id="offline_saja" style="<?php if(setting('penggunaan_server') != '1'): ?> display: none; <?php endif; ?> ">
                <label class="col-sm-3 control-label">Akses web pada server offline ini</label>
                <div class="col-sm-9 col-lg-4">
                    <select class="form-control input-sm" name="offline_mode_saja">
                        <option value='' selected="selected">-- Pilih Akses Web --</option>
                        <?php $__currentLoopData = \App\Enums\OfflineModeEnum::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>" <?= (setting('penggunaan_server') == '1' && setting('offline_mode') == $key) ? 'selected' : ''; ?>><?php echo e($item); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
        <?php if(can('u')): ?>
            <div class="box-footer">
                <button type='reset' class='btn btn-social btn-danger btn-sm'><i class='fa fa-times'></i> Batal</button>
                <button type='submit' class='btn btn-social btn-info btn-sm pull-right'><i class='fa fa-check'></i> Simpan</button>
            </div>
        <?php endif; ?>
    </form>
    <?php if(can('u') && setting('penggunaan_server') == '6'): ?>
        <div class="box-body">
            <div class="alert alert-info">
                <p>Server ini hanya digunakan untuk menampilkan data bagi publik. Secara default, semua modul dinon-aktifkan kecuali menu Pengaturan dan Admin Web. Pengelolaan data penduduk dan lain-lain dilakukan di server terpisah, secara offline di Kantor Desa. Untuk memutakhirkan data di
                    server ini, unggah data secara berkala dari server yang digunakan untuk pengelolaan data.</p>
                <p>Sebaiknya data di server ini diacak atau disensor untuk menjaga privasi data penduduk dan data lain.</p>
            </div>
            <a href="#" data-title="Acak Data" class="btn btn-social btn-danger btn-sm" data-toggle="modal" data-target="#confirm-acak"><i class='fa fa-random'></i>Acak Data</a>
            <a
                href="<?php echo e(ci_route('database.mutakhirkan_data_server')); ?>"
                title="Sinkronkan Data"
                data-remote="false"
                data-toggle="modal"
                data-target="#modalBox"
                data-title="Sinkronkan Data"
                class="btn btn-social btn-info btn-sm"
            ><i class="fa fa-refresh"></i>Impor Data Mutakhir</a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        function ubah_jenis_server(jenis_server) {
            $('#offline_saja select').val('');
            if (jenis_server == 3) {
                $('#offline_saja').hide();
                $('#offline_saja select').removeClass('required');
                $('#offline_online_hosting select').val('');
                $('#offline_online_hosting select').addClass('required');
                $('#offline_online_hosting').show();
            } else {
                $('#offline_online_hosting select').val('');
                $('#offline_online_hosting select').change();
                $('#offline_online_hosting').hide();
                $('#offline_online_hosting select').removeClass('required');
                $('#offline_saja select').removeClass('required');
                $('#offline_saja').hide();
                if (jenis_server == 1) {
                    $('#offline_saja select').addClass('required');
                    $('#offline_saja').show();
                }
            }
        }

        function ubah_server(server) {
            $('#offline_saja select').val('');
            $('#offline_ada_hosting select').val('');

            if (server == 5) {
                $('#offline_ada_hosting select').addClass('required');
                $('#offline_ada_hosting').show();
            } else {
                $('#offline_ada_hosting select').removeClass('required');
                $('#offline_ada_hosting').hide();
            }
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/pengaturan/modul/header.blade.php ENDPATH**/ ?>
<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>
        <h1>Peta Wilayah <?php echo e($nama_wilayah); ?></h1>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tautan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><a href="<?php echo e($tautan['link']); ?>"> <?php echo e($tautan['judul']); ?></a></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <li class="active">Peta Wilayah <?php echo e($wilayah); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <form action="<?php echo e($form_action); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="box-body">
                <div id="tampil-map">
                    <input type="hidden" id="path" name="path" value="<?php echo e($wil_ini['path']); ?>">
                    <input type="hidden" name="id" id="id" value="<?php echo e($wil_ini['id']); ?>" />
                    <input type="hidden" name="zoom" id="zoom" value="<?php echo e($wil_ini['zoom']); ?>" />
                </div>
            </div>
            <?php if(can('u')): ?>
                <div class="box-footer">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="lat">Warna Area</label>
                        <div class="col-sm-4">
                            <div class="input-group my-colorpicker2">
                                <input type="text" id="warna" name="warna" class="form-control input-sm warna required" placeholder="#FFFFFF" value="<?php echo e($wil_ini['warna'] ?? '#FFFFFF'); ?>">
                                <div class="input-group-addon input-sm">
                                    <i></i>
                                </div>
                            </div>
                        </div>
                        <label class="col-sm-2 control-label" for="lat">Warna Pinggiran</label>
                        <div class="col-sm-4">
                            <div class="input-group my-colorpicker2">
                                <input type="text" id="border" name="border" class="form-control input-sm warna required" placeholder="#FFFFFF" value="<?php echo e($wil_ini['border'] ?? '#FFFFFF'); ?>">
                                <div class="input-group-addon input-sm">
                                    <i></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo e($tautan['link']); ?>" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
                    <a
                        href="#"
                        data-href="<?php echo e($route_kosongkan); ?>"
                        class="btn btn-social bg-maroon btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                        title="Kosongkan Wilayah"
                        data-toggle="modal"
                        data-target="#confirm-status"
                        data-body="Apakah yakin akan mengosongkan peta wilayah ini?"
                    ><i class="fa fa fa-trash-o"></i>Kosongkan</a>
                    <a href="#" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" download="OpenSID.gpx" id="exportGPX"><i class='fa fa-download'></i> Export ke GPX</a>
                    <button type='reset' class='btn btn-social btn-danger btn-sm' id="reset-peta"><i class='fa fa-times'></i> Reset</button>
                    <button type='submit' class='btn btn-social btn-info btn-sm pull-right'><i class='fa fa-check'></i> Simpan</button>
                </div>
            <?php endif; ?>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.components.asset_peta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.konfirmasi', ['periksa_data' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/bootstrap-colorpicker.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('bootstrap/js/bootstrap-colorpicker.min.js')); ?>"></script>
    <script>
        window.onload = function() {
            $(".my-colorpicker2").colorpicker()

            // Inisialisasi tampilan peta
            var lat = <?php echo e($wil_ini['lat'] ?? ($wil_atas['lat'] ?? config('app.map.point.lat'))); ?>;
            var lng = <?php echo e($wil_ini['lng'] ?? ($wil_atas['lng'] ?? config('app.map.point.lng'))); ?>;
            var zoom = <?php echo e($wil_ini['zoom'] ?? ($wil_atas['zoom'] ?? config('app.map.zoom'))); ?>;
            var posisi = [lat, lng];
            var peta_wilayah = L.map('tampil-map', pengaturan_peta).setView(posisi, zoom);

            // 1. Menampilkan overlayLayers Peta Semua Wilayah
            var marker_desa = [];
            var marker_dusun = [];
            var marker_rw = [];
            var marker_rt = [];

            // OVERLAY WILAYAH DESA
            <?php if(!empty($desa['path'])): ?>
                set_marker_desa(marker_desa, <?php echo json_encode($desa, JSON_THROW_ON_ERROR); ?>, "<?php echo e(ucwords(setting('sebutan_desa')) . ' ' . $desa['nama_desa']); ?>", "<?php echo e(favico_desa()); ?>");
            <?php endif; ?>

            // OVERLAY WILAYAH DUSUN
            <?php if(!empty($dusun_gis)): ?>
                set_marker_multi(marker_dusun, '<?php echo addslashes(json_encode($dusun_gis, JSON_THROW_ON_ERROR)); ?>', '<?php echo e(ucwords(setting('sebutan_dusun'))); ?>', 'dusun', "<?php echo e(favico_desa()); ?>");
            <?php endif; ?>

            // OVERLAY WILAYAH RW
            <?php if(!empty($rw_gis)): ?>
                set_marker(marker_rw, '<?php echo addslashes(json_encode($rw_gis, JSON_THROW_ON_ERROR)); ?>', 'RW', 'rw', "<?php echo e(favico_desa()); ?>");
            <?php endif; ?>

            // OVERLAY WILAYAH RT
            <?php if(!empty($rt_gis)): ?>
                set_marker(marker_rt, '<?php echo addslashes(json_encode($rt_gis, JSON_THROW_ON_ERROR)); ?>', 'RT', 'rt', "<?php echo e(favico_desa()); ?>");
            <?php endif; ?>

            // 2. Menampilkan overlayLayers Peta Semua Wilayah
            <?php if(!empty($wil_atas['path'])): ?>
                var overlayLayers = overlayWil(marker_desa, marker_dusun, marker_rw, marker_rt, "<?php echo e(ucwords(setting('sebutan_desa'))); ?>", "<?php echo e(ucwords(setting('sebutan_dusun'))); ?>");
            <?php else: ?>
                var overlayLayers = {};
            <?php endif; ?>

            // Menampilkan BaseLayers Peta
            var baseLayers = getBaseLayers(peta_wilayah, MAPBOX_KEY, JENIS_PETA);
            var wilayah = null;
            var warna = '#FFFFFF';

            // Menampilkan Peta wilayah yg sudah ada
            <?php if(!empty($wil_ini['path'])): ?>
                var wilayah = <?php echo e($wil_ini['path']); ?>;
                var warna = '<?php echo e($wil_ini['warna']); ?>';
                <?php if(isset($poly) && $poly == 'multi'): ?>
                    // MultiPolygon
                    showCurrentMultiPolygon(wilayah, peta_wilayah, warna, TAMPIL_LUAS);
                    var multi = true;
                <?php else: ?>
                    // Polygon
                    showCurrentPolygon(wilayah, peta_wilayah, warna, TAMPIL_LUAS);
                    var multi = false;
                <?php endif; ?>
            <?php endif; ?>

            // Menambahkan zoom scale ke peta
            L.control.scale().addTo(peta_wilayah);

            // Menambahkan toolbar ke peta
            peta_wilayah.pm.addControls(editToolbarPoly());

            <?php if(isset($poly) && $poly == 'multi'): ?>
                // Menambahkan Peta wilayah
                addPetaMultipoly(peta_wilayah);
                var multi = true;
            <?php else: ?>
                // Menambahkan peta poly
                addPetaPoly(peta_wilayah);
                var multi = false;
            <?php endif; ?>

            // Update value zoom ketika ganti zoom
            updateZoom(peta_wilayah);

            <?php if(can('u')): ?>
                // Export/Import Peta dari file GPX
                eximGpxRegion(peta_wilayah, multi);

                // Import Peta dari file SHP
                eximShp(peta_wilayah, multi);
            <?php endif; ?>

            // Geolocation IP Route/GPS
            geoLocation(peta_wilayah);

            // Menghapus Peta wilayah
            hapuslayer(peta_wilayah);

            // Mencetak peta ke PNG
            cetakPeta(peta_wilayah);

            // Menambahkan Legenda Ke Peta
            var legenda_desa = L.control({
                position: 'bottomright'
            });
            var legenda_dusun = L.control({
                position: 'bottomright'
            });
            var legenda_rw = L.control({
                position: 'bottomright'
            });
            var legenda_rt = L.control({
                position: 'bottomright'
            });

            peta_wilayah.on('overlayadd', function(eventLayer) {
                if (eventLayer.name === 'Peta Wilayah Desa') {
                    setlegendPetaDesa(legenda_desa, peta_wilayah, <?php echo json_encode($desa, JSON_THROW_ON_ERROR); ?>, '<?php echo e(ucwords(setting('sebutan_desa'))); ?>', '<?php echo e($desa['nama_desa']); ?>');
                }

                if (eventLayer.name === 'Peta Wilayah Dusun') {
                    setlegendPeta(legenda_dusun, peta_wilayah, '<?php echo addslashes(json_encode($dusun_gis, JSON_THROW_ON_ERROR)); ?>', '<?php echo e(ucwords(setting('sebutan_dusun'))); ?>', 'dusun', '', '');
                }

                if (eventLayer.name === 'Peta Wilayah RW') {
                    setlegendPeta(legenda_rw, peta_wilayah, '<?php echo addslashes(json_encode($rw_gis, JSON_THROW_ON_ERROR)); ?>', 'RW', 'rw', '<?php echo e(ucwords(setting('sebutan_dusun'))); ?>');
                }

                if (eventLayer.name === 'Peta Wilayah RT') {
                    setlegendPeta(legenda_rt, peta_wilayah, '<?php echo addslashes(json_encode($rt_gis, JSON_THROW_ON_ERROR)); ?>', 'RT', 'rt', 'RW');
                }
            });

            peta_wilayah.on('overlayremove', function(eventLayer) {
                if (eventLayer.name === 'Peta Wilayah Desa') {
                    peta_wilayah.removeControl(legenda_desa);
                }

                if (eventLayer.name === 'Peta Wilayah Dusun') {
                    peta_wilayah.removeControl(legenda_dusun);
                }

                if (eventLayer.name === 'Peta Wilayah RW') {
                    peta_wilayah.removeControl(legenda_rw);
                }

                if (eventLayer.name === 'Peta Wilayah RT') {
                    peta_wilayah.removeControl(legenda_rt);
                }
            });

            // Menampilkan baseLayers dan overlayLayers
            L.control.layers(baseLayers, overlayLayers, {
                position: 'topleft',
                collapsed: true
            }).addTo(peta_wilayah);

            // Menampilkan notif error path
            view_error_path();

            // Reset peta type polygon
            resetPolygon(peta_wilayah, wilayah, posisi, zoom, multi, warna, TAMPIL_LUAS);

        }; //EOF window.onload
    </script>
    <script src="<?php echo e(asset('js/leaflet.filelayer.js')); ?>"></script>
    <script src="<?php echo e(asset('js/togeojson.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/wilayah/maps_wilayah.blade.php ENDPATH**/ ?>
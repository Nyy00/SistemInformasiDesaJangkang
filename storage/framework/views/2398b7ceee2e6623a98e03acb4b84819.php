<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/leaflet.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/leaflet-geoman.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/L.Control.Locate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/MarkerCluster.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/MarkerCluster.Default.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/leaflet-measure-path.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/mapbox-gl.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/L.Control.Shapefile.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/leaflet.groupedlayercontrol.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/peta.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/toastr.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/leaflet.fullscreen.css')); ?>" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <!-- OpenStreetMap Js-->
    <script src="<?php echo e(asset('js/leaflet.js')); ?>"></script>
    <script src="<?php echo e(asset('js/turf.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/leaflet-geoman.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/leaflet.filelayer.js')); ?>"></script>
    <script src="<?php echo e(asset('js/togeojson.js')); ?>"></script>
    <script src="<?php echo e(asset('js/togpx.js')); ?>"></script>
    <script src="<?php echo e(asset('js/leaflet-providers.js')); ?>"></script>
    <script src="<?php echo e(asset('js/L.Control.Locate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/leaflet.markercluster.js')); ?>"></script>
    <script src="<?php echo e(asset('js/peta.js')); ?>"></script>
    <script src="<?php echo e(asset('js/leaflet-measure-path.js')); ?>"></script>
    <script src="<?php echo e(asset('js/apbdes_manual.js')); ?>"></script>
    <script src="<?php echo e(asset('js/mapbox-gl.js')); ?>"></script>
    <script src="<?php echo e(asset('js/leaflet-mapbox-gl.js')); ?>"></script>
    <script src="<?php echo e(asset('js/shp.js')); ?>"></script>
    <script src="<?php echo e(asset('js/leaflet.shpfile.js')); ?>"></script>
    <script src="<?php echo e(asset('js/leaflet.groupedlayercontrol.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/leaflet.browser.print.js')); ?>"></script>
    <script src="<?php echo e(asset('js/leaflet.browser.print.utils.js')); ?>"></script>
    <script src="<?php echo e(asset('js/leaflet.browser.print.sizes.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dom-to-image.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/Leaflet.fullscreen.min.js')); ?>"></script>
    <script>
        // pengaturan peta
        var MAPBOX_KEY = '<?php echo e(setting('mapbox_key')); ?>';
        var JENIS_PETA = '<?php echo e(setting('jenis_peta')); ?>';
        var TAMPIL_LUAS = "<?php echo e(setting('tampil_luas_peta')); ?>";
        var pengaturan_peta = {
            maxZoom: '<?php echo e(setting('max_zoom_peta')); ?>',
            minZoom: '<?php echo e(setting('min_zoom_peta')); ?>',
            fullscreenControl: {
                position: 'topright' // Menentukan posisi tombol fullscreen
            }
        };
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/layouts/components/asset_peta.blade.php ENDPATH**/ ?>
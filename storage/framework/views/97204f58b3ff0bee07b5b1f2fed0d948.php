Versi Formulir DTKS saat ini : <b id="versi">
    <?php echo e(\App\Enums\Dtks\DtksEnum::VERSION_LIST[\App\Enums\Dtks\DtksEnum::VERSION_CODE]); ?>

</b>
<br>
<div id="info_versi_dtks">

</div>
<script>
    setTimeout(() => {
        $('#info_versi_dtks').load("<?= ci_route('dtks/loadRecentInfo') ?>");
    }, 500);
</script>
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/dtks/info_new_dtks.blade.php ENDPATH**/ ?>
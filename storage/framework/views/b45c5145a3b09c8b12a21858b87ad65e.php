<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startSection('title'); ?>
    <h1>
        Statistik Pengunjung Website
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Statistik Pengunjung Website</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form id="mainform" name="mainform" method="post">
        <div class="box box-info">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="<?php echo e(ci_route('pengunjung.cetak')); ?>" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Cetak Laporan" target="_blank"><i class="fa fa-print "></i>Cetak</a>
                                    <a href="<?php echo e(ci_route('pengunjung.cetak.unduh')); ?>" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Unduh Laporan" target="_blank"><i class="fa fa-print "></i>Unduh</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-2 col-xs-6">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?php echo e(ribuan($hari_ini)); ?><sup style="font-size: 20px"></sup></h3>
                                <p>Hari Ini</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?php echo e(ci_route('pengunjung.detail', 1)); ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-6">
                        <div class="small-box bg-purple">
                            <div class="inner">
                                <h3><?php echo e(ribuan($kemarin)); ?><sup style="font-size: 20px"></sup></h3>
                                <p>Kemarin</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?php echo e(ci_route('pengunjung.detail', 2)); ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-6">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo e(ribuan($minggu_ini)); ?><sup style="font-size: 20px"></sup></h3>
                                <p>Minggu Ini</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?php echo e(ci_route('pengunjung.detail', 3)); ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-6">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo e(ribuan($bulan_ini)); ?><sup style="font-size: 20px"></sup></h3>
                                <p>Bulan Ini</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?php echo e(ci_route('pengunjung.detail', 4)); ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-6">
                        <div class="small-box bg-gray">
                            <div class="inner">
                                <h3><?php echo e(ribuan($tahun_ini)); ?><sup style="font-size: 20px"></sup></h3>
                                <p>Tahun Ini</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?php echo e(ci_route('pengunjung.detail', 5)); ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-6">
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3><?php echo e(ribuan($jumlah)); ?><sup style="font-size: 20px"></sup></h3>
                                <p>Jumlah</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?php echo e(ci_route('pengunjung.detail')); ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="box-header">
                    <hr>
                    <h4 class="text-center"><strong>Statistik Pengunjung Website <?php echo e($main['judul']); ?><strong></h4>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="box box-info">
                                    <!-- Ini Grafik -->
                                    <br>
                                    <div id="chart"> </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box box-info">
                                    <!-- Tabel Data -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover nowrap">
                                            <thead class="bg-gray">
                                                <tr>
                                                    <th class="text-center" width='5%'>No</th>
                                                    <th class="text-center"><?php echo e($main['lblx']); ?></th>
                                                    <th class="text-center">Pengunjung (Orang)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $main['pengunjung']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo e($i + 1); ?></td>
                                                        <td class="text-center">
                                                            <?php echo e($main['lblx'] == 'Bulan' ? getBulan($data['Tanggal']) . ' ' . date('Y') : tgl_indo2($data['Tanggal'])); ?>

                                                        </td>
                                                        <td class="text-center"><?php echo e(ribuan($data['Jumlah'])); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            <tfoot class="bg-gray disabled color-palette">
                                                <tr>
                                                    <th colspan="2" class="text-center">Total</th>
                                                    <th class="text-center"><?php echo e(ribuan($main['Total'])); ?></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.components.highchartjs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('scripts'); ?>
    <!-- Pengaturan Grafik (Graph) Data Statistik-->
    <script type="text/javascript">
        var chart;
        $(document).ready(function() {
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'chart',
                    defaultSeriesType: 'column'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    title: {
                        text: 'Tahun'
                    },
                    categories: [
                        <?php foreach ($main['pengunjung']as $data): ?>['<?php echo e($main['lblx'] == 'Bulan' ? getBulan($data['Tanggal']) . ' ' . date('Y') : tgl_indo2($data['Tanggal'])); ?>', ],
                        <?php endforeach; ?>
                    ]
                },
                yAxis: {
                    title: {
                        text: 'Pengunjung (Orang)'
                    }
                },
                legend: {
                    layout: 'vertical',
                    enabled: false
                },
                plotOptions: {
                    series: {
                        colorByPoint: true
                    },
                    column: {
                        pointPadding: 0,
                        borderWidth: 0
                    }
                },
                series: [{
                    shadow: 1,
                    border: 1,
                    data: [
                        <?php foreach ($main['pengunjung']as $data): ?>['<?php echo e($main['lblx'] == 'Bulan' ? getBulan($data['Tanggal']) . ' ' . date('Y') : tgl_indo2($data['Tanggal'])); ?>', <?php echo e($data['Jumlah']); ?>],
                        <?php endforeach; ?>
                    ]
                }]
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/pengunjung/index.blade.php ENDPATH**/ ?>
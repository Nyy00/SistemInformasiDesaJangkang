<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('title'); ?>
    <h1>
        Pengguna <small>Ubah Data</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(ci_route('pengguna')); ?>">Pengguna</a></li>
    <li class="active">Profil</li>
<?php $__env->stopSection(); ?>

<?php if($ci->session->change_password): ?>
    <div
        class="modal show"
        id="change_password"
        tabindex="-1"
        role="dialog"
        aria-labelledby="change-password"
        aria-hidden="true"
        style="display: block;"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="change-password">
                        <i class="fa fa-exclamation-triangle text-red"></i>
                        &nbsp;Konfirmasi
                    </h4>
                </div>
                <div class="modal-body btn-info">
                    Anda akan di arahkan untuk melakukan login kembali! </div>
                <div class="modal-footer">
                    <a class="btn-ok" href="<?php echo e(site_url('siteman/logout')); ?>">
                        <button type="button" class="btn btn-social btn-flat btn-success btn-sm" id="ok-delete">
                            <i class="fa fa-sign-out"></i> Keluar
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="penduduk" id="foto" src="<?php echo e(AmbilFoto(ci_auth()->foto)); ?>" alt="Foto Penduduk">
                    <br>
                    <div class="input-group input-group-sm text-center">
                        <span class="input-group-btn">
                            <?php if($userData->email_verified_at === null && !empty($userData->email)): ?>
                                <?php echo form_open(ci_route('pengguna.kirim_verifikasi')); ?>

                                <button type="submit" class="btn btn-sm btn-warning btn-block btn-mb-5"><i class="fa fa-share-square"></i>
                                    Verifikasi Email</button>
                                </form>
                                <br />
                            <?php endif; ?>
                            <?php if($userData->telegram_verified_at === null && setting('telegram_token') != null && !empty($userData->id_telegram)): ?>
                                <button type="button" id="verif_telegram" class="btn btn-sm btn-warning btn-block btn-mb-5"><i class="fa fa-share-square"></i>
                                    Verifikasi Telegram</button>
                                <br />
                            <?php endif; ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#profil" data-toggle="tab">Profil</a></li>
                    <li><a href="#sandi" data-toggle="tab">Sandi</a></li>
                </ul>
                <div class="tab-content">
                    <?php echo $__env->make('admin.pengguna.tab-profil', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('admin.pengguna.tab-sandi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            let _hash = window.location.hash.substring(1)
            if (_hash) {
                $('ul.nav.nav-tabs a[href="#' + _hash + '"]').click()
            }

            $('#verif_telegram').click(function() {
                Swal.fire({
                    title: 'Mengirim OTP',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });
                $.ajax({
                        url: '<?php echo e(ci_route('pengguna.kirim_otp_telegram')); ?>',
                        type: 'get',
                        data: {
                            'sidcsrf': getCsrfToken(),
                            'id_telegram': $('#id_telegram').val()
                        },
                    })
                    .done(function(response) {
                        if (response.status == true) {
                            Swal.fire({
                                title: 'Masukan Kode OTP',
                                input: 'text',
                                inputPlaceholder: 'Masukan Kode OTP',
                                inputValidator: (value) => {
                                    if (isNaN(value)) {
                                        return 'Kode OTP harus berupa angka'
                                    }
                                },
                                showCancelButton: true,
                                confirmButtonText: 'Kirim',
                                cancelButtonText: 'Tutup',
                                showLoaderOnConfirm: true,
                                preConfirm: (otp) => {
                                    const formData = new FormData();
                                    formData.append('sidcsrf', getCsrfToken());
                                    formData.append('id_telegram', response.data);
                                    formData.append('otp', otp);

                                    return fetch(
                                            `<?php echo e(ci_route('pengguna.verifikasi_telegram')); ?>`, {
                                                method: 'POST',
                                                body: formData,
                                            }).then(response => {
                                            if (!response.ok) {
                                                throw new Error(response.statusText)
                                            }
                                            return response.json()
                                        })
                                        .catch(error => {
                                            Swal.showValidationMessage(
                                                `Request failed: ${error}`
                                            )
                                        })
                                }
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    if (result.value.status == true) {
                                        $('.close').trigger("click"); //close modal
                                        Swal.fire({
                                            icon: 'success',
                                            title: result.value.message,
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: result.value.message
                                        })
                                    }
                                }
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: response.messages,
                            })
                        }
                    })
                    .fail(function(e) {
                        Swal.fire({
                            icon: 'error',
                            text: e.statusText,
                        })
                    });
            });

            $('input[name=notif_telegram]').change(function() {
                let _val = parseInt($('input[name=notif_telegram]:checked').val())
                if (_val) {
                    $('#id_telegram').closest('.form-group').removeClass('hide')
                } else {
                    $('#id_telegram').closest('.form-group').addClass('hide')
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/pengguna/index.blade.php ENDPATH**/ ?>
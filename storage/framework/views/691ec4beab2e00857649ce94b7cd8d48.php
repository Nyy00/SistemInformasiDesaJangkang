<?php $__env->startSection('step'); ?>
    <p class="pb-3 text-gray-800">
        Di bawah ini Anda harus melakukan pengaturan default pengguna.
    </p>
    <?php if($ci->session->errors): ?>
        <?php if(is_array($ci->session->errors)): ?>
            <?php $__currentLoopData = $ci->session->errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-red-100 border-l-4 border-red-500 p-4 mb-3">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm leading-5 text-red-700">
                                <?php echo $error; ?>

                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="bg-red-100 border-l-4 border-red-500 p-4 mb-3">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm leading-5 text-red-700">
                            <?php echo $ci->session->errors; ?>

                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <form method="post" action="<?php echo e(site_url('install/user')); ?>">
        <input type="hidden" name="<?= $ci->security->get_csrf_token_name() ?>" value="<?= $ci->security->get_csrf_hash() ?>" />
        <div class="mb-3">
            <label for="username" class="block font-medium leading-5 text-gray-700 pb-2">
                Username pengguna
                <span class="text-red-400">*</span>
            </label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="username" value="<?php echo e(set_value('username')); ?>" required>
            <?php if(form_error('username')): ?>
                <?php echo form_error('username'); ?>

            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="database_port" class="block font-medium leading-5 text-gray-700 pb-2">
                Password pengguna
                <span class="text-red-400">*</span>
            </label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" value="<?php echo e(set_value('password')); ?>" required>
            <?php if(form_error('password')): ?>
                <?php echo form_error('password'); ?>

            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="database_port" class="block font-medium leading-5 text-gray-700 pb-2">
                Konfirmasi password pengguna
                <span class="text-red-400">*</span>
            </label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="confirm_password" type="password" name="confirm_password" value="<?php echo e(set_value('confirm_password')); ?>" required>
            <?php if(form_error('confirm_password')): ?>
                <?php echo form_error('confirm_password'); ?>

            <?php endif; ?>
        </div>
        <div class="mb-3">
            <input type="checkbox" className="mr-2 w-4 h-4" onclick="showPassword()" />
            <span className="text-sm text-gray-600">Tampilkan password</span>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center" onClick="this.form.submit(); this.disabled=true; this.innerText='Mohon tunggu sebentar…';">
                Langkah berikutnya
                <svg class="fill-current w-5 h-5 ml-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </button>

        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        function showPassword() {
            var password = document.getElementById("password");
            var comfirmPassword = document.getElementById("confirm_password");

            if (password.type === "password") {
                password.type = "text";
                comfirmPassword.type = "text";
            } else {
                password.type = "password";
                comfirmPassword.type = "password";
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('installer.install', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/installer/steps/user.blade.php ENDPATH**/ ?>
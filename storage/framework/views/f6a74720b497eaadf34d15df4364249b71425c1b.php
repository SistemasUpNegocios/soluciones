


<?php $__env->startSection('css'); ?>
  <link id="pagestyle" href="<?php echo e(asset('css/login.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Regístrate al sistema'); ?>

<?php $__env->startSection('content'); ?>
<section class="min-vh-100 mb-8">
  <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
    style="background: linear-gradient(160deg, #51a7b146 0%, #00afc63b), url(<?php echo e(asset('img/curved14.jpg')); ?>); background-size: cover; background-repeat: no-repeat;">
    <span class="mask"></span>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 text-center mx-auto">
          <h1 class="text-white mb-2 mt-3">¡Regístrate!</h1>
          <p class="text-lead text-white">Llena el siguiente formulario para registrarte al sistema de Up Negocios.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10">
      <div class="col-xl-5 col-lg-5 col-md-7 mx-auto">
        <div class="card z-index-0">
          <div class="card-body">
            <form role="form text-left" method="POST" action="">
              <?php echo csrf_field(); ?>
              <div class="mb-3">
                <input type="text" id="nameInput" class="form-control" placeholder="Ingresa tu nombre" name="nombre" value="<?php echo e(old('nombre')); ?>">
                <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div style="display:block !important" class="invalid-feedback">*<?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>              
              <div class="mb-3">
                <input type="email" id="emailInput" class="form-control" placeholder="Ingresa tu correo electrónico"
                  name="correo" value="<?php echo e(old('correo')); ?>">
                  <?php $__errorArgs = ['correo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div style="display:block !important" class="invalid-feedback">*<?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="mb-3">
                <input type="password" id="passwordInput" class="form-control" placeholder="Ingresa una contraseña"
                  name="password" value="<?php echo e(old('password')); ?>">
                  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div style="display:block !important" class="invalid-feedback">*<?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="mb-3">
                <input type="password" id="passwordConfirmationInput" class="form-control"
                  placeholder="Confirma la contraseña" name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>">
                  <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div style="display:block !important" class="invalid-feedback">*<?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="rememberMe" onclick="verPass()">
                <label id="textCheck" class="form-check-label" for="rememberMe">Mostrar
                  contraseñas</label>
              </div>
              <div class="form-check form-check-info text-left">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                <label class="form-check-label" for="flexCheckDefault">
                  Acepto los <a href="javascript:;" class="text-dark font-weight-bolder">Términos y condiciones</a>
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Regístrate</button>
              </div>
              <p class="text-sm mt-3 mb-0">¿Ya tienes una cuenta? <a href="<?php echo e(route('login')); ?>"
                  class="text-dark font-weight-bolder">Inicia sesión</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('preloader'); ?>
  <div id="loader" class="loader">
      <h1></h1>
      <span></span>
      <span></span>
      <span></span>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="<?php echo e(asset('js/login.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('g-recaptcha'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\soluciones\resources\views/auth/register.blade.php ENDPATH**/ ?>
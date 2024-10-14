<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Farmacia <?php echo $__env->yieldContent('title'); ?></title>
  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">FARMACIA 2024</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/laboratorios">Laboratorios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/medicamentos">Medicamentos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="container mt-3">
    <?php echo $__env->yieldContent('body'); ?>
    <?php if($msj = Session::get('success')): ?>
      <div class="row">
        <div class="col-md-4 offset-md-4" id="msjEditado">
          <div class="alert alert-success">
            <p><i class="fa-solid fa-check"></i><?php echo e($msj); ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <script>
    window.onload = function() {
      const msjEditado = document.getElementById('msjEditado');
      if (msjEditado) {
        setTimeout(() => {
          msjEditado.style.display = 'none'; 
        }, 2000); 
      }
    };
  </script>
</body>
</html>
<?php /**PATH C:\laragon\www\farmaciaLaravel\resources\views/layout.blade.php ENDPATH**/ ?>
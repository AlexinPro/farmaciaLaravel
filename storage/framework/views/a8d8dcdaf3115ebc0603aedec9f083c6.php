
<?php $__env->startSection('body'); ?>
<?php if(session('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<div class="row mt-3">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header bg-dark text-white">Editar a <b><?php echo e($laboratorio->laboratorio); ?></b></div>
            <div class="card-body">
                <form id="frmLabs" method="POST" action="<?php echo e(url('laboratorios', [$laboratorio->id])); ?>">
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-flask"></i></span>
                        <input type="text" name="laboratorio" value="<?php echo e($laboratorio->laboratorio); ?>" class="form-control" maxlength="50" placeholder="Laboratorio" required>
                    </div>
                    <div class="d-grid col-6 mx-auto">
                        <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\farmaciaLaravel\resources\views/editLabs.blade.php ENDPATH**/ ?>
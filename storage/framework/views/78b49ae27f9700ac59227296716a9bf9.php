
<?php $__env->startSection('body'); ?>
<div class="col-md-4 offset-md-4">
    <div class="d-grid mx-auto">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalLaboratorio">
            <i class="fa-solid fa-circle-plus"></i> Añadir Laboratorio
        </button>
    </div>
</div>

<?php if($msj = Session::get('success')): ?>
<div class="row mt-3">
    <div class="col-md-4 offset-md-4">
        <div class="alert alert-success text-center">
            <p><i class="fa-solid fa-check"></i> <?php echo e($msj); ?></p>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if($msj = Session::get('error')): ?>
<div class="row mt-3">
    <div class="col-md-4 offset-md-4">
        <div class="alert alert-danger text-center">
            <p><i class="fa-solid fa-times"></i> <?php echo e($msj); ?></p>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="row mt-3">
    <div class="col-12 col-lg-8 offset-0 offset-lg-2">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Laboratorio</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php $__currentLoopData = $laboratorios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laboratorio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo e($laboratorio->laboratorio); ?></td>
                        <td>
                            <a href="<?php echo e(url('laboratorios', [$laboratorio->id])); ?>" class="btn btn-warning">
                                <i class="fa-solid fa-edit"></i>
                            </a>
                        </td>
                        <td>

                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="<?php echo e($laboratorio->id); ?>">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalLaboratorio" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Añadir Laboratorio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(url('laboratorios')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-flask"></i></span>
                        <input type="text" name="laboratorio" class="form-control" maxlength="50" placeholder="Nombre del Laboratorio" required>
                    </div>
                    <div class="d-grid col-6 mx-auto">
                        <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este laboratorio?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<script>
    var confirmDeleteModal = document.getElementById('confirmDeleteModal');
    confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var laboratorioId = button.getAttribute('data-id');
        var form = document.getElementById('deleteForm');
        form.action = '/laboratorios/' + laboratorioId;
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\farmaciaLaravel\resources\views/laboratorios.blade.php ENDPATH**/ ?>
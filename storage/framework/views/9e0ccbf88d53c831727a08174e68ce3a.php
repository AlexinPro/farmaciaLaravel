

<?php $__env->startSection('body'); ?>
<div class="col-md-4 offset-md-4">
    <div class="d-grid mx-auto">
        <button class="btn btn-info" data-op="1" data-bs-toggle="modal" data-bs-target="#modalMedicamentos">
            <i class="fa-solid fa-circle-plus"></i> Añadir
        </button>
    </div>
</div>
<div class="row mt-3">
    <div class="col-19 col-lg-12 offset-0 offset-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Medicamento</th>
                        <th>Descripción</th>
                        <th>Laboratorio</th>
                        <th>Precio</th>
                        <th>Caducidad</th>
                        <th>Lote</th>
                        <th>Porción (Mg)</th>
                        <th>Imagen</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $i=1; ?>
                    <?php $__currentLoopData = $medicamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo e($row->name); ?></td>
                        <td><?php echo e($row->descripcion); ?></td>
                        <td><?php echo e($row->nombre_laboratorio); ?></td>
                        <td><?php echo e($row->precio); ?></td>
                        <td><?php echo e($row->caducidad); ?></td>
                        <td><?php echo e($row->lote); ?></td>
                        <td><?php echo e($row->porcion); ?></td>
                        <td>
                            <img class="img-fluid" src="<?php echo e(asset('images/' . $row->image)); ?>" width="130">
                        </td>
                        <td>
                            <a href="<?php echo e(url('medicamentos', [$row])); ?>" class="btn btn-warning"><i class="fa-solid fa-edit"></i></a>
                        </td>
                        <td>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="<?php echo e(url('medicamentos', [$row])); ?>" onclick="setDeleteFormAction(this)">
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

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este registro?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form id="deleteForm" method="POST" action="" style="display: inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("delete"); ?>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalMedicamentos" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insertar Medicamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frmMed" method="POST" action="<?php echo e(url('medicamentos')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-stethoscope"></i></span>
                        <input type="text" name="name" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-user-doctor"></i></span>
                        <input type="text" name="descripcion" class="form-control" placeholder="Descripción" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-user-doctor"></i></span>
                        <select name="id_laboratorio" class="form-select" required>
                            <option value="">Selecciona un laboratorio</option>
                            <?php $__currentLoopData = $laboratorios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($row->id); ?>"><?php echo e($row->laboratorio); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-dollar-sign"></i></span>
                        <input type="number" name="precio" class="form-control" placeholder="Precio" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                        <input type="date" name="caducidad" class="form-control" placeholder="Caducidad" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-list-ol"></i></span>
                        <input type="number" name="lote" class="form-control" placeholder="Lote" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-weight-scale"></i></span>
                        <input type="number" name="porcion" class="form-control" placeholder="Porción" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="d-grid col-6 mx-auto">
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function setDeleteFormAction(button) {
        var url = button.getAttribute('data-id');
        var form = document.getElementById('deleteForm');
        form.setAttribute('action', url);
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\farmaciaLaravel\resources\views/medicamentos.blade.php ENDPATH**/ ?>
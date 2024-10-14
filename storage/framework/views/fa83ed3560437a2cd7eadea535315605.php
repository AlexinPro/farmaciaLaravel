
<?php $__env->startSection('body'); ?>
<div class="row mt-3">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header bg-dark text-white">Editar a <b><?php echo e($medicamento->name); ?></b></div>
            <div class="card-body">
                <form id="frmMedicamentos" method="POST" action="<?php echo e(url('medicamentos', [$medicamento->id])); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-pills"></i></span>
                        <input type="text" name="name" value="<?php echo e($medicamento->name); ?>" class="form-control" maxlength="50" placeholder="Nombre" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-info-circle"></i></span>
                        <input type="text" name="descripcion" value="<?php echo e($medicamento->descripcion); ?>" class="form-control" maxlength="100" placeholder="Descripción" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-flask"></i></span>
                        <select name="id_laboratorio" class="form-select" required>
                            <option value="">
                                <p>Selecciona un laboratorio</p>
                            </option>
                            <?php $__currentLoopData = $laboratorios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($row->id); ?>" <?php echo e($row->id == $medicamento->id_laboratorio ? 'selected' : ''); ?>>
                                <?php echo e($row->laboratorio); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-dollar-sign"></i></span>
                        <input type="number" name="precio" value="<?php echo e($medicamento->precio); ?>" class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-calendar-alt"></i></span>
                        <input type="date" name="caducidad" value="<?php echo e($medicamento->caducidad); ?>" class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-list-ol"></i></span>
                        <input type="number" name="lote" value="<?php echo e($medicamento->lote); ?>" class="form-control" placeholder="Lote" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-weight-scale"></i></span>
                        <input type="number" name="porcion" value="<?php echo e($medicamento->porcion); ?>" class="form-control" placeholder="Porción" required>
                    </div>

                    <<div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                        <input type="file" name="image" class="form-control">
                        <small class="form-text text-muted"></small>
                    </div>
                     <?php if($medicamento->image): ?>
                     <div class="mb-3">
                    <label>Imagen actual:</label><br>
                    <img src="<?php echo e(asset('images/' . $medicamento->image)); ?>" width="150">
                    </div>
                    <?php endif; ?>

            <div class="d-grid col-6 mx-auto">
                <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\farmaciaLaravel\resources\views/editMed.blade.php ENDPATH**/ ?>
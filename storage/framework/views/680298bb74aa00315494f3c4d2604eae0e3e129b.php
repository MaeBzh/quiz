<?php $__env->startSection('content'); ?>
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add a Question
        </div>
        <div class="card-body">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div><br />
            <?php endif; ?>
            <form method="post" action="<?php echo e(route('questions.store')); ?>">
                <div class="form-group">
                    <?php echo csrf_field(); ?>
                    <label for="type">Question:</label>
                    <input type="text" class="form-control" name="question"/>
                    <label for="type">Category:</label>
                    <input type="text" class="form-control" name="category"/>
                    <label for="type">Difficulty:</label>
                    <input type="number" class="form-control" name="difficulty"/>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
    <button type="button" onclick="window.location='<?php echo e(route("questions.index")); ?>'">Back index</button>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\quiz\resources\views/questions/create.blade.php ENDPATH**/ ?>
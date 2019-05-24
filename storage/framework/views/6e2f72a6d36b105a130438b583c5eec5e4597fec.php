<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('games.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('POST'); ?>

        <h2>Create a game</h2>
        <hr>

        <?php if(count($errors) > 0): ?>
            <div class="error">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <label for="player1_name">Player one name</label>
        <input type="text" id="player1_name" name="player1_name" value="<?php echo e(old('player1_name')); ?>" class="form-control" required>

        <label for="player2_name">Player Two name</label>
        <input type="text" id="player2_name" name="player2_name" value="<?php echo e(old('player2_name')); ?>"class="form-control" required>

        <hr>
        <button type="submit" class="btn btn-success">Submit</button>

    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\quiz\resources\views/games/create.blade.php ENDPATH**/ ?>
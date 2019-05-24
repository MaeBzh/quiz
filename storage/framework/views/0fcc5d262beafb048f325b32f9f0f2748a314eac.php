<?php $__env->startSection('content'); ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>GameId</th>
            <th>P1</th>
            <th>P1 points</th>
            <th>P2</th>
            <th>P2 points</th>
            <th>Show</th>
        </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($game->getKey()); ?></td>
                <td><?php echo e($game->playerOne->name); ?></td>
                <td><?php echo e($game->player1_points); ?></td>
                <td><?php echo e($game->playerTwo->name); ?></td>
                <td><?php echo e($game->player2_points); ?></td>
                <td><a href="<?php echo e(route('games.show',$game)); ?>" class="btn btn-primary">Show</a></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="5">No games yet</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\quiz\resources\views/games/index.blade.php ENDPATH**/ ?>
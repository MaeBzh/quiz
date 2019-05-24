<?php $__env->startSection('content'); ?>
    <h2>Game</h2>
    <hr>

    <?php if($response === 'success'): ?>
        <h1 class="text-center text-success"> Well done !</h1>
    <?php else: ?>
        <h1 class="text-center text-danger"> You suck !</h1>
    <?php endif; ?>
    <hr>
    <a href="<?php echo e(route('games.show', $game)); ?>" class="btn btn-primary"> Next question -></a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\quiz\resources\views/games/answer.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
    <div class="jumbotron text-center">
        <h1>Welcome to 'Qui veut gagner des pepettes ?'</h1>
        <hr>

        <div class="row pt-5">
            <div class="col">
                <a href="#" class="btn btn-primary btn-lg disabled">
                    <h2>One player (soon !)</h2>
                </a>
            </div>
            <div class="col">
                <a href="<?php echo e(route('games.create')); ?>" class="btn btn-success btn-lg">
                    <h2>Two players</h2>
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\quiz\resources\views/welcome.blade.php ENDPATH**/ ?>
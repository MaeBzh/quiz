<?php $__env->startSection('content'); ?>
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        <?php if(session()->get('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('success')); ?>

            </div><br />
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 mb-4">
                    <a href="<?php echo e(route('questions.create')); ?>" class="btn btn-success">Add a question</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Question</th>
                            <th>Category</th>
                            <th>Difficulty</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($question->id); ?></td>
                                <td><?php echo e($question->question); ?></td>
                                <td><?php echo e($question->category); ?></td>
                                <td><?php echo e($question->difficulty); ?></td>
                                <td><?php echo e($question->created_at); ?></td>
                                <td><?php echo e($question->updated_at); ?></td>
                                <td><a href="<?php echo e(route('questions.show', compact('question'))); ?>" class="btn btn-primary">Show</a></td>
                                <td><a href="<?php echo e(route('questions.edit', compact('question'))); ?>" class="btn btn-secondary">Edit</a></td>
                                <td>
                                    <form method="post" action="<?php echo e(route('questions.destroy', compact('question'))); ?>" onsubmit="return confirm('Are you sure ?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field("DELETE"); ?>
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="9">
                                        No records
                                    </td>
                                </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\quiz\resources\views/questions/index.blade.php ENDPATH**/ ?>
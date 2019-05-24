<?php $__env->startSection('content'); ?>
    <div class="col-lg-6 col-lg-offset-3">
        <div class="row">
            <div class="col">
                <h4>Question</h4>
            </div>
            <div class="col-auto">
                <a href="<?php echo e(route('questions.edit', compact('question'))); ?>" class="btn btn-primary">
                    Edit
                </a>
            </div>
            <div class="col-auto">
                <form method="post" action="<?php echo e(route('questions.destroy', compact('question'))); ?>" onsubmit="return confirm('Are you sure ?')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("DELETE"); ?>
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        <div class="form-group">
            <label for="">Question</label>
            <?php echo e(Form::text('question', $question->question, ['class' => 'form-control', 'readonly' => true])); ?>

            <label for="">Category</label>
            <?php echo e(Form::text('category', $question->category, ['class' => 'form-control', 'readonly' => true])); ?>

            <label for="">Difficulty</label>
            <?php echo e(Form::number('difficulty', $question->difficulty, ['class' => 'form-control', 'readonly' => true])); ?>

        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h4>Show answers</h4>
            </div>
            <div class="col-auto">
                <a href="<?php echo e(route('questions.answers.create', compact('question'))); ?>" class="btn btn-success">
                    Add an answer
                </a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>IsValid</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($answer->id); ?></td>
                    <td><?php echo e($answer->name); ?></td>
                    <td><?php echo e($answer->is_valid ? 'Yes' : 'No'); ?></td>
                    <td><a href="<?php echo e(route('questions.answers.edit', compact('question', 'answer'))); ?>" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form method="post" action="<?php echo e(route('questions.answers.destroy', compact('question', 'answer'))); ?>" onsubmit="return confirm('Are you sure ?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field("DELETE"); ?>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5">
                        No records
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\quiz\resources\views/questions/show.blade.php ENDPATH**/ ?>
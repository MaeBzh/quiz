<?php $__env->startSection('content'); ?>
    <h2>Game</h2>
    <hr>

    <?php if(!empty($game_user_question)): ?>
        <h3>Player <?php echo e($game_user_question->user->name); ?> turn !</h3>
        <hr>
        <div class="row">
            <div class="col-12 col-md-6">
                <h3 class='font-weight-bold'> <?php echo e($game_user_question->question->question); ?> ?</h3>
            </div>
            <div class="col-12 col-md-6">
                <form method='POST' action='<?php echo e(route('games.answer', [
            'game' => $game_user_question->game,
            'user' => $game_user_question->user,
            'question' => $game_user_question->question,
        ])); ?>'>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>
                    <ul class="list-group w-100">
                        <?php $__currentLoopData = $game_user_question->question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item text-center col-md-6">
                                Answer <?php echo e($loop->iteration); ?> :
                                <button type="submit" class="btn btn-primary ml-1" name="answer"
                                        value="<?php echo e($answer->getKey()); ?>">
                                    <?php echo e($answer->name); ?>

                                </button>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php else: ?>
                        <h1 class="text-center">Fin de la partie !</h1>
                        <hr>
                        <br> <?php echo e($game->playerOne->name); ?> has <?php echo e($game->player1_points); ?> points !
                        <br> Player <?php echo e($game->playerTwo->name); ?> has <?php echo e($game->player2_points); ?> points !
                        <br>
                        <?php if($game->getWinner() !== null): ?>
                            <h2 class="text-center"><?php echo e($game->getWinner()->name); ?> wins, obviously.</h2>
                        <?php else: ?>
                            <h2 class="text-center">Draw !</h2>
                        <?php endif; ?>
                    <?php endif; ?>
                </form>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\quiz\resources\views/games/show.blade.php ENDPATH**/ ?>
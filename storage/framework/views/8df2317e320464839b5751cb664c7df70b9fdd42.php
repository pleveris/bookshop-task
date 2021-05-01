

<?php $__env->startSection('content'); ?>

<?php if( $books->count() < 1 ): ?>
    <div class="row justify-content-center">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Ouch... No books in bookshop at the moment!</h4>
            <hr>
        </div>
    </div>
<?php endif; ?>

<?php $__currentLoopData = $books->chunk(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row justify-content-center">
        <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card" style="width: 12rem; margin: 5px;">
                    <img src="<?php echo e(asset( $book->picture)); ?>"  style="width:100%; height:350px;" class="card-img-top rounded" alt="cover">   
                <div class="card-body">
                    <?php if($book->discount > 0 ): ?>
                        <div class="alert alert-danger" role="alert">
                            <span class="label label-danger"> 
                                <i class="fa fa-percent fa-5" aria-hidden="true"><?php echo e($book->discount); ?></i>
                            </span>
                        </div>
                    <?php endif; ?>
                    <?php if( $book->is_new ): ?>   
                        <div class="alert alert-danger" role="alert">
                            <span class="label label-danger"> 
                                <i class="fa fa-tags fa-5" aria-hidden="true">New</i>
                            </span> 
                        </div>
                    <?php endif; ?>
                    <h5 class="card-title"><?php echo e($book->title); ?></h5>
                    <h5 class="card-title">
                        <?php $__currentLoopData = $book->authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($author->author . ' '); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </h5>
                    <?php if($book->discount): ?>
                    <h5 class="card-title"> <?php echo e($book->discountedPrice()); ?> &euro; <s>   <?php echo e($book->price); ?> &euro; </s></h5>
                    <a href="<?php echo e(route('book.show', [ $book ])); ?>" class="btn btn-primary btn-block">Check book</a>
                    <?php else: ?>
                    <h5 class="card-title"> <?php echo e($book->discountedPrice()); ?> &euro;</h5>
                    <a href="<?php echo e(route('book.show', [ $book ])); ?>" class="btn btn-primary btn-block">Check book</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div >
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="row justify-content-center">
    <?php echo e($books->links()); ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pauli\Documents\bookshop-task\resources\views/guest/book/index.blade.php ENDPATH**/ ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.create'), false); ?>

        </div>
        <div class="card-body">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('school_class_create')): ?>
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="<?php echo e(route('admin.gallary.create'), false); ?>">
                            Add Gallary
                        </a>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('school_class_create')): ?>
                <div class="d-flex flex-wrap">
                    <?php $__currentLoopData = $gallary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallarysss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card bg-gray-400 mr-4 p-0" style="width: 16rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($gallarysss->name, false); ?></h5>
                                <h6 class="card-subtitle text-muted "><?php echo e($gallarysss->description, false); ?></h6>
                                <div class="btn">
                                    <a class="btn btn-secondary"
                                        href="<?php echo e(route('admin.gallary.edit', $gallarysss->id), false); ?>">Edit</a>
                                    <a class="btn btn-danger" style="">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wrok_in_ics\web_backend\resources\views/admin/gallary/index.blade.php ENDPATH**/ ?>